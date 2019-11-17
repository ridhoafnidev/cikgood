<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Guru */

$this->title = $model->id_guru;
$this->params['breadcrumbs'][] = ['label' => 'Gurus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_guru], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_guru], [
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
            'id_guru',
            'nama',
            'photo_profile',
            'email:email',
            'no_hp',
            'password',
            'tgl_lahir',
            'jk',
            'provinsi_ktp',
            'kota_ktp',
            'kecamatan_ktp',
            'alamat_ktp:ntext',
            'provinsi_domisili',
            'kota_domisili',
            'kecamatan_domisili',
            'alamat_domisili:ntext',
            'biodata:ntext',
            'prestasi:ntext',
            'pengalaman_kerja:ntext',
            'pengalaman_mengajar:ntext',
            'riwayat_pendidikan:ntext',
            'photo_ijazah',
            'nomor_ktp',
            'photo_ktp',
            'npwp',
            'photo_npwp',
            'nama_bank',
            'norek',
            'nama_pemilik',
            'photo_cv',
            'photo_sertifikat',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
