
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Kegiatan; 
use dosamigos\ckeditor\CKEditor;
use kartik\date\DatePicker;
// use yii\widget\DatePicker;
// use mihaildev\ckeditor\CKEditor;
// use mihaildev\elfinder\ElFinder;


/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">
	<div class="col-md-12">
		<!-- Form horizontal layout striped -->
		<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','class'=>'form-horizontal panel panel-default']]) ?>

			<div class="panel-heading">
				<h3 class="panel-title">Kegiatan </h3>
			</div>               
			<div class="panel-body">
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Kode Kegiatan</label>
					<div class="col-sm-6">
						<?= $form->field($model, 'kode_kegiatan')->textInput(['maxlength' => true,'placeholder'=>'Kode Kegiatan','data-mask'=>'9999.999.999.999.A','class'=>'form-control'])->label(false) ?>
					</div>
				</div>
				
				
				
			</div>
			<div class="panel-footer">
				<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
				<?php echo \yii\helpers\Html::a( 'Back', Yii::$app->request->referrer,['class'=>'btn btn-inverse']); ?>
			</div>
		<?php ActiveForm::end(); ?>
		<!--/ Form horizontal layout striped -->
	</div>
</div>



