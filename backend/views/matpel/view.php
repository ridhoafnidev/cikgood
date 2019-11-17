<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Matpel */

$this->title = $model->id_guru_bahan_ajar_matpel;
$this->params['breadcrumbs'][] = ['label' => 'Matpels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matpel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_guru_bahan_ajar_matpel], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_guru_bahan_ajar_matpel], [
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
            'id_guru_bahan_ajar_matpel',
            'guru_id',
            'matpel_id',
            'tarif',
        ],
    ]) ?>

</div>
