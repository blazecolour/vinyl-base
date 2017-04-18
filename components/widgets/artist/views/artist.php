<?php
use app\components\widgets\artist\ArtistWidgetAsset;
ArtistWidgetAsset::register($this);
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="artist col-md-2 col-sm-2">
	<div class="cover">
		<?php if ($artist->image): ?>
			<img src="/<?= $artist->image ?>" class= "img-circle" widht="150" height="150" alt="photo">
		<?php else : ?>
			<img src="http://placehold.it/300x300?text=No+photo">
		<?php endif; ?>
	</div>
	<div class="artist__name text-center">
		<h4>
			<?= Html::a($artist->artist_name, ['artist/view', 'id' => $artist->id_artist]) ?>
		</h4>
	</div>
</div>