<?php
namespace app\models; 
use app\models\Member;
use yii\data\ActiveDataProvider;

class MemberSearch extends Member
{
	public function rules()
	{
		return [
		[['name', 'surname'], 'string']
		];
	}

	public function scenarios()
	{
		return Member::scenarios();
	}

	public function search($params)
	{
		$query = Member::find();
		$dataProvider = new ActiveDataProvider([
				'query' => $query,
				'pagination' => [
				'pageSize' => 10,
				],
			]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere(['like', 'name', $this->name])
			->andFilterWhere(['like', 'surname', $this->surname]);
		return $dataProvider;
	}	
}