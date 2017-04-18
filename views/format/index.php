<?php
use yii\helpers\Html;
?>

<ul>

	<?php foreach ($formats as $item): ?>

		<li><?= Html::a($item->format_type,
			['format/view', 'id' => $item->id_format]) 
		?></li>

	<?php endforeach; ?>

</ul> 

<?= Html::a(
	'Add Format',
	['format/create'],
	['class' => 'btn btn-success']
	)
	?>