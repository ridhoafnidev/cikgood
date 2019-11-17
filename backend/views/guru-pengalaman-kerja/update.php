<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GuruPengalamanMengajar */

$this->title = 'Update Guru Pengalaman Mengajar: ' . $model->id_pengalaman_mengajar;
$this->params['breadcrumbs'][] = ['label' => 'Guru Pengalaman Mengajars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pengalaman_mengajar, 'url' => ['view', 'id' => $model->id_pengalaman_mengajar]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guru-pengalaman-mengajar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
