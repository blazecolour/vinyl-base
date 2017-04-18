<?php
namespace app\controllers;

use Yii;
use app\models\Label;
use app\models\LabelSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

class LabelController extends \yii\web\Controller
{
	public function actionIndex()
	{
		$labels = Label::find();
		$search = new LabelSearch();
		$dpLabel = $search->search(Yii::$app->request->get());

		return $this->render('index', [
			'label' => $dpLabel,
			'labelSearch' => $search
			]);	
	}

	public function actionView($id = 1)
	{
		$label = Label::find()
		->where(['id_label' => $id])
		->one();

		return $this->render('view', [
			'oneLabel' => $label
			]);
	}

	public function actionCreate(){
		return $this->actionUpdate();
	}

	public function actionUpdate($id = -1)
	{
		$request = Yii::$app->request;
		$label = Label::find()
		->where(['id_label' => $id])
		->one();
		if (is_null($label))
			$label = new Label;
		if ($request->post('Label')){
			$label->attributes = $request->post('Label');
			if ($label->save()) {
				$this->redirect(['label/view', 'id' => $label->id_label]);
			}
		}
		return $this->render('create', [
			'label' => $label
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