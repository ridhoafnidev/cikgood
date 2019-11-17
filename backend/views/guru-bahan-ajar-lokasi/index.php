<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guru Bahan Ajar Lokasis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-bahan-ajar-lokasi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Guru Bahan Ajar Lokasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_bahan_ajar_lokasi',
            'guru_id',
            'provinsi',
            'kota',
            'kecamatan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
