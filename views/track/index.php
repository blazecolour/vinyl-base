<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

?>


<?= GridView::widget([
	'dataProvider' => $track,
	'filterModel' => $trackSearch,
	'columns' => [
	'track_name',
	'side',
	'time',
	'release.title',
	['class' => 'yii\grid\ActionColumn',
	'template' => '{view} {update}'
	]

	]

	]) ?>


<?= Html::a(
	'Add Track',
	['track/create'],
	['class' => 'btn btn-success']
	)
	?>