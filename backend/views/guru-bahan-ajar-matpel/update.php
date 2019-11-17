<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GuruBahanAjarMatpel */

$this->title = 'Update Guru Bahan Ajar Matpel: ' . $model->id_guru_bahan_ajar_matpel;
$this->params['breadcrumbs'][] = ['label' => 'Guru Bahan Ajar Matpels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_guru_bahan_ajar_matpel, 'url' => ['view', 'id' => $model->id_guru_bahan_ajar_matpel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guru-bahan-ajar-matpel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
