<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<?php if ($oneMember->image): ?>
				<img src="/<?= $oneMember->image ?>" widht="300" height="300" alt="photo">
			<?php else : ?>
				<img src="http://placehold.it/300x300?text=No+photo">
			<?php endif; ?>
		</div>
		<div class="col-md-8">
			<h3><?= $oneMember->name ?>
				<?= $oneMember->surname ?></h3>
				<p><b>Description</b><br><?= $oneMember->description ?></p>
				<p><b>In Groups: </b>
					<ul>
						<?php foreach ($oneMember->artist as $artist): ?>
							<li><?= Html::a($artist->artist_name, 
								['artist/view', 'id' => $artist->id_artist]) ?></li>
							<?php endforeach; ?>
						</ul> 
					</p>
				</div>
			</div>
		</div>