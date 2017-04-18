<?php
namespace app\controllers;

use Yii;
use app\models\Artist;
use app\models\ArtistSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use app\rbac\ArtistRule;

class ArtistController extends \yii\web\Controller
{
	public function actionIndex()
	{
		$artists = Artist::find();
		$search = new ArtistSearch();
		$dpArtist = $search->search(Yii::$app->request->get());

		return $this->render('index', [
			'artist' => $dpArtist,
			'artistSearch' => $search
			]);	
	}

	public function actionView($id = 1)
	{
		$artist = Artist::find()
		->where(['id_artist' => $id])
		->one();

		return $this->render('view', [
			'oneArtist' => $artist
			]);
	}

	public function actionCreate(){
		return $this->actionUpdate();
	}

	public function actionUpdate($id = -1)
	{
		$request = Yii::$app->request;
		$artist = Artist::find()
		->where(['id_artist' => $id])
		->one();
		if (is_null($artist))
			$artist = new Artist;
		if ($request->post('Artist')){
			$artist->attributes = $request->post('Artist');
			if ($artist->save()) {
				$this->redirect(['artist/view', 'id' => $artist->id_artist]);
			}
		}
		return $this->render('create', [
			'artist' => $artist
			]);
	}
	
	public function behaviors()
    {
        return [
            'access' => [
            'class' => AccessControl::className(),
            'only' => ['update', 'create'],
            'rules' => [
                [
                'allow' => true,
                'actions' => ['index'],
                'roles' => ['?']
                ],
                [
                'allow' => true,
                'actions' => ['update', 'create'],
                'roles' => ['createArtist']
                ]
            ]
        ]
    ];
    }

}

//Yii::app()->db->getLastInsertId();