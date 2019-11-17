
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mata Pelajaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-index">

</div>
<div class="row" >


    <div class="col-md-12">
        <p>
            <!--Html::button('Create Penerima', ['value'=>'../penerima/create','class' => 'btn btn-success','id'=>'modalButton']) -->
            <?= Html::a('Tambah data peminjaman', ['create'],['class' => 'btn btn-success']) ?>
        </p>
    
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Data Mata Pelajaran</strong> </h3>
            </div>
            <table class="table table-striped table-bordered" id="zero-configuration">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tingkatan</th>
                        <th>Mata Pelajaran</th>
                        <th>Mata Pelajaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>     
                        
                        <?php 
                        $no=1;foreach($model as $db):
                        ?>
                        
                        <tr>
                            <td align="center"><?= $no;?></td>
                            <td ><?= $db['tingkatan'];?></td>
                            <td ><?= $db['nama'];?></td>
                            <td><?= $db['matpel_detail'];?></td>                     
                            <td>
                                
                            <?= Html::a('<i class="ico-pencil5"></i>', ['/data-matpel/update','id'=>$db['id_matpel']], ['class' => 'btn btn-info']) ?>
                            <?= Html::a('<i class="ico-trash"></i>', ['/data-matpel/delete', 'id' => $db['id_matpel']], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'anda yakin mau menghapus data peminjaman "'.$db['nama'].'"?',
                                        'method' => 'post',
                                    ]
                                ]);
                            ?>

                            </td>
                        </tr>
                        <?php $no++;endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>
</div>