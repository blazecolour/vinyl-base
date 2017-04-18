<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin(); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<?= $form->field($artist, 'artist_name'); ?>
			<?= $form->field($artist, 'description')->textarea(['rows' => 3, 'cols' => 3]); ?>
			<?= $form->field($artist, 'site'); ?>
			<?= $form->field($artist, 'photoFile')->fileInput(); ?>
			<?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
		</div>
	</div>
</div>
<?php ActiveForm::end(); ?>