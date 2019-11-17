<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Pemesanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row" >

    
    <div class="col-md-12" style="background-color:#FFF">
        
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Data <strong>Pemesanan</strong></h3>
            </div>
            <table class="table table-striped table-bordered" id="zero-configuration">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Guru</th>
                        <th>Matpel</th>
                        <th>Jumlah Petemuan</th>
                        <th>Durasi</th>
                        <th>Harga</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>     
                        
                        <?php 
                        $no=1;foreach($model as $db):
                            
                        ?>
                        
                        <tr>
                            <td align="center"><?= $no;?></td>
                            <td ><?= $db['nama_guru'];?></td>
                            <td ><?= $db['matpel'];?></td>
                            <td ><?= $db['jumlah_pertemuan'];?> Pertemuan</td>
                            <td ><?= $db['durasi'];?> Jam</td>
                            <td >Rp.<?= number_format($db['harga_total']);?></td>
                             <?php if($db['status_pemesanan'] == "Diproses"){?>
                                <td><span class="badge badge-default"><?= $db['status_pemesanan'];?></span></td>
                                
                           <?php }else if($db['status_pemesanan'] == "Disetujui"){ ?>
                                <td><span class="badge badge-info"><?= $db['status_pemesanan'];?></span></td>
                                
                            <?php }else if($db['status_pemesanan'] == "Batal"){ ?>
                                <td><span class="badge badge-warning"><?= $db['status_pemesanan'];?></span></td>
                                
                            <?php }else if($db['status_pemesanan'] == "Tidak Disetujui"){ ?>
                                <td><span class="badge badge-danger"><?= $db['status_pemesanan'];?></span></td>
                                
                            <?php }else{ ?>
                                <td><span class="badge badge-success"><?= $db['status_pemesanan'];?></span></td>
                                <?php } ?>
                        </tr>
                        <?php $no++;endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>




