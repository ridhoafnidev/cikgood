<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Tingkatan */

$this->title = 'Tambah Tingkatan';
$this->params['breadcrumbs'][] = ['label' => 'Tingkatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tingkatan-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
