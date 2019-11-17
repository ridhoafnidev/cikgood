<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PemesananJadwal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemesanan-jadwal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pemesanan_id')->textInput() ?>

    <?= $form->field($model, 'tgl_pertemuan')->textInput() ?>

    <?= $form->field($model, 'hari')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'waktu')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
