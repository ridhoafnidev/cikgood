<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GuruJadwal */

$this->title = 'Update Guru Jadwal: ' . $model->id_jadwal;
$this->params['breadcrumbs'][] = ['label' => 'Guru Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jadwal, 'url' => ['view', 'id' => $model->id_jadwal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guru-jadwal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
