<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MasterMatpel */

$this->title = 'Update Mata Pelajaran: ' . $model->id_master_matpel;
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_master_matpel, 'url' => ['view', 'id' => $model->id_master_matpel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-matpel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
