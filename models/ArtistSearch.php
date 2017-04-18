<?php
namespace app\models; 
use app\models\Artist;
use yii\data\ActiveDataProvider;

class ArtistSearch extends Artist
{
	public function rules()
	{
		return [
		[['artist_name'], 'string']
		];
	}

	public function scenarios()
	{
		return Artist::scenarios();
	}

	public function search($params)
	{
		$query = Artist::find();
		$dataProvider = new ActiveDataProvider([
				'query' => $query,
				'pagination' => [
				'pageSize' => 10,
				],
			]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere(['like', 'artist_name', $this->artist_name]);
		return $dataProvider;
	}	
}