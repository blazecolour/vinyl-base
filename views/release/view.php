<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>


<div class="container">
	<div class="row">
		<div class="col-md-4">
			<?php if ($oneRelease->image): ?>
				<img src="/<?= $oneRelease->image ?>" widht="300" height="300" alt="photo">
			<?php else : ?>
				<img src="http://placehold.it/300x300?text=No+cover">
			<?php endif; ?>
		</div>
		<div class="col-md-8">
			<h3><?= Html::a($oneRelease->artist->artist_name, 
			['artist/view', 'id' => $oneRelease->artist->id_artist]) ?> - 
				<?= $oneRelease->title ?></h3>
				<p><b>Label: </b><?= Html::a($oneRelease->label->label_name, 
				['label/view', 'id' => $oneRelease->label->id_label]) ?></p>
				<p><b>Format: </b><?= $oneRelease->format->format_type ?></p>
				<p><b>Released: </b><?= $oneRelease->released ?></p>
				<p><b>Genre: </b><?= $oneRelease->genre ?></p>
				<p><b>Tracklist: </b></p>
				<table class="table">
					<?php foreach ($oneRelease->track as $track): ?>
						<tr>
							<td><?= $track->side ?></td>
							<td><?= $track->track_name ?></td>
							<td class="text-right"><?= $track->time ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
				<p><b>Notes</b><br><?= $oneRelease->notes ?></p>
			</div>
		</div>
	</div>