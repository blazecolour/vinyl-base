<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

?>


<?= GridView::widget([
	'dataProvider' => $release,
	'filterModel' => $releaseSearch,
	'columns' => [
	'title',
	'released',
	'genre',
	'artist.artist_name',
	'label.label_name',
	'format.format_type',
	['class' => 'yii\grid\ActionColumn',
	'template' => '{view} {update}'
	]
	]
	]) ?>


<?= Html::a(
	'Add Release',
	['release/create'],
	['class' => 'btn btn-success']
	)
	?>