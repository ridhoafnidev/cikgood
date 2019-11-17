<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\GuruIdentitas */

$this->title = $model->id_identitas;
$this->params['breadcrumbs'][] = ['label' => 'Guru Identitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-identitas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_identitas], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_identitas], [
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
            'id_identitas',
            'guru_id',
            'nomor_ktp',
            'photo_ktp',
            'npwp',
            'photo_npwp',
            'nama_bank',
            'nomor_rekening',
            'nama_pemilik_rekening',
        ],
    ]) ?>

</div>
