<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GuruBahanAjarLokasi */

$this->title = 'Create Guru Bahan Ajar Lokasi';
$this->params['breadcrumbs'][] = ['label' => 'Guru Bahan Ajar Lokasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-bahan-ajar-lokasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
