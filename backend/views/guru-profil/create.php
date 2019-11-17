<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GuruProfil */

$this->title = 'Create Guru Profil';
$this->params['breadcrumbs'][] = ['label' => 'Guru Profils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-profil-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
