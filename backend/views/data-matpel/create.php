<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DataMatpel */

$this->title = 'Create Data Matpel';
$this->params['breadcrumbs'][] = ['label' => 'Data Matpels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-matpel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
