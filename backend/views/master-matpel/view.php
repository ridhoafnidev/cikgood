<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Murid */

$this->title = $model['nama'];
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="murid-view">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title">Data <strong>Mata Pelajaran</strong></h3>
            </div>

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th >ID</th>
                        <th><span class="badge badge-primary">MP<?= $model['id_master_matpel'];?></span></th>
                    </tr>
                    <tr>
                        <th >Mata Pelajaran</th>
                        <th><?= $model['nama'];?></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
