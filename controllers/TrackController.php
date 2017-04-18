<?php
namespace app\controllers;

use Yii;
use app\models\Track;
use app\models\TrackSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

class TrackController extends \yii\web\Controller
{
	public function actionIndex()
	{
		$tracks = Track::find();
		$search = new TrackSearch();
		$dpTrack = $search->search(Yii::$app->request->get());

		return $this->render('index', [
			'track' => $dpTrack,
			'trackSearch' => $search
			]);	
	}

	public function actionView($id = 1)
	{
		$track = Track::find()
		->where(['id_track' => $id])
		->one();

		return $this->render('view', [
			'oneTrack' => $track
			]);
	}

	public function actionCreate(){
		return $this->actionUpdate();
	}

	public function actionUpdate($id = -1)
	{
		$request = Yii::$app->request;
		$track = Track::find()
		->where(['id_track' => $id])
		->one();
		if (is_null($track))
			$track = new Track;
		if ($request->post('Track')){
			$track->attributes = $request->post('Track');
			if ($track->save()) {
				$this->redirect(['track/view', 'id' => $track->id_track]);
			}
		}
		return $this->render('create', [
			'track' => $track
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
                'allow' => false,
                'actions' => ['update', 'create'],
                'roles' => ['?']
                ],
                [
                'allow' => true,
                'actions' => ['update', 'create'],
                'roles' => ['@']
                ]
            ]
        ]
    ];
    }
}

//Yii::app()->db->getLastInsertId();