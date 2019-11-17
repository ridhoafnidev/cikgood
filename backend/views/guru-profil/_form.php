<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GuruProfil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guru-profil-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_guru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo_profile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lahir')->textInput() ?>

    <?= $form->field($model, 'jk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provinsi_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kota_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kecamatan_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_ktp')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'provinsi_domisili')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kota_domisili')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kecamatan_domisili')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_domisili')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'biodata')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Sudah Terverifikasi' => 'Sudah Terverifikasi', 'Belum Terverifikasi' => 'Belum Terverifikasi', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
