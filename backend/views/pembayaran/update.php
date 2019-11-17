<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SaldoMidtrans */

$this->title = 'Update Saldo Midtrans: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Saldo Midtrans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="saldo-midtrans-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
