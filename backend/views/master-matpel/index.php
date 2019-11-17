<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mata Pelajaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row" >

    
    <div class="col-md-12">
        
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Data <strong>Mata Pelajaran</strong></h3>
            </div>
            <table class="table table-striped table-bordered" id="zero-configuration">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Mata Pelajaran</th>
                        <th>Aksi</th>
                        
                    </tr>
                </thead>
                <tbody>     
                        
                        <?php 
                        $no=1;foreach($data as $db):
                        ?>
                        
                        <tr>
                            <td align="center"><?= $no;?></td>
                            <td >MP<?= $db['id_master_matpel'];?></td>
                            <td ><?= $db['nama'];?></td>
                            <td align="center">
                            <?= Html::a('<i class="ico-eye"></i>', ['/master-matpel/view','id'=>$db['id_master_matpel']], ['class' => 'btn btn-info btn-sm', 'data-toggle'=>'tooltip', 'data-placement'=>"top", 'title'=>'Lihat']) ?>
                            <?= Html::a('<i class="ico-plus"></i>', ['/master-matpel/create'], ['class' => 'btn btn-success btn-sm', 'data-toggle'=>'tooltip', 'data-placement'=>"top", 'title'=>'Lihat']) ?>
                            <?= Html::a('<i class="ico-pen"></i>', ['/master-matpel/update','id'=>$db['id_master_matpel']], ['class' => 'btn btn-primary btn-sm', 'data-toggle'=>'tooltip', 'data-placement'=>"top", 'title'=>'Lihat']) ?>
                        </tr>
                        <?php $no++;endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>




