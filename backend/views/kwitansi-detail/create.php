<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\KwitansiDetail */

$this->title = 'Create Kwitansi Detail';
$this->params['breadcrumbs'][] = ['label' => 'Kwitansi Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kwitansi-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
