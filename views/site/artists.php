
<?php 
use app\components\widgets\artist\ArtistWidget;
?>


<?php foreach ($artists as $item) : ?>
<?= ArtistWidget::widget([
'artist' => $item
]) ?>


<?php endforeach; ?>