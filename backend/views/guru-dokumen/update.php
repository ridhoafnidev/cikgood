<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GuruDokumen */

$this->title = 'Update Guru Dokumen: ' . $model->id_dokumen;
$this->params['breadcrumbs'][] = ['label' => 'Guru Dokumens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_dokumen, 'url' => ['view', 'id' => $model->id_dokumen]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guru-dokumen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
