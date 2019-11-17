<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pemesanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemesanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'guru_id')->textInput() ?>

    <?= $form->field($model, 'murid_id')->textInput() ?>

    <?= $form->field($model, 'matpel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_pertemuan')->textInput() ?>

    <?= $form->field($model, 'durasi')->textInput() ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'lng')->textInput() ?>

    <?= $form->field($model, 'jadwal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pesan_tambahan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'harga_total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
