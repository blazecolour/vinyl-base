<?php
namespace app\models; 
use app\models\Track;
use yii\data\ActiveDataProvider;

class TrackSearch extends Track
{
	public function rules()
	{
		return [
		[['track_name'], 'string']
		];
	}

	public function scenarios()
	{
		return Track::scenarios();
	}

	public function search($params)
	{
		$query = Track::find();
		$dataProvider = new ActiveDataProvider([
				'query' => $query,
				'pagination' => [
				'pageSize' => 10,
				],
			]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere(['like', 'track_name', $this->track_name]);
		return $dataProvider;
	}	
}