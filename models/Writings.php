<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "writings".
 *
 * @property int $id
 * @property int $church_group_id
 * @property string $title
 * @property string $body
 * @property string|null $created_at
 * @property string $status
 *
 * @property ChurchGroups $churchGroup
 */
class Writings extends \yii\db\ActiveRecord
{

    const STATUS_PUBLISHED = 'published';
    const STATUS_DRAFT = 'draft';


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'writings';
    }

    public $tag_list;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['church_group_id', 'title', 'body'], 'required'],
            [['church_group_id'], 'integer'],
            [['body', 'status'], 'string'],
            [['created_at', 'tag_list'], 'safe'],
            [['title'], 'string', 'max' => 255],
            ['status', 'default', 'value' => self::STATUS_DRAFT],
            ['status', 'in', 'range' => [self::STATUS_PUBLISHED, self::STATUS_DRAFT]],
            [['church_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => ChurchGroups::class, 'targetAttribute' => ['church_group_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'church_group_id' => 'Church Group',
            'title' => 'Title',
            'body' => 'Body',
            'created_at' => 'Created At',
            'status' => 'Status',
            'tag_list' => 'Tags',
        ];
    }

    /**
     * Gets query for [[ChurchGroup]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChurchGroup()
    {
        return $this->hasOne(ChurchGroups::class, ['id' => 'church_group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWritingTags()
    {
        return $this->hasMany(WritingTags::class, ['writing_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tags::class, ['id' => 'tag_id'])->viaTable('writing_tags', ['writing_id' => 'id']);
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->tag_list = \yii\helpers\ArrayHelper::getColumn($this->tags, 'tag');
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if (is_array($this->tag_list)) {
            // Delete old links
            WritingTags::deleteAll(['writing_id' => $this->id]);

            foreach ($this->tag_list as $tagName) {
                $tagName = trim($tagName);
                if (empty($tagName)) continue;

                $tag = Tags::findOne(['tag' => $tagName]);
                if (!$tag) {
                    $tag = new Tags();
                    $tag->tag = $tagName;
                    $tag->save();
                }

                $writingTag = new WritingTags();
                $writingTag->writing_id = $this->id;
                $writingTag->tag_id = $tag->id;
                $writingTag->save();
            }
        }
    }

}
