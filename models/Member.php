<?php

namespace app\models;
use yii\web\UploadedFile;
use Yii;
use app\models\Artist;

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
class Member extends \yii\db\ActiveRecord
{
    public $photoFile = null;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name', 'surname'], 'string', 'max' => 45],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_member' => 'Id Member',
            'name' => 'Name',
            'surname' => 'Surname',
            'description' => 'Description',
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
    public function getArtist()
    {
        return $this->hasMany(Artist::className(), ['id_artist' => 'id_artist'])
            ->viaTable('member_artist', ['id_member' => 'id_member']);
    }


}


