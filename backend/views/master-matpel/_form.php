
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Satuan; 
use dosamigos\ckeditor\CKEditor;
use kartik\date\DatePicker;
?>

<div class="post-form">
	<div class="col-md-12">
		<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','class'=>'form-horizontal panel panel-default']]) ?>

			<div class="panel-heading">
				<h3 class="panel-title">Mata Pelajaran </h3>
			</div>  

			<div class="panel-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">Mata Pelajaran</label>
					<div class="col-sm-9">
						<?= $form->field($model, 'nama')->textInput(['maxlength' => true,'placeholder'=>'Mata Pelajaran','class'=>'form-control'])->label(false) ?>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
				<button type="reset" class="btn btn-inverse">Reset</button>
			</div>
		<?php ActiveForm::end(); ?>
		<!--/ Form horizontal layout striped -->
	</div>
</div>



