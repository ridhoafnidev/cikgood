<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Murid */

$this->title = $model['nama'];
$this->params['breadcrumbs'][] = ['label' => 'Murid', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="murid-view">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title">Data <strong>Murid</strong></h3>
            </div>

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th >ID</th>
                        <th><span class="badge badge-primary">M0<?= $model['id'];?></span></th>
                    </tr>
                    <tr>
                        <th >Nama</th>
                        <th><?= $model['nama'];?></th>
                    </tr>
                    <tr>
                        <th >NO HP</th>
                        <th><?= $model['no_hp'];?></th>
                    </tr>
                    <tr>
                        <th >Email</th>
                        <th><?= $model['email'];?></th>
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
                        <th >Jenis Kelamin</th>
                        <th><?php 
                        if($model['jk'] == null){
                            echo "-";
                        }else{
                            echo $model['jk'];  
                        } ?></th>
                    </tr>
                    <tr>
                        <th >NISN</th>
                        <th><?php 
                        if($model['nisn'] == null){
                            echo "-";
                        }else{
                            echo $model['nisn'];  
                        } ?></th>
                    </tr>
                    <tr>
                        <th >Kelas</th>
                        <th><?php 
                        if($model['kelas'] == null){
                            echo "-";
                        }else{
                            echo $model['kelas'];  
                        } ?></th>
                    </tr>
                    <tr>
                        <th >Nama Sekolah</th>
                        <th><?php 
                        if($model['nama_sekolah'] == null){
                            echo "-";
                        }else{
                            echo $model['nama_sekolah'];  
                        } ?></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
