<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GuruProfil */

$this->title = 'Update Guru Profil: ' . $model->id_guru;
$this->params['breadcrumbs'][] = ['label' => 'Guru Profils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_guru, 'url' => ['view', 'id' => $model->id_guru]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guru-profil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
