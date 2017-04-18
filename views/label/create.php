<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin(); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<?= $form->field($label, 'label_name'); ?>
			<?= $form->field($label, 'description')->textarea(['rows' => 3, 'cols' => 3]); ?>
			<?= $form->field($label, 'email'); ?>
			<?= $form->field($label, 'site'); ?>
			<?= $form->field($label, 'contact_info'); ?>
			<?= $form->field($label, 'photoFile')->fileInput(); ?>
			<?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
		</div>
	</div>
</div>
<?php ActiveForm::end(); ?>