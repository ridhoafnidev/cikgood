
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Category; 
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
<!--mulai-->
	<div class="widget">
		<div class="widget-header transparent">
			<h2><strong>Form</strong> Category</h2>
			<div class="additional-btn">
				<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
				<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
				<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
			</div>
		</div>
		<div class="widget-content padding">
			<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','class'=>'form-horizontal']]) ?>
			

			<div class="form-group">
				<label for="input-text-help" class="col-sm-2 control-label">import</label>
				<div class="col-sm-10">
					
					<?= $form->field($model, 'file_excel')->fileInput(['class'=>'btn btn-default'])->label(false) ?>
				</div>
			</div>

			
			  
			<div class="form-group">
				<div class="col-sm-offset-10 col-sm-10">
				<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
				</div>
			</div>
			
		<?php ActiveForm::end(); ?>
		</div>
	</div>
<!--akhir-->
</div>

