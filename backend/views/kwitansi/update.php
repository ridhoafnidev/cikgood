<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Kwitansi */

$this->title = 'Update Kwitansi: ' . $model->id_kwitansi;
$this->params['breadcrumbs'][] = ['label' => 'Kwitansi', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
$this->params['breadcrumbs'][] = ['label' => $model->id_kwitansi];
?>
<div class="kwitansi-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
