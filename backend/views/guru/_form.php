<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Guru */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guru-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'prestasi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pengalaman_kerja')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pengalaman_mengajar')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'riwayat_pendidikan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'photo_ijazah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomor_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'npwp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo_npwp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'norek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pemilik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo_cv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo_sertifikat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Sudah Terverifikasi' => 'Sudah Terverifikasi', 'Belum Terverifikasi' => 'Belum Terverifikasi', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
