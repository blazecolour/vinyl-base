<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

?>


<?= GridView::widget([
	'dataProvider' => $label,
	'filterModel' => $labelSearch,
	'columns' => [
	'label_name',
	'contact_info',
	['class' => 'yii\grid\ActionColumn',
	'template' => '{view} {update}'
	]

	]

	]) ?>


<?= Html::a(
	'Add Label',
	['label/create'],
	['class' => 'btn btn-success']
	)
	?>