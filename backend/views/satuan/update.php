<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Satuan */

$this->title = 'Update Satuan: ' . $model->id_satuan;
$this->params['breadcrumbs'][] = ['label' => 'Satuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_satuan, 'url' => ['view', 'id' => $model->id_satuan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="satuan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
