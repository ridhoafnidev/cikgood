<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Histori Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-index">

</div>
<div class="row" >


    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Data Histori Pembayaran</strong> </h3>
            </div>
            <table class="table table-striped table-bordered" id="zero-configuration">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Murid</th>
                        <th>Email</th>
                        <th>Jumlah Uang</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>     
                        
                        <?php 
                        $no=1;foreach($model as $db):
                        ?>
                        
                        <tr>
                            <td align="center"><?= $no;?></td>
                            <td ><?= $db['order_id'];?></td>
                            <td ><?= $db['nama'];?></td>
                            <td><?= $db['email']; ?></td>
                            <td >Rp.<?= number_format($db['gross_amount']);?></td>
                            <?php if($db['transaction_status'] == "settlement"){?>
                                <td><span class="badge badge-success"><?= $db['transaction_status'];?></span></td>
                                
                           <?php }else if($db['transaction_status'] == "expire"){ ?>
                                <td><span class="badge badge-danger"><?= $db['transaction_status'];?></span></td>
                                
                            <?php }else{ ?>
                                <td><span class="badge badge-warning"><?= $db['transaction_status'];?></span></td>
                                <?php } ?>
                            <td><?= $db['payment_type'];?></td> 
                            <td ><?= $db['transaction_time'];?></td>                    
                            <td>
                                
                            <?= Html::a('<i class="ico-eye"></i>', ['/pembayaran/view','id'=>$db['id_mitrans']], ['class' => 'btn btn-info']) ?>

                            </td>
                        </tr>
                        <?php $no++;endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>
</div>