<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<?php if ($oneArtist->image): ?>
				<img src="/<?= $oneArtist->image ?>" class= "img-circle" widht="300" height="300" alt="photo">
			<?php else : ?>
				<img src="http://placehold.it/300x300?text=No+photo">
			<?php endif; ?>
		</div>
		<div class="col-md-8">
			<h3><?= $oneArtist->artist_name ?></h3>
			<p><b>Description</b><br><?= $oneArtist->description ?></p>
			<p><b>Site: </b><br><?= Html::a($oneArtist->site, $oneArtist->site) ?></p>
			<p><b>Members: </b>
				<ul>
					<?php foreach ($oneArtist->member as $member): ?>
						<li>
							<?= Html::a($member->name . '&nbsp;' . $member->surname, 
							['member/view', 'id' => $member->id_member]) ?>
						</li>
					<?php endforeach; ?>
				</ul>
				<p><b>Releases: </b>
					<table class="table">
						<tr>
							<th>Title</th>
							<th>Format</th>
							<th>Label</th>
							<th class="text-right">Released</th>
						</tr>
						<?php foreach ($oneArtist->releases as $release): ?>
							<tr>
								<td><?= Html::a($release->title, 
									['release/view', 'id' => $release->id_release]) ?></td>
									<td><?= $release->format->format_type ?></td>
									<td><?= Html::a($release->label->label_name, 
										['label/view', 'id' => $release->label->id_label]) ?></td>
										<td class="text-right"><?= $release->released ?></td>
									</tr>
								<?php endforeach; ?>
							</table>
						</p>
					</div>
				</div>
			</div>