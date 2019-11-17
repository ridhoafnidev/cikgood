<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GuruRiwayatPendidikan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guru-riwayat-pendidikan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_riwayat_pendidikan')->textInput() ?>

    <?= $form->field($model, 'guru_id')->textInput() ?>

    <?= $form->field($model, 'gelar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_institusi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_institusi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jurusan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_masuk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_selesai')->textInput() ?>

    <?= $form->field($model, 'photo_ijazah')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
