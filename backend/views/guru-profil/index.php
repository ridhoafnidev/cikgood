<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guru';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row" >

    
    <div class="col-md-12">
        
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Data <strong>Guru</strong></h3>
            </div>
            <table class="table table-striped table-bordered" id="zero-configuration">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>No. HP</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        
                    </tr>
                </thead>
                <tbody>     
                        
                        <?php 
                        $no=1;foreach($model as $db):
                            
                        ?>
                        
                        <tr>
                            <td align="center"><?= $no;?></td>
                            <td >G0<?= $db['id_guru'];?></td>
                            <td ><?= $db['nama_guru'];?></td>
                            <td ><?= $db['no_hp'];?></td>
                            <td ><?= $db['email'];?></td>
                            <?php if($db['status'] == "Sudah Terverifikasi"){?>
                                <td><span class="badge badge-success"><?= $db['status'];?></span></td>
                           <?php }else{ ?>
                                <td><span class="badge badge-info"><?= $db['status'];?></span></td>
                            <?php } ?>
                            
                            <td align="center">
                            <?= Html::a('<i class="ico-eye"></i>', ['/guru-profil/view','id'=>$db['id_guru']], ['class' => 'btn btn-info btn-sm', 'data-toggle'=>'tooltip', 'data-placement'=>"top", 'title'=>'Lihat']) ?>
                        </tr>
                        <?php $no++;endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>




