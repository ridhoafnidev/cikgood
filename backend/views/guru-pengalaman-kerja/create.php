<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GuruPengalamanMengajar */

$this->title = 'Create Guru Pengalaman Mengajar';
$this->params['breadcrumbs'][] = ['label' => 'Guru Pengalaman Mengajars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-pengalaman-mengajar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
