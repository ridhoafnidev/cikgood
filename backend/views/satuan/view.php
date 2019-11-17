<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Satuan */

$this->title = $model->id_satuan;
$this->params['breadcrumbs'][] = ['label' => 'Satuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="satuan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_satuan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_satuan], [
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
            'id_satuan',
            'nama_satuan',
        ],
    ]) ?>

</div>
