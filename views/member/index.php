<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

?>


<?= GridView::widget([
	'dataProvider' => $member,
	'filterModel' => $memberSearch,
	'columns' => [
	'name',
	'surname',
	'description',
	['class' => 'yii\grid\ActionColumn',
	'template' => '{view} {update}'
	]

	]

	]) ?>


<?= Html::a(
	'Add Member',
	['member/create'],
	['class' => 'btn btn-success']
	)
	?>