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
               border:4px double white;
           }
	table, th, td {
    border: 1px solid black;
	border-collapse: collapse;

	}
	</style>
<head>
<body class="solid">
	
	<page>
	<!--page pengeluaran riil-->
	<div class="row" id="page-border" style="height:800px;">
		<!-- Form horizontal layout striped -->
		<div style="margin:130px 10px 0px 10px">
			
			<div style="margin:0px 10px 0px 0px">
				<div class="">
					<label>Nomor</label>
					<div class="col-sm-8">
						<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:-30px;margin-left:123px;margin-bottom:-10px"> : Un.04/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/KU.00.1/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/2018</p></pre>

						<pre style="margin:-20px 0px 0px 420px;float:right;">Pekanbaru, <?= $this->context->tgl_indo(date('Y-m-d')) ?></pre>
					</div>
				</div>
				<div class="">
					<label>Sifat</label>
					<div class="col-sm-8">
						<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:-30px;margin-left:123px;margin-bottom:-10px"> : Penting</p></pre>
					</div>
				</div>
				<div class="">
					<label>Lampiran</label>
					<div class="col-sm-8">
						<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:-30px;margin-left:123px;margin-bottom:-10px"> : 1 Eksemplar</p></pre>
					</div>
				</div>
				<div class="">
					<label>Hal</label>
					<div class="col-sm-8">
						<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:-30px;margin-left:123px;margin-bottom:-10px"> : <b>Permintaan Pembayaraan</b></p></pre>
					</div>
				</div>
			</div>
			<!-- kepada -->
			<div style="margin:20px 10px 0px 123px">
				<div class="">
					<label>
						Kepada <br>
						Yth.Rektor<br>
						Universitas Islam Negeri<br>
						Sultan Syarif Kasim Riau<br>
						Pekanbaru
					</label>
				</div>
			</div>
			<div style="margin:20px 10px 0px 123px">
				<div>
					<p align="justify">
						Assalamu'alaikum,wr,wb,<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dengan Hormat, untuk kelancaran Program Kegiatan Biro Administrasi Akademik, Kemahasiswaan dan Kerjasama Tahun Anggaran 2018, dengan ini kami harapkan Bapak dapat membayarkan <b>Dana Kegiatan Bagian Akademik</b> yang ada pada <b>POK BIRO AAKK BAGIAN AKADEMIK</b>  tahun Anggaran tahun 2018 dengan jumlah  <b>Rp.    <?= number_format($total) ?>,- (<?= $this->context->nominal($total) ?>)</b>   dengan rincian sebagaimana terlampir.<br><br>
						
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikianlah, atas perhatian dan kerjasama Bapak kami mengucapkan terima kasih.
					</p>
				</div>
			</div>
			
			
			<div style="margin:20px 10px 0px 380px">
				<div>
					<label>
						Wassalam<br>
						Kepala Bagian Akademik<br><br><br><br>


						Rinayeni,S.Sos<br>
						NIP. 19690618 199102 2 001
					</label>
				</div>
			</div>
			
			
			
		</div> 
		
	
	

	</div>

	</page>
	<page>
		<div class="row" id="page-border" style="height:800px;">
		<!-- Form horizontal layout striped -->
		<h3 style="text-align:center;margin:130px 0 -40px 0"><u>SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK</u></h3>
		<p style="text-align:center;margin-top:0px;font-size:14px;">Nomor :Un.04/B.I.1/KU.00.2/        /2018</p>
		<div style="margin:0px 10px 0px 10px">
			<div style="margin:0px 0px 0px 0px">
				<p style="font-size:14px;margin-top:0px;margin-left:0px;margin-bottom:0px">Yang bertanda tangan dibawah ini:</p>
				<div style="margin:30px 10px 0px 50px">
					<div class="">
						<label>Nama</label>
						<div class="col-sm-8">
							<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:-30px;margin-left:123px;margin-bottom:-10px"> : Rinayeni,S.Sos<?php // $model['nama_pegawai'];?></p></pre>
						</div>
					</div>
					<div class="">
						<label>NIP/NIK</label>
						<div class="col-sm-8">
							<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:-30px;margin-left:123px;margin-bottom:-10px"> : 19690618 199102 2 001<?php // $model['nip'];?></p></pre>
						</div>
					</div>
					<div class="">
						<label>Jabatan</label>
						<div class="col-sm-8">
							<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:-30px;margin-left:123px;margin-bottom:-20px"> : Kepala Bagian Akademik Biro AAKK UIN Suska Riau<?php // $model['nama_jabatan'];?></p></pre>
						</div>
					</div>
				</div>
			</div> 
			<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:30px;margin-left:0px;margin-bottom:0px">Menyatakan dengan sesungguhnya bahwa :</p></pre>
			<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:0px;margin-left:0px;margin-bottom:0px;text-align:justify">Saya bertanggungjawab penuh secara formal dan material atas segala pengeluaran yang telah dibayar lunas oleh Bendahara Pengeluaran kepada yang berhak menerima serta kebenaran perhitungan pembayaran atas pertanggung jawaban penggunaan dana BLU Bagian Akademik Biro AAKK UIN Suska Riau sebesar <b>Rp.    <?= number_format($total) ?>,- (<?= $this->context->nominal($total) ?>)</b>  Apabila dikemudian hari terdapat kesalahan/kelebihan atas pembayaran tersebut, sebagian atau seluruhnya, kami bertanggung jawab sepenuhnya dan bersedia menyetorkan atas kesalahan dan/atau kelebihan pembayaran tersebut ke kas Negara/Kas BLU UIN Sultan Syarif Kasim Riau.</p></pre>
			<pre style="font-family:'Times New Roman', Times, serif;"><p style="font-size:14px;margin-top:0px;margin-left:0px;margin-bottom:0px">Demikian pernyataan ini kami buat dengan sebenarnya, untuk dipergunakan sebagai mana mestinya</p></pre>
			<div style='width: 100%;margin:20px 10px 0px 10px'>
				<div style='float: left; width: 60%;margin-top:30px'>

				</div>
				<div style='float: right; width: 40%;margin-top:-55px'>
					<div>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:30px;margin-bottom:0px">
							Pekanbaru, <?= $this->context->tgl_indo(date('Y-m-d')) ?>
						</p>
						
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:0px;margin-bottom:-5px">
							<p style="margin:0 0 0 -30px;">a.n. Kuasa Pengguna Anggaran</p>
							Pejabat Pembuat Komitmen<br>
							Kepala Bagian Akademik<br>

						</p>
					</div>
					<div style="height:64px"></div>
					<div style="">
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-bottom:1px">
							<b>
								Rinayeni, S.Sos
							</b>
						</p>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:-10px">
							<b>
								NIP.19690618 199102 2 001 
							</b>
						</p>
					</div>
				</div>
			</div>
			
			
		</div> 
		
		

	</div>
	
	<!--page +-->
	</page>
</body>
</html>