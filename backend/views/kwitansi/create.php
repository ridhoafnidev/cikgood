<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Kwitansi */

$this->title = 'Create Kwitansi';
$this->params['breadcrumbs'][] = ['label' => 'Kwitansi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kwitansi-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
