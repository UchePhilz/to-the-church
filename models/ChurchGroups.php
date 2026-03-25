<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "church_groups".
 *
 * @property int $id
 * @property string $name
 * @property string|null $url_tag
 *
 * @property Writings[] $writings
 */
class ChurchGroups extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'church_groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'url_tag'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url_tag' => 'Url Tag',
        ];
    }

    /**
     * Gets query for [[Writings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWritings()
    {
        return $this->hasMany(Writings::class, ['church_group_id' => 'id']);
    }

}
