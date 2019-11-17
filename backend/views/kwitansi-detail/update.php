<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KwitansiDetail */

$this->title = 'Update Kwitansi Detail: ' . $model->id_kd;
$this->params['breadcrumbs'][] = ['label' => 'Kwitansi Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kd, 'url' => ['view', 'id' => $model->id_kd]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kwitansi-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
