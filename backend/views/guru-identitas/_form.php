<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GuruIdentitas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guru-identitas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'guru_id')->textInput() ?>

    <?= $form->field($model, 'nomor_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'npwp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo_npwp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomor_rekening')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pemilik_rekening')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
