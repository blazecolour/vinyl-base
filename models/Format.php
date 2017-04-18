<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property integer $id_member
 * @property string $name
 * @property string $surname
 * @property string $description
 * @property integer $id_artist
 *
 * @property Artist $idArtist
 */
class Format extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'format';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['format_type'], 'required'],
            [['format_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_format' => 'Id Format',
            'format_type' => 'Format Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReleases()
    {
        return $this->hasMany(Release::className(), ['id_format' => 'id_format']);
    }
}