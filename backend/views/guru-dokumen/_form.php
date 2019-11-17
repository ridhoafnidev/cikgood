<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GuruDokumen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guru-dokumen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'guru_id')->textInput() ?>

    <?= $form->field($model, 'jenis_dokumen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dokumen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo_dokumen')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
