<?php
namespace app\controllers;

use Yii;
use app\models\Format;
use app\models\FormatSearch;
use yii\data\ActiveDataProvider;

class FormatController extends \yii\web\Controller
{
	
	public function actionIndex()
	{
		$formats = Format::find()->all();

		return $this->render('index', ['formats' => $formats]);
	}

	public function actionView($id)
	{
		$formats = Format::find()
		->where(['id_format' => $id])
		->one();

		return $this->render('view', [
			'oneFormat' => $formats
			]);
	}

public function actionCreate(){
		return $this->actionUpdate();
	}

	public function actionUpdate($id = -1)
	{
		$request = Yii::$app->request;
		$format = Format::find()
		->where(['id_format' => $id])
		->one();
		if (is_null($format))
			$format = new Format;
		if ($request->post('Format')){
			$format->attributes = $request->post('Format');
			if ($format->save()) {
				$this->redirect(['format/view', 'id' => $format->id_format]);
			}
		}
		return $this->render('create', [
			'format' => $format
			]);
		}
	}