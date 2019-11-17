<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Murid';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row" >

    
    <div class="col-md-12">
        
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Data <strong>Murid</strong></h3>
            </div>
            <table class="table table-striped table-bordered" id="zero-configuration">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>No. HP</th>
                        <th>Email</th>
                        <th>Aksi</th>
                        
                    </tr>
                </thead>
                <tbody>     
                        
                        <?php 
                        $no=1;foreach($data as $db):
                            
                        ?>
                        
                        <tr>
                            <td align="center"><?= $no;?></td>
                            <td >M0<?= $db['id'];?></td>
                            <td ><?= $db['nama'];?></td>
                            <td ><?= $db['no_hp'];?></td>
                            <td ><?= $db['email'];?></td>
                            <td align="center">
                            <?= Html::a('<i class="ico-eye"></i>', ['/murid/view','id'=>$db['id']], ['class' => 'btn btn-info btn-sm', 'data-toggle'=>'tooltip', 'data-placement'=>"top", 'title'=>'Lihat']) ?>
                        </tr>
                        <?php $no++;endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>




