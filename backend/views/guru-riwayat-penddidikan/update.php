<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GuruRiwayatPendidikan */

$this->title = 'Update Guru Riwayat Pendidikan: ' . $model->id_riwayat_pendidikan;
$this->params['breadcrumbs'][] = ['label' => 'Guru Riwayat Pendidikans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_riwayat_pendidikan, 'url' => ['view', 'id' => $model->id_riwayat_pendidikan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guru-riwayat-pendidikan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
