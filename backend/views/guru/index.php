<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gurus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Guru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_guru',
            'nama',
            'photo_profile',
            'email:email',
            'no_hp',
            // 'password',
            // 'tgl_lahir',
            // 'jk',
            // 'provinsi_ktp',
            // 'kota_ktp',
            // 'kecamatan_ktp',
            // 'alamat_ktp:ntext',
            // 'provinsi_domisili',
            // 'kota_domisili',
            // 'kecamatan_domisili',
            // 'alamat_domisili:ntext',
            // 'biodata:ntext',
            // 'prestasi:ntext',
            // 'pengalaman_kerja:ntext',
            // 'pengalaman_mengajar:ntext',
            // 'riwayat_pendidikan:ntext',
            // 'photo_ijazah',
            // 'nomor_ktp',
            // 'photo_ktp',
            // 'npwp',
            // 'photo_npwp',
            // 'nama_bank',
            // 'norek',
            // 'nama_pemilik',
            // 'photo_cv',
            // 'photo_sertifikat',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
