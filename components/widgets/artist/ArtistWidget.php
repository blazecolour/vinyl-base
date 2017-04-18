<?php
namespace app\components\widgets\artist;
use yii\base\Widget;

class ArtistWidget extends Widget

{
    public  $artist;

    public function init()
    {
        parent::init();
        // $this->registerAssets();
    }

    public function run()
    {
        //return $this->artist->artist_name;
      
        return $this->render('artist', [
            'artist' => $this->artist
        ]);
    }

    // public function registerAssets()
    // {
    //     $view = $this->getView();
    //     AdvWidgetAsset::register($view);
    // }
}