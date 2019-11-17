<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Review';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row" >

    
    <div class="col-md-12">
        
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Data <strong>Review</strong></h3>
            </div>
            <table class="table table-striped table-bordered" id="zero-configuration">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Guru</th>
                        <th>Murid</th>
                        <th>Isi</th>
                        <th>Rating</th>
                        
                    </tr>
                </thead>
                <tbody>     
                        
                        <?php 
                        $no=1;foreach($data as $db):
                            
                        ?>
                        
                        <tr>
                            <td align="center"><?= $no;?></td>
                            <td >R0<?= $db['id_review'];?></td>
                            <td ><?= $db['nama'];?></td>
                            <td ><?= $db['nama_guru'];?></td>
                            <td ><?= $db['isi'];?></td>
                            <td ><?= $db['rating'];?></td>
                        </tr>
                        <?php $no++;endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>




