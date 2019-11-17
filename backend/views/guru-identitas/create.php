<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GuruIdentitas */

$this->title = 'Create Guru Identitas';
$this->params['breadcrumbs'][] = ['label' => 'Guru Identitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-identitas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
