<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemesanan Jadwals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-jadwal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pemesanan Jadwal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pemesanan_jadwal',
            'pemesanan_id',
            'tgl_pertemuan',
            'hari',
            'waktu',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
