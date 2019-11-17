<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MasterMatpel */

$this->title = 'Tambah Mata Pelajaran';
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-matpel-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
