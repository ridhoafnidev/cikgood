
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
                        <th>ID Pemesanan</th>
                        <th>Murid</th>
                        <th>Guru</th>
                        <th>Matpel</th>
                        <th>Jumlah Petemuan</th>
                        <th>Durasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        
                    </tr>
                </thead>
                <tbody>     
                        
                        <?php 
                        $no=1;foreach($data as $db):
                            
                        ?>
                        
                        <tr>
                            <td align="center"><?= $no;?></td>
                            <td >PMS0<?= $db['id_pemesanan'];?></td>
                            <td ><?= $db['nama'];?></td>
                            <td ><?= $db['nama_guru'];?></td>
                            <td ><?= $db['matpel'];?></td>
                            <td ><?= $db['jumlah_pertemuan'];?> Pertemuan</td>
                            <td ><?= $db['durasi'];?> Jam</td>
                            <td ><?= $db['status_pemesanan'];?></td>
                            <td align="center">
                            <?= Html::a('<i class="ico-eye"></i>', ['/pemesanan/view','id'=>$db['id_pemesanan']], ['class' => 'btn btn-info btn-sm', 'data-toggle'=>'tooltip', 'data-placement'=>"top", 'title'=>'Lihat']) ?>
                            </td>
                        </tr>
                        <?php $no++;endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>




