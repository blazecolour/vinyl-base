<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin(); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<?= $form->field($member, 'name'); ?>
			<?= $form->field($member, 'surname'); ?>
			<?= $form->field($member, 'description')->textarea(['rows' => 3, 'cols' => 3]); ?>
			<?= $form->field($member, 'photoFile')->fileInput(); ?>
			<?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
		</div>
	</div>
</div>

<?php ActiveForm::end(); ?>