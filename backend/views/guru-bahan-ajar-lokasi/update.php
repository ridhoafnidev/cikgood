<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GuruBahanAjarLokasi */

$this->title = 'Update Guru Bahan Ajar Lokasi: ' . $model->id_bahan_ajar_lokasi;
$this->params['breadcrumbs'][] = ['label' => 'Guru Bahan Ajar Lokasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bahan_ajar_lokasi, 'url' => ['view', 'id' => $model->id_bahan_ajar_lokasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guru-bahan-ajar-lokasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
