<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PemesananJadwal */

$this->title = 'Update Pemesanan Jadwal: ' . $model->id_pemesanan_jadwal;
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pemesanan_jadwal, 'url' => ['view', 'id' => $model->id_pemesanan_jadwal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pemesanan-jadwal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
