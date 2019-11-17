<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PemesananJadwal */

$this->title = 'Create Pemesanan Jadwal';
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-jadwal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
