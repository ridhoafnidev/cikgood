<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DataMatpel */

$this->title = 'Update Data Matpel: ' . $model->id_matpel;
$this->params['breadcrumbs'][] = ['label' => 'Data Matpels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_matpel, 'url' => ['view', 'id' => $model->id_matpel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-matpel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
