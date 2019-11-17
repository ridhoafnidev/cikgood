<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Murid */

$this->title = "Detail Pemesanan";
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="murid-view">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title">Data <strong>Pemesanan</strong></h3>
            </div>

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th >ID</th>
                        <th><span class="badge badge-primary">P0<?= $model['id_pemesanan'];?></span></th>
                    </tr>
                    <tr>
                        <th >Status</th>
                        <th><?= $model['status_pemesanan'];?></th>
                    </tr>
                    <tr>
                        <th >Guru</th>
                        <th><?= $model['nama_guru'];?></th>
                    </tr>
                    <tr>
                        <th >Murid</th>
                        <th><?= $model['nama'];?></th>
                    </tr>
                    <tr>
                        <th >Mata Pelajaran</th>
                        <th><?php 
                        if($model['matpel'] == null){
                            echo "-";
                        }else{
                            echo $model['matpel'];  
                        } ?></th>
                    </tr>
                    <tr>
                        <th >Jumlah Pertemuan</th>
                        <th><?php 
                        if($model['jumlah_pertemuan'] == null){
                            echo "-";
                        }else{
                            echo $model['jumlah_pertemuan']." Pertemuan";  
                        } ?></th>
                    </tr>
                    <tr>
                        <th >Durasi</th>
                        <th><?php 
                        if($model['durasi'] == null){
                            echo "-";
                        }else{
                            echo $model['durasi']." Jam";  
                        } ?></th>
                    </tr>
                    <tr>
                        <th >Alamat</th>
                        <th><?php 
                        if($model['alamat'] == null){
                            echo "-";
                        }else{
                            echo $model['alamat'];  
                        } ?></th>
                    </tr>
                    <tr>
                        <th >Jadwal</th>
                        <th><?php 
                        if($model['jadwal'] == null){
                            echo "-";
                        }else{
                            echo $model['jadwal'];  
                        } ?></th>
                    </tr>
                    <tr>
                        <th >Pesan Tambahan</th>
                        <th><?php 
                        if($model['pesan_tambahan'] == null){
                            echo "-";
                        }else{
                            echo $model['pesan_tambahan'];  
                        } ?></th>
                    </tr>
                    <tr>
                        <th >Harga</th>
                        <th><?php 
                        if($model['harga'] == null){
                            echo "-";
                        }else{
                            echo "Rp".number_format($model['harga']);  
                        } ?></th>
                    </tr>
                    <tr>
                        <th >Harga Total</th>
                        <th><?php 
                        if($model['harga_total'] == null){
                            echo "-";
                        }else{
                            echo "Rp".number_format($model['harga_total']);  
                        } ?></th>
                    </tr>
                    <tr>
                        <th >Tanggal Pemesanan</th>
                        <th><?php 
                        if($model['tgl_pemesanan'] == null){
                            echo "-";
                        }else{
                            echo $model['tgl_pemesanan'];  
                        } ?></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
