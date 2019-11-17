<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DataMatpel */

$this->title = $model['id_matpel'];
$this->params['breadcrumbs'][] = ['label' => 'Data Matpels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-matpel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model['id_matpel'] ], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model['id_matpel']], [
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
            'id_matpel',
            'tingkatan',
            'nama',
            'matpel_detail',
        ],
    ]) ?>

</div>
