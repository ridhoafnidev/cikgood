<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SaldoMidtrans */

$this->params['breadcrumbs'][] = ['label' => 'Keuangan Murid', 'url' => ['murid']];
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
                            <td><span class="badge badge-success"><?= $db['transaction_status'];?></span></td>
                            <td><?= $db['payment_type'];?></td> 
                            <td ><?= $db['transaction_time'];?></td>     
                        </tr>
                        <?php $no++;endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>
</div>