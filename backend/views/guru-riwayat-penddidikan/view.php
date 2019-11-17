<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\GuruRiwayatPendidikan */

$this->title = $model->id_riwayat_pendidikan;
$this->params['breadcrumbs'][] = ['label' => 'Guru Riwayat Pendidikans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-riwayat-pendidikan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_riwayat_pendidikan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_riwayat_pendidikan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_riwayat_pendidikan',
            'guru_id',
            'gelar',
            'jenis_institusi',
            'nama_institusi',
            'jurusan',
            'tahun_masuk',
            'tahun_selesai',
            'photo_ijazah',
        ],
    ]) ?>

</div>
