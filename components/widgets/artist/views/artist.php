<?php
use app\components\widgets\artist\ArtistWidgetAsset;
ArtistWidgetAsset::register($this);
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="artist col-md-2 col-sm-2">
	<div class="cover">
		<?php if ($artist->image): ?>			
			<?= Html::a(Html::img($artist->image, [
				'class' => 'img-circle',
				'width' => '150',
				'height' => '150',
				'alt' => 'photo'
				]), 
				['artist/view', 'id' => $artist->id_artist]) ?>

			<?php else : ?>
				<img src="http://placehold.it/300x300?text=No+photo">
			<?php endif; ?>
		</div>
	</div>