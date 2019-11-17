<?php
// $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'utf-8', [190, 236]]);

//jabatan penanggunag jawab uin suska
$jabatan= (new \yii\db\Query());
$jabatan->select(['jabatan.*',  'pegawai.nip as nip','pegawai.nama_pegawai as pegawai']) 
->from('jabatan')
->where(['id_jabatan' => 1])
->leftJoin('pegawai', 'pegawai.id_pegawai = jabatan.id_pegawai');
$command = $jabatan->createCommand();
$data2 = $command->queryOne();
//jabatan penanggunag jawab uin suska

//jabatan penanggunag jawab
$jabata4= (new \yii\db\Query());
$jabata4->select(['jabatan.*', 'pegawai.nip as nip','pegawai.nama_pegawai as pegawai']) 
->from('jabatan')
->where(['id_jabatan' => 1])
->leftJoin('pegawai', 'pegawai.id_pegawai = jabatan.id_pegawai');
$command = $jabata4->createCommand();
$data5 = $command->queryOne();
//jabatan penanggunag jawab

//jabatan bendahara
$jabatan2= (new \yii\db\Query());
$jabatan2->select(['jabatan.*','pegawai.nip as nip','pegawai.nama_pegawai as pegawai']) 
->from('jabatan')
->where(['id_jabatan' => 2])
->leftJoin('pegawai', 'pegawai.id_pegawai = jabatan.id_pegawai');
$command = $jabatan2->createCommand();
$data3 = $command->queryOne();
//jabatan bendahara

//jabatan bendahara pembantu
$jabatan3= (new \yii\db\Query());
$jabatan3->select(['jabatan.*', 'pegawai.nip as nip','pegawai.nama_pegawai as pegawai']) 
->from('jabatan')
->where(['id_jabatan' => 3])
->leftJoin('pegawai', 'pegawai.id_pegawai = jabatan.id_pegawai');
$command = $jabatan3->createCommand();
$data4 = $command->queryOne();
//jabatan bendahara
			

$dibayar=0;
if(isset($model))
{
	if($model['uang_muka']>0):
	$dibayar=$model['uang_muka'];
	endif;
}		
?>
<html>
<head>
	<style>
  
	@page { sheet-size: A4; }
	  
	@page bigger { sheet-size: 4200mm 370mm; }
	  
	<!--@page toc { sheet-size: A4; }-->
	  
	h1.bigsection {
			page-break-before: always;
			page: bigger;
	}
	<!--
	body.solid {
		border-style: solid;
		width:200px;
		height:200px
	}
	-->
	#page-border{
               width: 100%;
               height: 100%;
               border:4px double black;
           }
	table, th, td {
    border: 1px solid black;
	border-collapse: collapse;

	}
	</style>
<head>
<body class="solid">
	<div class="row" id="page-border" style="height:800px;">
		<!-- Form horizontal layout striped -->
		<h2 style="margin-left:120px">RINCIAN BIAYA PERJALANAN DINAS</h2>
		<div style="margin:0px 10px 0px 10px">
			<div style="margin:0px 0px 0px 0px">
				
				<div class="">
					<div>Lampiran SPD Nomor</div>
					<div class="col-sm-8">
						<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:-30px;margin-left:153px;margin-bottom:-10px"> : <?= $model['no_spd'];?></p></pre>
					</div>
				</div>
				<div class="">
					<div style="margin-top:10px">Tanggal</div>
					<div class="col-sm-8">
						<p style="font-size:14px;margin-top:-20px;margin-left:158px;margin-bottom:-10px"> : <?= $this->context->tgl_indo($model['tgl_spd']);?></p>
					</div>
				</div>
			</div> 
			<div style="margin-top:20px">
				<?php $total=0;?>
				<table style="width:100%;">
					<thead>
						<tr>
							<th>NO</th>
							<th>RINCIAN BIAYA</th>
							<th>BIAYA</th>
							<th>KET</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no=1;
							foreach($modeldetail as $md): 
							$total=$total+($md['volume']*$md['harga']);
							$rp='';
							if(strlen($md['volume']*$md['harga'])==6)
							{
								$rp='&nbsp;&nbsp;&nbsp;';
							}
						?>
						<tr>
							<td align="center"><?= $no;?></td>
							<td ><?= $md['kegiatan']. " " .$md['volume']. " " .$md['nama_satuan']. " @ Rp " .number_format($md['harga']);?></td>
							<td align="right"> Rp <?php echo $rp.number_format($md['volume']*$md['harga']);?></td>
							<td ></td>							
						</tr>
						<?php $no++;endforeach; ?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="2" style="text-align:center;font-size:14px">JUMLAH</th>
							<th style="text-align:center;font-size:14px">Rp <?php echo number_format($total);?></th>
							<th></th>
						</tr>
						<tr>
							<th colspan="4" style="text-align:left;font-size:12px"><b>Terbilang : <?php echo $this->context->nominal($total); ?></b></th>
							
						</tr>
					</tfoot>
					
				</table>
			</div>
			<div style='width: 100%;margin:20px 10px 0px 10px'>
				<div style='float: left; width: 50%;margin-top:-20px'>
					<div>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:30px;margin-bottom:-5px">
							Telah dibayar sejumlah
						</p>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:0px;margin-bottom:-5px">
							Rp <?= number_format($dibayar);?>,-
						</p>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:0px;margin-bottom:-5px">
							<?= $model['jabatan2'];?>
						</p>
					</div>
					<div style="height:50px"></div>
					<div style="">
						<?php
							$pegawai= (new \yii\db\Query());
							$pegawai->select(['*']) 
							->from('pegawai')
							->where(['id_pegawai' => $model['pegawai2']]);
							$command = $pegawai->createCommand();
							$pegawai = $command->queryOne();
						?>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin:1px;">
							<b>
								<?= $pegawai['nama_pegawai'];?>
							</b>
						</p>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:-10px">
							<b>
								NIP. <?= $pegawai['nip'];?>
							</b>
						</p>
					</div>
				</div>
				<div style='float: left; width: 50%;margin-top:-20px'>
					<div>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:30px;margin-bottom:-5px">
							Pekanbaru, 
						</p>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:0px;margin-bottom:-5px">
							Telah menerima jumlah uang sebesar
						</p>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:0px;margin-bottom:-5px">
							Rp <?php echo number_format($total)?>
						</p>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:0px;margin-bottom:-5px">
							Menerima
						</p>
					</div>
					<div style="height:34px"></div>
					<div style="">
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-bottom:1px">
							<b>
								<?= $model['nama_pegawai'];?>
							</b>
						</p>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:-10px">
							<b>
								NIP/NIK. <?= $model['nip'];?>
							</b>
						</p>
					</div>
				</div>
			</div>
			
			
		</div> 
		<hr style="display: block;margin-top: 0em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 1px;height: 4px;">
		
		<div style="font-family:'Times New Roman', Times, serif;margin-left:200px;margin-top:-10px;">
			<h3>PERHITUNGAN SPD RAMPUNG</h3>
		</div>
		<div style="margin:0px 0px 0px 100px">
			<div class="">
				<div>Ditetapkan sejumlah</div>
				<div class="col-sm-8" style="margin-left:150px">
					<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:-30px;margin-left:153px;margin-bottom:-10px"> Rp <?php echo number_format($total)?>,-</p></pre>
				</div>
			</div>
			<div class="">
				<div>Yang telah dibayar semula</div>
				<div class="col-sm-8" style="margin-left:150px">
					<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:-30px;margin-left:153px;margin-bottom:-10px"> Rp <?= number_format($dibayar)?>,-</p></pre>
				</div>
			</div>
		</div>
		<div style="margin-left:100px;margin-right:100px">
			<hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 1px;height: 4px;">
		</div>
		<div style="margin:0px 0px 0px 100px">
			<div class="">
				<div>Sisa kurang / lebih</div>
				<div class="col-sm-8" style="margin-left:150px">
					<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:-30px;margin-left:153px;margin-bottom:-10px"> Rp <?php $totalbayar=$total-$dibayar; echo number_format($totalbayar)?>,-</p></pre>
				</div>
			</div>
		</div>
	
	<div style="margin:0px 100px 0px 100px;background-color:#989191;">
		<div style="padding:0px 0px 0px 10px">
			<p style="font-size:10px;margin-left:0px;color:#000000;">Terbilang  <?php echo $this->context->nominal($totalbayar) ?></p>
		</div>
	</div>
	<div style='width: 100%;margin:0px 10px 0px 10px'>
		<div style='float: left; width: 65%'>	
			
		</div>
		<div style='float: right; width: 45%'>	
			<div style="margin-top:20px">
				
				<label style="font-size:17px;font-family:'Times New Roman', Times, serif;">
					<?php echo $model['jabatan1'];?>
				</label>
			</div>
			<div style="height:60px"></div>
			<div style="">
				<?php
					$pegawai= (new \yii\db\Query());
					$pegawai->select(['*']) 
					->from('pegawai')
					->where(['id_pegawai' => $model['pegawai1']]);
					$command = $pegawai->createCommand();
					$pegawai = $command->queryOne();
				?>
				<label style="font-size:17px;font-family:'Times New Roman', Times, serif;">
					<b><?php echo $pegawai['nama_pegawai'];?></b> 
				</label>
				<br>
				<label style="font-size:17px;font-family:'Times New Roman', Times, serif;">
					<b>NIP. <?php echo $pegawai['nip'];?></b> 
				</label>
				
			</div>
		</div>
	</div>	

	</div>
	Bagian Akademik Biro AAKK UIN SUSKA RIAU
	
	<!--page +-->
	<page>
	<div class="row" id="page-border" style="height:800px;">
		<!-- Form horizontal layout striped -->
		<div style="margin:0px 10px 0px 10px">
			<div style="margin-left:400px">
				<div class="">
					<label class=""> Tahun </label>
					<div style="margin-top:-20px;margin-left:130px">
					 : <?= substr($model['tgl_kwitansi'],0,4);?>
					</div>
				</div>
				<div class="" style="margin-top:10px">
					<label class="">Nomor Bukti </label>
					<div style="margin-top:-20px;margin-left:130px">
					 : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $model['no_bukti'];?>
					</div>
				</div>
				<div class="" style="margin-top:10px">
					<label class="">Mak </label>
					<div style="margin-top:-20px;margin-left:130px">
					 : <?= $model['mak'];?>
					</div>
					
				</div>	
			</div>   
			<b><p style="margin-left:160px;font-size:20px;margin-top:30px"><u>KWITANSI / BUKTI PEMBAYARAN</u></p></b>
			<div style="">
				<div style="margin-bottom:3px">
					<label class="col-sm-2 control-label">Sudah Terima Dari</label>
					<p class="col-sm-1 control-label" style="margin-left:130px;margin-top: -20px">: </p>
					<div class="col-sm-8">
						<p style="font-size:14px;margin-top:-35px;margin-left:150px;">Kuasa Pengguna Anggaran / Pejabat Pembuat Komitmen UIN Suska Riau</p>
					</div>
				</div>
				<div style="margin-bottom:3px">
					<label class="col-sm-2 control-label">Uang Sebanyak </label>
					<p class="col-sm-1 control-label" style="margin-left:130px;margin-top: -20px">: </p>
					<div class="col-sm-8">
						<p style="font-size:16px;margin-top: -35px;margin-left: 150px;"><b><i> Rp <?php echo number_format($totalbayar);?></i></b></p>
					</div>
				</div>
				<div style="margin-bottom:3px">
					<label class="col-sm-2 control-label">Terbilang </label>
					<p class="col-sm-1 control-label" style="margin-left:130px;margin-top: -20px">: </p>
					<div class="col-sm-8">
						<p style="font-size:14px;margin-top: -35px;margin-left: 150px"><b><i> <?php echo $this->context->nominal($model['total'])?></i></b></p>
					</div>
				</div>
				<div style="margin-bottom:3px;margin-top:0px">
					<label class="col-sm-2 control-label">Untuk Pembayaran </label>
					<p class="col-sm-1 control-label" style="margin-left:130px;margin-top: -20px">: </p>
					<div class="col-sm-8" >
						<p style="font-size:14px;margin-top: -35px;margin-left: 150px;" align="justify"> <?= $model['keterangan'];?></p>
					</div>
				</div>
			</div>
			


			<div style="margin-left:370px; margin-top:100px;">
				<div class="">
					<label style="font-size:17px;font-family:'Times New Roman', Times, serif;" class="">Pekanbaru,  </label>
					<div style="margin-top:-20px;margin-left:130px">
					
					</div>
				</div>
				<div style="height:70px"></div>
				<div class="">
					<label style="font-size:17px;font-family:'Times New Roman', Times, serif;" class=""><b><?= $model['nama_pegawai'];?></b> </label>
				</div>
				<div class="">
					<label style="font-size:17px;font-family:'Times New Roman', Times, serif;" class=""><b>NIP. <?= $model['nip'];?></b> </label>
				</div>
				
			</div> 
		</div> 
		<hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 1px;height: 4px;">
		<div style='width: 100%;margin:0px 10px 0px 10px'>
			<div style='float: left; width: 60%'>	
				<div>
					<label style="font-size:17px;font-family:'Times New Roman', Times, serif;">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Setuju dibebankan pada mata anggaran berkenaan <br> a.n Kuasa Pengguna Anggaran 
					</label>
					<br>
					
					<label style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:-10px">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $model['jabatan1'];?>
					</label>
				</div>
				<div style="height:95px"></div>
				<div style="">
					<?php
						$pegawai= (new \yii\db\Query());
						$pegawai->select(['*']) 
						->from('pegawai')
						->where(['id_pegawai' => $model['pegawai1']]);
						$command = $pegawai->createCommand();
						$pegawai = $command->queryOne();
					?>
					<label style="font-size:17px;font-family:'Times New Roman', Times, serif;">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $pegawai['nama_pegawai'];?></b> 
					</label>
					<br>
					<label style="font-size:17px;font-family:'Times New Roman', Times, serif;">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>NIP. <?php echo $pegawai['nip'];?></b> 
					</label>
					
				</div>
			</div>
			<div style='float: right; width: 39%'>	
				<div style="margin-top:20px">
					<label style="font-size:17px;font-family:'Times New Roman', Times, serif;">
						
						Lunas dibayar Tanggal,
					</label>
					<br>
					<label style="font-size:17px;font-family:'Times New Roman', Times, serif;">
						<?php echo $model['jabatan2'];?>
					</label>
				</div>
				<div style="height:95px"></div>
				<div style="">
					<?php
						$pegawai= (new \yii\db\Query());
						$pegawai->select(['*']) 
						->from('pegawai')
						->where(['id_pegawai' => $model['pegawai2']]);
						$command = $pegawai->createCommand();
						$pegawai = $command->queryOne();
					?>
					<label style="font-size:17px;font-family:'Times New Roman', Times, serif;">
						<b><?php echo $pegawai['nama_pegawai'];?></b> 
					</label>
					<br>
					<label style="font-size:17px;font-family:'Times New Roman', Times, serif;">
						<b>NIP. <?php echo $pegawai['nip'];?></b> 
					</label>
					
				</div>
			</div>
		</div>
		<hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 1px;height: 4px;">
		<div style='width: 100%;margin:0px 10px 0px 10px'>
			<div>
				<p style="font-size:14px;font-family:'Times New Roman', Times, serif;" align="justify">
					Saya yang melakukan Perjalanan Dinas dengan ini menyatakan bahwa semua bukti-bukti Perjalanan Ddinas beserta biaya-biaya yang dikeluarkan adalah benar dan sah, jika dikemudian hari berdasarkan hasil audit Internal dan Eksternal (BPK, BPKP, Irjen, dan SPI) Terdapat kelebihan bayar sehingga menimbulkan kerugian negara, maka saya bertanggung jawab penuh untuk menyetorkan ke Kas Negara/Kas BLU
				</p>
				
			</div>
			
		</div>
			
	</div>
	Bagian Akademik Biro AAKK UIN SUSKA RIAU

	</page>
	<br>
	<br>
	<br>
	<page>
	<!--page 2-->
	<div class="row" id="page-border" style="height:800px;">
		<!-- Form horizontal layout striped -->
		<div style="margin:0px 10px 0px 10px">
			<div style="margin-left:0px;text-align:center">
				<div style="margin-top:15px">
					<label style="font-size:16px;font-family:'Times New Roman', Times, serif;"><b>KEMENTERIAN AGAMA RI </b></label>
				</div>
				<div style="margin-top:15px">
					<label style="font-size:16px;font-family:'Times New Roman', Times, serif;"><b>UNIVERSITAS ISLAM NEGERI SULTAN SYARIF KASIM RIAU (424157)</b></label>
				</div>
				<div style="margin-top:15px">
					<label style="font-size:16px;font-family:'Times New Roman', Times, serif;"><b>SURAT PERINTAH BAYAR </b></label>
				</div>
					
			</div>   
		</div>   
		<hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 1px;height: 4px;">
		<div style="margin:5px 0px 0px 10px">
			
			<div style="margin-bottom:10px">
				<label class="">Saya yang bertanda tangan di bawah ini selaku Pejabat Pembuat Komitmen UIN Suska Riau memerintahkan Bendahara Pengeluaran agar melakukan pembayaran sejumlah :  </label>
			</div>
			<div class="">
				<p style="font-size:16px;margin-top: 0px;margin-left: 0px;"><b><i> Rp <?php echo number_format($totalbayar);?></i></b></p>
			</div>
		</div>
		<hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 1px;height: 2px;">
		<div style="margin:5px 0px 0px 10px">
		
			<div class="">
				<p style="font-size:14px;margin-top: 0px;margin-left: 0px"><b><i>Terbilang : <?php echo $this->context->nominal($model['total'])?></i></b></p>
			</div>	
		</div>
		<hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 1px;height: 4px;">
		
		
		<div style="margin:5px 0px 80px 10px">
			<div style="margin-bottom:3px">
				<label class="col-sm-2 control-label">Kepada</label>
				<p class="col-sm-1 control-label" style="margin-left:130px;margin-top: -20px">: </p>
				<div class="col-sm-8">
					<p style="font-size:14px;margin-top:-35px;margin-left:150px;"><?= $model['nama_pegawai'];?></p>
				</div>
			</div>
			<div style="margin-bottom:3px;margin-top:0px">
				<label class="col-sm-2 control-label">Untuk Pembayaran </label>
				<p class="col-sm-1 control-label" style="margin-left:130px;margin-top: -20px">: </p>
				<div class="col-sm-8" >
					<p style="font-size:14px;margin-top: -35px;margin-left: 150px;" align="justify"> <?= $model['keterangan'];?></p>
				</div>
			</div>
		</div>
		<div style="height:100px;">
		</div>
		<div style="margin:5px 0px 15px 10px">
			<div style="margin-bottom:5px">
				<label class="col-sm-2 control-label">Atas dasar</label>
				<p class="col-sm-1 control-label" style="margin-left:130px;margin-top: -20px">: </p>
				<div class="col-sm-8">
					<p style="font-size:14px;margin-top:-35px;margin-left:150px;"></p>
				</div>
			</div>
			<div style="margin-bottom:0px;margin-left:10px">
				<label class="col-sm-2 control-label">1. Kwitansi/Bukti Pembayaran</label>
				<p class="col-sm-1 control-label" style="margin-left:300px;margin-top: -20px">: </p>
				<div class="col-sm-8">
					<p style="font-size:14px;margin-top:-35px;margin-left:320px;">Terlampir</p>
				</div>
			</div>
			<div style="margin-bottom:0px;margin-left:10px;margin-top:-20px">
				<label class="col-sm-2 control-label">2. Nota/Bukti penerimaan Barang dan Jasa</label>
				<p class="col-sm-1 control-label" style="margin-left:300px;margin-top: -20px">: </p>
				<div class="col-sm-8">
					<p style="font-size:14px;margin-top:-35px;margin-left:320px;">Terlampir</p>
				</div>
			</div>
			<div style="margin-bottom:5px">
				<label class="col-sm-2 control-label">Dibebankan pada</label>
				<p class="col-sm-1 control-label" style="margin-left:130px;margin-top: -20px">: </p>
				<div class="col-sm-8">
					<p style="font-size:14px;margin-top:-35px;margin-left:150px;"></p>
				</div>
			</div>
			<div style="margin-bottom:0px;margin-left:10px">
				<label class="col-sm-2 control-label">1. Kegiatan,output,mak</label>
				<p class="col-sm-1 control-label" style="margin-left:300px;margin-top: -20px">: </p>
				<div class="col-sm-8">
					<p style="font-size:14px;margin-top:-35px;margin-left:320px;"><?= $model['kode_kegiatan'].' - '.$model['mak']?></p>
				</div>
			</div>
			<div style="margin-bottom:0px;margin-left:10px;margin-top:-20px">
				<label class="col-sm-2 control-label">2. Kode</label>
				<p class="col-sm-1 control-label" style="margin-left:300px;margin-top: -20px">: </p>
				<div class="col-sm-8">
					<p style="font-size:14px;margin-top:-35px;margin-left:320px;"></p>
				</div>
			</div>
		</div>
		<hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 1px;height: 4px;">
		
		<div style='width: 100%;margin:10px 0px 0px 10px'>
			<div style='float: left; width: 30%;margin-top:0px'>	
				<div style="margin-top:-30px">
					<p style="font-size:12px;font-family:'Times New Roman', Times, serif; margin-bottom:0px;">
						Setuju/Lunas dibayar, tanggal
					</p>
					<p style="font-size:12px;font-family:'Times New Roman', Times, serif;margin:0px;">
						<?php echo $model['jabatan2'];?>
					</p>
				</div>
				<div style="height:50px"></div>
				<?php
					$pegawai= (new \yii\db\Query());
					$pegawai->select(['*']) 
					->from('pegawai')
					->where(['id_pegawai' => $model['pegawai2']]);
					$command = $pegawai->createCommand();
					$pegawai = $command->queryOne();
				?>
				<div style="">
					<p style="font-size:12px;font-family:'Times New Roman', Times, serif;">
						<?php echo $pegawai['nama_pegawai'];?> 
					</p>
				</div>
				<div style="margin-top:-30px">
					<p style="font-size:12px;font-family:'Times New Roman', Times, serif;">
						NIP. <?php echo $pegawai['nip'];?> 
					</p>
					
				</div>
			</div>
			<div style='float: center; width: 33.3%;margin-top:-30px'>	
				<div style="margin-top:0px">
					<p style="font-size:12px;font-family:'Times New Roman', Times, serif;margin-bottom:0px;">
						Diterima tanggal, 
					</p>
					<p style="font-size:12px;font-family:'Times New Roman', Times, serif;margin:0px;">
						Penerima Uang /Uang Muka Kerja
					</p>
				</div>
				<div style="height:50px"></div>
				<div style="">
					<p style="font-size:12px;font-family:'Times New Roman', Times, serif;">
						<?php echo $model['nama_pegawai'];?> 
					</p>
				</div>
				<div style="margin-top:-30px">
					<p style="font-size:12px;font-family:'Times New Roman', Times, serif;">
						NIP/NIK.<?php echo $model['nip'];?> 
					</p>
					
				</div>
			</div>
			<div style='float: right; width: 36.6%;margin-top:-178px;'>	
				<div style="margin-top:26px">
					<p style="font-size:12px;font-family:'Times New Roman', Times, serif;margin-bottom:1px;">
						Pekanbaru,
					</p>
					<p style="font-size:12px;font-family:'Times New Roman', Times, serif;margin-top:-20px">
						<?php echo $model['jabatan1'];?>
					</p>
				</div>
				<div style="height:35px"></div>
				<?php
					$pegawai= (new \yii\db\Query());
					$pegawai->select(['*']) 
					->from('pegawai')
					->where(['id_pegawai' => $model['pegawai1']]);
					$command = $pegawai->createCommand();
					$pegawai = $command->queryOne();
				?>
				<div style="">
					<p style="font-size:12px;font-family:'Times New Roman', Times, serif;">
						<?php echo $pegawai['nama_pegawai'];?> 
					</p>
				</div>
				<div style="margin-top:-30px">
					<p style="font-size:12px;font-family:'Times New Roman', Times, serif;">
						NIP. <?php echo $pegawai['nip'];?> 
					</p>
					
				</div>
			</div>
			
			
		</div>
		
	</div>
	Bagian Akademik Biro AAKK UIN SUSKA RIAU

	</page>

	<br>
	<br>
	<br>
	<page>
	<!--page pengeluaran riil-->
	<div class="row" id="page-border" style="height:800px;">
		<!-- Form horizontal layout striped -->
		<div style="margin:0px 0px 0px 300px">
			
			<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:12px;margin-bottom:0px">LAMPIRAN IX<br>PERATURAN MENTERI KEUANGAN REPUBLIK INDONESIA<br> NOMOR 113/PMK.05/2012<br>TENTANG<br>PERJALANAN DINAS DALAM NEGERI BAGI PEJABAT NEGARA, PEGAWAI NEGERI DAN PEGAWAI TIDAK TETAP</p></pre>
		</div>
		<h2 style="text-align:center">DAFTAR PENGELUARAN RIIL</h2>
		<div style="margin:30px 10px 0px 10px">
			
			<p style="font-size:14px;margin-top:0px;margin-left:0px;margin-bottom:0px">Yang bertanda tangan dibawah ini:</p>
			
			<div style="margin:0px 10px 0px 50px">
				<div class="">
					<label>Nama</label>
					<div class="col-sm-8">
						<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:-30px;margin-left:123px;margin-bottom:-10px"> : <?= $model['nama_pegawai'];?></p></pre>
					</div>
				</div>
				<div class="">
					<label>NIP/NIK</label>
					<div class="col-sm-8">
						<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:-30px;margin-left:123px;margin-bottom:-10px"> : <?= $model['nip'];?></p></pre>
					</div>
				</div>
				<div class="">
					<label>Jabatan</label>
					<div class="col-sm-8">
						<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:-30px;margin-left:123px;margin-bottom:-20px"> : <?= $modelJabatan['nama_jabatan'];?></p></pre>
					</div>
				</div>
			</div>
			<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:0px;margin-left:0px;margin-bottom:0px">Berdasarkan Surat Perjalanan Dinas (SPD) nomor : <?= $model['no_spd'];?> tanggal <?= $this->context->tgl_indo($model['tgl_spd']);?> dengan ini kami menyatakan dengan sesungguhnya bahwa :</p></pre>
			<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:0px;margin-left:30px;margin-bottom:0px">1. Biaya transport pegawai dan biaya penginapan dibawah ini yang tidak dapat diperoleh bukti-bukti pengeluarannya meliputi :</p></pre>
			
			
			<div style="margin-top:20px">
				<?php $total=0;?>
				<table style="width:100%;font-size:12px;">
					<thead>
						<tr>
							<th>NO</th>
							<th>RINCIAN BIAYA</th>
							<th>BIAYA</th>
							<th>KET</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no=1;
							$nomor=0+$no;
							foreach($modeldetail as $md): 
							$total=$total+($md['volume']*$md['harga']);
							$rp='';
							if(strlen($md['volume']*$md['harga'])==6)
							{
								$rp='&nbsp;&nbsp;&nbsp;';
							}
						?>
						<tr>
							<td align="center"><?= $no;?></td>
							<td ><?= $md['kegiatan']. " " .$md['volume']. " " .$md['nama_satuan']. " @ Rp " .number_format($md['harga']);?></td>
							<td align="right"> Rp <?php echo $rp.number_format($md['volume']*$md['harga']);?></td>
							<td ></td>							
						</tr>
						<?php $no++;endforeach; ?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="2" style="text-align:center;font-size:14px">JUMLAH</th>
							<th style="text-align:center;font-size:12px">Rp <?php echo number_format($total);?></th>
							<th></th>
						</tr>
						<tr>
							<th colspan="4" style="text-align:left;font-size:12px"><b>Terbilang : <?php echo $this->context->nominal($total); ?></b></th>
							
						</tr>
					</tfoot>
					
				</table>
			</div>
			<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:0px;margin-left:30px;margin-bottom:0px">2. Jumlah uang tersebut pada angka <?= $no;?> diatas benar-benar dikeluarkan untuk pelaksanaan perjalanan dinas dimaksud dan apabila di kemudian hari terdapat kelebihan atas pembayaran, kami bersedia untuk menyetorkan kelebihan tersebut ke kas negara</p></pre>
			<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:0px;margin-left:0px;margin-bottom:0px">Demikian pernyataan ini kami buat dengan sebenarnya, untuk dipergunakan sebagai mana mestinya</p></pre>
			<div style='width: 100%;margin:20px 10px 0px 10px'>
				<div style='float: left; width: 50%;margin-top:30px'>
					<div>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:30px;margin-bottom:-5px">
							Mengetahui/menyetujui :
						</p>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:0px;margin-bottom:-5px">
							<?= $data5['nama_jabatan'];?>
						</p>
					</div>
					<div style="height:80px"></div>
					<div style="">
						<?php
							$pegawai= (new \yii\db\Query());
							$pegawai->select(['*']) 
							->from('pegawai')
							->where(['id_pegawai' => $model['pegawai2']]);
							$command = $pegawai->createCommand();
							$pegawai = $command->queryOne();
						?>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin:1px;">
							<b>
								<?= $data5['pegawai'];?>
							</b>
						</p>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:-10px">
							<b>
								NIP. <?= $data5['nip'];?>
							</b>
						</p>
					</div>
				</div>
				<div style='float: left; width: 50%;margin-top:0px'>
					<div>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:30px;margin-bottom:-5px">
							Pekanbaru, 
						</p>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:0px;margin-bottom:-5px">
							Pelaksana SPD
						</p>
					</div>
					<div style="height:84px"></div>
					<div style="">
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-bottom:1px">
							<b>
								<?= $model['nama_pegawai'];?>
							</b>
						</p>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:-10px">
							<b>
								NIP/NIK. <?= $model['nip'];?>
							</b>
						</p>
					</div>
				</div>
			</div>
			
			
		</div> 
		
	
	

	</div>
	Bagian Akademik Biro AAKK UIN SUSKA RIAU

	</page>
</body>
</html>