<?php

namespace app\models;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "label".
 *
 * @property integer $id_label
 * @property string $label_name
 * @property string $description
 * @property string $email
 * @property string $site
 * @property string $contact_info
 *
 * @property ReleaseHasLabel[] $releaseHasLabels
 */
class Label extends \yii\db\ActiveRecord
{
    public $photoFile = null;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'label';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label_name'], 'required'],
            [['description'], 'string'],
            [['label_name', 'email', 'site'], 'string', 'max' => 45],
            [['contact_info'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_label' => 'Id Label',
            'label_name' => 'Label Name',
            'description' => 'Description',
            'email' => 'Email',
            'site' => 'Site',
            'contact_info' => 'Contact Info',
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
 public function getRelease()
    {
        return $this->hasMany(Release::className(), ['id_label' => 'id_label']);
    }
}
