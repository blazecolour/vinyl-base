<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<?php if ($oneTrack->release->image): ?>
				<img src="/<?= $oneTrack->release->image ?>" widht="300" height="300" alt="photo">
			<?php else : ?>
				<img src="http://placehold.it/300x300?text=No+cover">
			<?php endif; ?>
		</div>
		<div class="col-md-8">
			<h3><?= Html::a($oneTrack->release->artist->artist_name, 
				['artist/view', 'id' => $oneTrack->release->artist->id_artist]) ?> - <?= $oneTrack->track_name ?></h3>
				<p><b>Side: </b><?= $oneTrack->side ?></p>
				<p><b>Time: </b><?= $oneTrack->time ?></p>
			</div>
		</div>
	</div>