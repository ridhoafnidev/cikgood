<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GuruDokumen */

$this->title = 'Create Guru Dokumen';
$this->params['breadcrumbs'][] = ['label' => 'Guru Dokumens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-dokumen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
