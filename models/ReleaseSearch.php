<?php
namespace app\models; 
use app\models\Release;
use yii\data\ActiveDataProvider;

class ReleaseSearch extends Release
{
	public function rules()
	{
		return [
		[['title', 'genre'], 'string']
		];
	}

	public function scenarios()
	{
		return Release::scenarios();
	}

	public function search($params)
	{
		$query = Release::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'pagination' => [
			'pageSize' => 10,
			],
			]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere(['like', 'title', $this->title])
		->andFilterWhere(['like', 'genre', $this->genre]);
		return $dataProvider;
	}	
}