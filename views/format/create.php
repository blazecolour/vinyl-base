<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin(); ?>
<div class="container-fluid">
	<div class="row">
<div class="col-md-6">
<?= $form->field($format, 'format_type'); ?>
<?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
</div>
</div>
</div>
<?php ActiveForm::end(); ?>