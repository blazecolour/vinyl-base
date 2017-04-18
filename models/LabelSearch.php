<?php
namespace app\models; 
use app\models\Label;
use yii\data\ActiveDataProvider;

class LabelSearch extends Label
{
	public function rules()
	{
		return [
		[['label_name'], 'string']
		];
	}

	public function scenarios()
	{
		return Label::scenarios();
	}

	public function search($params)
	{
		$query = Label::find();
		$dataProvider = new ActiveDataProvider([
				'query' => $query,
				'pagination' => [
				'pageSize' => 10,
				],
			]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere(['like', 'label_name', $this->label_name]);
		return $dataProvider;
	}	
}