<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SaldoMidtrans */

$this->title = 'Create Saldo Midtrans';
$this->params['breadcrumbs'][] = ['label' => 'Saldo Midtrans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saldo-midtrans-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
