<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Keuangan Guru';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-index">

</div>
<div class="row" >


    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Keuangan Guru</strong> </h3>
            </div>
            <table class="table table-striped table-bordered" id="zero-configuration">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Guru</th>
                        <th>Email</th>
                        <th>Jumlah Saldo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>     
                        
                        <?php 
                        $no=1;foreach($model as $db):
                        ?>
                        
                        <tr>
                            <td align="center"><?= $no;?></td>
                            <td ><?= $db['id_guru'];?></td>
                            <td ><?= $db['nama_guru'];?></td>
                            <td ><?= $db['email']; ?></td>
                            <td >Rp.<?= number_format($db['saldo']);?></td>             
                            <td>
                                
                            <?= Html::a('<i class="ico-eye"></i>', ['/keuangan/view-guru','id'=>$db['id_guru']], ['class' => 'btn btn-info']) ?>

                            </td>
                        </tr>
                        <?php $no++;endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>
</div>