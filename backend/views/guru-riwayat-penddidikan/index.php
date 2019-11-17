<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guru Riwayat Pendidikans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-riwayat-pendidikan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Guru Riwayat Pendidikan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_riwayat_pendidikan',
            'guru_id',
            'gelar',
            'jenis_institusi',
            'nama_institusi',
            // 'jurusan',
            // 'tahun_masuk',
            // 'tahun_selesai',
            // 'photo_ijazah',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
