<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GuruRiwayatPendidikan */

$this->title = 'Create Guru Riwayat Pendidikan';
$this->params['breadcrumbs'][] = ['label' => 'Guru Riwayat Pendidikans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-riwayat-pendidikan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
