<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

?>

<h2>Карта сайта:</h2>
<br>
<h3>
	<ul>
		<li>
			<?= Html::a('Labels', ['label/index']) ?>
			</li><br>
		<li>
			<?= Html::a('Artists', ['artist/index']) ?>
		</li><br>
		<li>
			<?= Html::a('Releases', ['release/index']) ?>
		</li><br>
		<li>
			<?= Html::a('Members', ['member/index']) ?>
		</li><br>
		<li>
			<?= Html::a('Tracklist', ['track/index']) ?>
		</li><br>
				<li>
			<?= Html::a('Formats', ['format/index']) ?>
		</li>
	</ul>
</h3>