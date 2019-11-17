<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SaldoMidtrans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="saldo-midtrans-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'custom_field1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'custom_field2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_message')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transaction_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'masked_card')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payment_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transaction_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transaction_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fraud_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approval_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'signature_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gross_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'channel_response_message')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'card_type')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
