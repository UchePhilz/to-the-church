<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "writing_tags".
 *
 * @property int $writing_id
 * @property int $tag_id
 *
 * @property Tags $tag
 * @property Writings $writing
 */
class WritingTags extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'writing_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['writing_id', 'tag_id'], 'required'],
            [['writing_id', 'tag_id'], 'integer'],
            [['writing_id', 'tag_id'], 'unique', 'targetAttribute' => ['writing_id', 'tag_id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tags::class, 'targetAttribute' => ['tag_id' => 'id']],
            [['writing_id'], 'exist', 'skipOnError' => true, 'targetClass' => Writings::class, 'targetAttribute' => ['writing_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'writing_id' => 'Writing ID',
            'tag_id' => 'Tag ID',
        ];
    }

    /**
     * Gets query for [[Tag]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tags::class, ['id' => 'tag_id']);
    }

    /**
     * Gets query for [[Writing]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWriting()
    {
        return $this->hasOne(Writings::class, ['id' => 'writing_id']);
    }

}
