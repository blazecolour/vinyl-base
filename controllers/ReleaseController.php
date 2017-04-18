<?php
namespace app\controllers;

use Yii;
use app\models\Release;
use app\models\ReleaseSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

class ReleaseController extends \yii\web\Controller
{
	public function actionIndex()
	{
		$releases = Release::find();
		$search = new ReleaseSearch();
		$dpRelease = $search->search(Yii::$app->request->get());

		return $this->render('index', [
			'release' => $dpRelease,
			'releaseSearch' => $search
			]);	
	}

	public function actionView($id = 1)
	{
		$release = Release::find()
		->where(['id_release' => $id])
		->one();

		return $this->render('view', [
			'oneRelease' => $release
			]);
	}

	public function actionCreate(){
		return $this->actionUpdate();
	}

	public function actionUpdate($id = -1)
	{
		$request = Yii::$app->request;
		$release = Release::find()
		->where(['id_release' => $id])
		->one();
		if (is_null($release))
			$release = new Release;
		if ($request->post('Release')){
			$release->attributes = $request->post('Release');
			if ($release->save()) {
				$this->redirect(['release/view', 'id' => $release->id_release]);
			}
		}
		return $this->render('create', [
			'release' => $release
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