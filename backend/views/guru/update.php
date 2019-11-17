<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Guru */

$this->title = 'Update Guru: ' . $model->id_guru;
$this->params['breadcrumbs'][] = ['label' => 'Gurus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_guru, 'url' => ['view', 'id' => $model->id_guru]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guru-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
