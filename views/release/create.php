<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\Format;
use yii\helpers\ArrayHelper;

$formats = Format::find()->all();

$formatList = ArrayHelper::map($formats, 'id_format', 'format_type');

$form = ActiveForm::begin(); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<?= $form->field($release, 'title'); ?>
			<?= $form->field($release, 'released'); ?>
			<?= $form->field($release, 'genre'); ?>
			<?= $form->field($release, 'notes'); ?>
			<?= $form->field($release, 'id_artist'); ?>
			<?= $form->field($release, 'id_label'); ?>
			<?= $form->field($release, 'id_format')->dropDownList($formatList); ?>
			<?= $form->field($release, 'photoFile')->fileInput(); ?>
			<?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
		</div>
	</div>
</div>

<?php ActiveForm::end(); ?>