<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "track".
 *
 * @property integer $id_track
 * @property string $track_name
 * @property string $side
 * @property string $time
 * @property integer $id_release
 *
 * @property Release $idRelease
 */
class Track extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'track';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['track_name', 'id_release'], 'required'],
            [['id_release'], 'integer'],
            [['track_name'], 'string', 'max' => 255],
            [['side', 'time'], 'string', 'max' => 45],
            [['id_release'], 'exist', 'skipOnError' => true, 'targetClass' => Release::className(), 'targetAttribute' => ['id_release' => 'id_release']],
        ];
    }
    public function getRelease()
    {
        return $this->hasOne(Release::className(),['id_release' => 'id_release']);
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_track' => 'Id Track',
            'track_name' => 'Track Name',
            'side' => 'Side',
            'time' => 'Time',
            'id_release' => 'Id Release',
        ];
    }

}
