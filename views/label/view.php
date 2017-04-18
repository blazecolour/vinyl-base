<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
		<?php if ($oneLabel->image): ?>
				<img src="/<?= $oneLabel->image ?>" widht="300" height="300" alt="photo">
			<?php else : ?>
				<img src="http://placehold.it/300x300?text=No+cover">
			<?php endif; ?>
		</div>
		<div class="col-md-8">
			<h3><?= $oneLabel->label_name ?></h3>
			<p><b>Description</b><br><?= $oneLabel->description ?></p>
			<p><b>Email: </b><?= Html::mailto($oneLabel->email, $oneLabel->email) ?></p>
			<p><b>Site: </b><?= Html::a($oneLabel->site, $oneLabel->site) ?></p>
			<p><b>Contact info: </b><?= $oneLabel->contact_info ?></p>
			<p><b>Releases: </b>
				<table class="table">
						<tr>
							<th>Artist</th>
							<th>Title</th>
							<th>Format</th>
							<th class="text-right">Released</th>
						</tr>
						<tr>
					<?php foreach ($oneLabel->release as $release): ?>
							<td><?= Html::a($release->artist->artist_name, 
							['artist/view', 'id' => $release->artist->id_artist]) ?></td>
							<td><?= Html::a($release->title, 
							['release/view', 'id' => $release->id_release]) ?></td>
							<td><?= $release->format->format_type ?></td>
							<td class="text-right"><?= $release->released ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
			</p>
		</div>
	</div>
</div>