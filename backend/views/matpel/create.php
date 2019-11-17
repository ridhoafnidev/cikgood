<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Matpel */

$this->title = 'Create Matpel';
$this->params['breadcrumbs'][] = ['label' => 'Matpels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matpel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
