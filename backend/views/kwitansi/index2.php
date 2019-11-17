
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kwitansi Detail';
$this->params['breadcrumbs'][] = ['label' => 'Kwitansi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row" >


	<div class="col-md-12" style="background-color:#FFF">
		<div style="margin-bottom:40px">
			<div style="margin:10px 0px 0px 0px">
				<p style="font-size:20px;margin-left:450px">Buku Kas Umum</p>
				<p style="font-size:20px;margin-left:400px;margin-top:-10px">Bendahara Pengeluaran <?= date('Y')?></p>
			</div>
			<div style="margin-bottom:5px">
				<p style="font-size:14px">Kementerian</p>
				<p style="margin-left:180px;margin-top:-30px">: (025)</p>
				<p style="font-size:14px;margin-left:290px;margin-top:-28px">Kementerian Agama</p>
			</div>
			<div style="margin-bottom:5px">
				<p style="font-size:14px">Unit Organisasi</p>
				<p style="margin-left:180px;margin-top:-30px">: (04)</p>
				<p style="font-size:14px;margin-left:290px;margin-top:-28px">Ditjen Pendidikan Islam</p>
			</div>
			<div style="margin-bottom:5px">
				<p style="font-size:14px">Provinsi / Kota</p>
				<p style="margin-left:180px;margin-top:-30px">: (0900)</p>
				<p style="font-size:14px;margin-left:290px;margin-top:-28px">Riau/ Pekanbaru</p>
			</div>
			<div style="margin-bottom:5px">
				<p style="font-size:14px">Satuan Kerja</p>
				<p style="margin-left:180px;margin-top:-30px">: (424157)</p>
				<p style="font-size:14px;margin-left:290px;margin-top:-28px">UIN SUSKA RIAU</p>
			</div>
			<div style="margin-bottom:35px">
				<p style="font-size:14px">Revisi Ke</p>
				<p style="margin-left:170px;margin-top:-30px">1 : </p>
				<p style="font-size:14px;margin-left:290px;margin-top:-28px"></p>
				<p style="margin-left:170px;margin-top:30px">2 : </p>
				<p style="font-size:14px;margin-left:290px;margin-top:-28px"></p>
				<p style="margin-left:170px;margin-top:30px">3 : </p>
				<p style="font-size:14px;margin-left:290px;margin-top:-28px"></p>
			</div>
			<div style="margin-bottom:5px">
				<p style="font-size:14px">Tahun Anggaran</p>
				<p style="margin-left:180px;margin-top:-30px">: <?= date('Y')?></p>
			</div>
			<div style="margin-bottom:5px">
				<p style="font-size:14px">KPPN</p>
				<p style="margin-left:180px;margin-top:-30px">: (008)</p>
				<p style="font-size:14px;margin-left:290px;margin-top:-28px">Pekanbaru</p>
			</div>
		</div>
		<div style="margin-bottom:20px">
			<div class="col-sm-6" style="margin-right:100px">
				<?php Html::a('Import Kwitansi', ['import2'], ['class' => 'btn btn-primary']) ?>
				<!--?= Html::a('Export Kwitansi', ['export'], ['class' => 'btn btn-info']) ?-->
				<?= Html::a('<i class="ico-plus"></i> Export Kwitansi', ['download','from'=>$_GET['from'], 'to'=>$_GET['to'] ], ['class' => 'btn btn-info']) ?>
				<?= Html::a('<i class="ico-print"></i> Cetak SPTJM', ['sptjm','from'=>$_GET['from'], 'to'=>$_GET['to'] ], ['class' => 'btn btn-primary', 'target'=>'_blank']) ?>
			</div>
			<form action="index2" method="GET">
				<div class="col-sm-2" style="">
					
					<input type="date" class="form-control" id="" name="from"placeholder="from a date" />
				</div>
				<div class="col-sm-2" style="">
					<input type="date" class="form-control" id="" name="to"placeholder="to a date" />
				</div>
				<input type="submit" value="Cari" class="btn btn-success">
			</form>
		</div>
		<div class="panel panel-default">
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
							$total=0;
							$no=1;
							foreach($data as $db):
							$total+=$db['total'];
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
							<td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $db['no_bukti'];?></td>
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
									|
									<?= Html::a('Edit', ['/kwitansi/update','id'=>$db['id_kwitansi']], ['class' => 'btnx btn-defaultx']) ?>
									<!--end update-->
									|
									<?php if($db['mak']=='525115'){?>
										<?= Html::a('Lihat', ['/kwitansi/view2','id'=>$db['id_kwitansi']], ['class' => 'btnx btn-defaultx']) ?>
									<?php }else{?>
										<?= Html::a('Lihat', ['/kwitansi/view','id'=>$db['id_kwitansi']], ['class' => 'btnx btn-defaultx']) ?>
									<?php }?>
									<!--end view-->
									|
									
									<?= Html::a('Hapus', ['/kwitansi/delete', 'id' => $db['id_kwitansi']], [
											'class' => 'btnx btn-dangerx',
											'data' => [
												'confirm' => 'anda yakin mau menghapus  "'.$db['id_kwitansi'].'"?',
												'method' => 'post',
											]
										]);
									?>
								</div>
							</td>
							<td ><?= $db['mak'];?></td>
							<td ></td>
							<td width="150px">Rp.<span class="pull-right"><?php echo number_format($db['total']);?></span></td>
						</tr>
						<?php $no++;endforeach; ?>
							
				</tbody>
				<tfoot>
					<?php 
						// $query = (new \yii\db\Query())->from('kwitansi');
						// $sum = $query->sum('total');
					?>
					<tr>
						<td colspan="6"></td>
						<td>Rp. <span class="pull-right"><?php echo number_format($total);?></span></td>
					</tr>
					
				</tfoot>
			</table>
			<table class="table table-striped table-bordered" id="zero-configuration">
				<thead>
					<tr>
						<th>No</th>
						<th>Akun Belanja</th>
						<th>Keterangan</th>
						<th>Pagu</th>
						<th>Realisasi Per BKU</th>
						<th>Total Realisasi</th>
						<th>Persantase Total Realisasi</th>
					</tr>
				</thead>
				<tbody>		
					<?php 
						$model= ( (new \yii\db\Query())
						->select(['mak.nama_mak', 'mak.mak', 'mak.saldo', 
						'(SELECT sum(total) as total FROM kwitansi WHERE tgl_kwitansi BETWEEN "'.$_GET['from'].'" AND "'.$_GET['to'].'" AND mak=mak.id_mak) as total', 
						'(SELECT sum(total) as total FROM kwitansi WHERE tgl_kwitansi !="" AND mak=mak.id_mak) as total2']
						) 
						->from('kwitansi')
						// ->where('tgl_kwitansi !=""')
						// ->where('kwitansi.tgl_kwitansi BETWEEN "'.$_GET['from'].'" AND "'.$_GET['to'].'"')
						->join('RIGHT JOIN','mak', 'mak.id_mak = kwitansi.mak')
						// ->innerJoin('kegiatan', 'kegiatan.id_kegiatan = kwitansi.kegiatan')
						->orderby('mak.nama_mak')
						->groupby(['mak.id_mak'])
						);
						$command = $model->createCommand();
						$model = $command->queryAll();
						$total=0;
						$total2=0;
						$saldo=0;
						$persen=0;
						$total_persen=0;
						$no=1;
						foreach($model as $db):
							$total+=$db['total'];
							$total2+=$db['total2'];
							$saldo+=$db['saldo'];
							$persen=($db['total2']/$db['saldo'])*100;
							$total_persen+=$persen;
					?>
						<tr>
							<td align="center"><?= $no?></td>
							<td><?= $db['mak']; ?></td>
							<td><?= $db['nama_mak']; ?></td>
							<td>Rp. <span class="pull-right"><?= number_format($db['saldo']); ?></span></td>
							<td>Rp. <span class="pull-right"><?= number_format($db['total']); ?></span></td>
							<td>Rp. <span class="pull-right"><?= number_format($db['total2']); ?></span></td>
							<td> <span class="pull-right"><?= number_format($persen,2); ?>%</span></td>
						</tr>
					<?php $no++;endforeach; ?>
					
					<tr>
						<td colspan="3" align="center"></td>
						<td><b>Rp. <span class="pull-right"><?= number_format($saldo); ?></span></b></td>
						<td><b>Rp. <span class="pull-right"><?= number_format($total); ?></span></b></td>
						<td><b>Rp. <span class="pull-right"><?= number_format($total2); ?></span></b></td>
						<td><b> <span class="pull-right"><?= number_format(($total2/$saldo)*100,2); ?>%</span></b></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>



