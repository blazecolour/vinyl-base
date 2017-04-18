<?php

namespace app\models;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "release".
 *
 * @property integer $id_release
 * @property string $title
 * @property string $format
 * @property string $released
 * @property string $genre
 * @property string $notes
 * @property integer $id_artist
 *
 * @property Artist $idArtist
 * @property ReleaseHasLabel[] $releaseHasLabels
 * @property Track[] $tracks
 */
class Release extends \yii\db\ActiveRecord
{
    public $photoFile = null;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'release';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['title', 'id_artist', 'id_label', 'id_format'], 'required'],
        [['released'], 'safe'],
        [['id_artist'], 'integer'],
        [['title', 'notes'], 'string', 'max' => 255],
        [['genre'], 'string', 'max' => 45],
        [['image'], 'string', 'max' => 255],
        [['id_artist'], 'exist', 'skipOnError' => true, 'targetClass' => Artist::className(), 'targetAttribute' => ['id_artist' => 'id_artist']],
        [['id_label'], 'exist', 'skipOnError' => true, 'targetClass' => Label::className(), 'targetAttribute' => ['id_label' => 'id_label']],
        [['id_format'], 'exist', 'skipOnError' => true, 'targetClass' => Format::className(), 'targetAttribute' => ['id_format' => 'id_format']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        'id_release' => 'Id Release',
        'title' => 'Title',
        'released' => 'Released',
        'genre' => 'Genre',
        'notes' => 'Notes',
        'image' => 'Image',
        'id_artist' => 'Id Artist',
        'id_label' => 'Id Label',
        'id_format' => 'Id Format',
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
        return $this->hasOne(Artist::className(), ['id_artist' => 'id_artist']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getLabel()
    {
        return $this->hasOne(Label::className(), ['id_label' => 'id_label']);
    }

    public function getFormat()
    {
        return $this->hasOne(Format::className(), ['id_format' => 'id_format']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */

    public function getTrack()
    {
        return $this->hasMany(Track::className(), ['id_release' => 'id_release']);
    }
}
