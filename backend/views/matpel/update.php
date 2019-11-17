<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Matpel */

$this->title = 'Update Matpel: ' . $model->id_guru_bahan_ajar_matpel;
$this->params['breadcrumbs'][] = ['label' => 'Matpels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_guru_bahan_ajar_matpel, 'url' => ['view', 'id' => $model->id_guru_bahan_ajar_matpel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="matpel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
