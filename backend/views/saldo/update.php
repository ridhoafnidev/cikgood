<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Saldo */

$this->title = 'Update Saldo: ' . $model->id_saldo;
$this->params['breadcrumbs'][] = ['label' => 'Saldos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_saldo, 'url' => ['view', 'id' => $model->id_saldo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="saldo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
