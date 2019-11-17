<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guru Pengalaman Mengajars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-pengalaman-mengajar-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Guru Pengalaman Mengajar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pengalaman_mengajar',
            'guru_id',
            'pengalaman:ntext',
            'tgl_masuk',
            'tgl_selesai',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
