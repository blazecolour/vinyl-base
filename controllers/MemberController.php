<?php
namespace app\controllers;

use Yii;
use app\models\Member;
use app\models\MemberSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

class MemberController extends \yii\web\Controller
{
	public function actionIndex()
	{
		$member = Member::find();
		$search = new MemberSearch();
		$dpMember = $search->search(Yii::$app->request->get());

		return $this->render('index', [
			'member' => $dpMember,
			'memberSearch' => $search
			]);	
	}

	public function actionView($id = 1)
	{
		$member = Member::find()
		->where(['id_member' => $id])
		->one();

		return $this->render('view', [
			'oneMember' => $member
			]);
	}

	public function actionCreate(){
		return $this->actionUpdate();
	}

	public function actionUpdate($id = -1)
	{
		$request = Yii::$app->request;
		$member = Member::find()
		->where(['id_member' => $id])
		->one();
		if (is_null($member))
			$member = new Member;
		if ($request->post('Member')){
			$member->attributes = $request->post('Member');
			if ($member->save()) {
				$this->redirect(['member/view', 'id' => $member->id_member]);
			}
		}
		return $this->render('create', [
			'member' => $member
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