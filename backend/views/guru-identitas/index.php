<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guru Identitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-identitas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Guru Identitas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_identitas',
            'guru_id',
            'nomor_ktp',
            'photo_ktp',
            'npwp',
            // 'photo_npwp',
            // 'nama_bank',
            // 'nomor_rekening',
            // 'nama_pemilik_rekening',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
