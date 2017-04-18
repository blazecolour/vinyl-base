<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

?>


<?= GridView::widget([
'dataProvider' => $artist,
'filterModel' => $artistSearch,
'columns' => [
   'artist_name',
   ['class' => 'yii\grid\ActionColumn',
   'template' => '{view} {update}'
   ]

]

]) ?>


<?= Html::a(
'Add Artist',
['artist/create'],
['class' => 'btn btn-success']
)
?>