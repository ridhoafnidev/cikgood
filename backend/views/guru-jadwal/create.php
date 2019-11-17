<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GuruJadwal */

$this->title = 'Create Guru Jadwal';
$this->params['breadcrumbs'][] = ['label' => 'Guru Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-jadwal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
