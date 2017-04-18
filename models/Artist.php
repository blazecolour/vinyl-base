<?php

namespace app\models;
use yii\web\UploadedFile;
use Yii;
use app\models\Member;

/**
 * This is the model class for table "artist".
 *
 * @property integer $id_artist
 * @property string $artist_name
 * @property string $description
 * @property string $site
 *
 * @property Member[] $members
 * @property Release[] $releases
 */
class Artist extends \yii\db\ActiveRecord
{
    public $photoFile = null;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'artist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['artist_name'], 'required'],
            [['description'], 'string'],
            [['artist_name'], 'string', 'max' => 255],
            [['site'], 'string', 'max' => 45],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_artist' => 'Id Artist',
            'artist_name' => 'Artist',
            'description' => 'Description',
            'site' => 'Site',
            'image' => 'Image',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)){
            $this->upload();
            return true;
        }else {
            return false;
        }
    }

    public function upload()
    {    $this->photoFile = UploadedFile::getInstance($this, 'photoFile');
        if (is_null($this->photoFile)) return true;
        if ($this->validate()){
            $fileName = 'uploads/' . $this->photoFile->baseName
            . '.' . $this->photoFile->extension;
            $this->photoFile->saveAs($fileName);
            $this->image = $fileName;

            return true;
        } else {
            return false;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasMany(Member::className(), ['id_member' => 'id_member'])
            ->viaTable('member_artist', ['id_artist' => 'id_artist']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReleases()
    {
        return $this->hasMany(Release::className(), ['id_artist' => 'id_artist']);
    }
}
