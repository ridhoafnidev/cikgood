<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GuruBahanAjarMatpel */

$this->title = 'Create Guru Bahan Ajar Matpel';
$this->params['breadcrumbs'][] = ['label' => 'Guru Bahan Ajar Matpels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-bahan-ajar-matpel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
