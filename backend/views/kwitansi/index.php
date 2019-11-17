
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contoh';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row" >

	
	<div class="col-md-12" style="background-color:#FFF">
		
		<div style="margin-bottom:40px">
			<div style="margin:10px 0px 0px 0px">
				<p style="font-size:20px;margin-left:450px">Buku Kas Umum</p>
				<p style="font-size:20px;margin-left:400px;margin-top:-10px">Bendahara Pengeluaran <?= date('Y')?></p>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Data <strong>Contoh</strong></h3>
			</div>
			<table class="table table-striped table-bordered" id="zero-configuration">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Kwitansi</th>
						<th>No Bukti</th>
						<th>Uraian</th>
						<th>Akun Belanja</th>
						<th>Debet</th>
						<th>Kredit</th>
					</tr>
				</thead>
				<tbody>		
						
						<?php 
						$no=1;foreach($data as $db):
							$ket='';
							if($db['mak']=='525115')
							{
								$ket='Dibayar ';
							}else{
								$ket='Dibayar kepada '.$db['nama_penerima'].' '.$db['nama_toko'].' ';
							}
						?>
						
						<tr>
							<td align="center"><?= $no;?></td>
							<td ><?= $db['tgl_kwitansi'];?></td>
							<td ><?= $db['no_bukti'];?></td>
							<td >
								<?= $ket.$db['keterangan'];?>
								<!-- Aksi -->
								<div class="col-md-12 row">
									<?php if($db['mak']=='525115'){?>
										<?= Html::a('Cetak', ['/kwitansi/report2','id'=>$db['id_kwitansi']], ['class' => 'btnx btn-defaultx','target'=>'_blank']) ?>
									<?php }else{?>
										<?= Html::a('Cetak', ['/kwitansi/report','id'=>$db['id_kwitansi']], ['class' => 'btnx btn-defaultx','target'=>'_blank']) ?>
									<?php }?>
									<!--end cetak-->
									
								</div>
							</td>
							<td ><?= $db['mak'];?></td>
							<td ></td>
							<td >Rp.<?php echo number_format($db['total']);?></td>
						</tr>
						<?php $no++;endforeach; ?>
						
							
						
				</tbody>
			</table>

		</div>
	</div>
</div>




