<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Murid */

$this->title = $model['tingkatan'];
$this->params['breadcrumbs'][] = ['label' => 'Tingkatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="murid-view">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title">Data <strong>Tingkatan</strong></h3>
            </div>

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th >ID</th>
                        <th><span class="badge badge-primary">T0<?= $model['id'];?></span></th>
                    </tr>
                    <tr>
                        <th >Tingkatan</th>
                        <th><?= $model['tingkatan'];?></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
