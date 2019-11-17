

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Kwitansi; 
use common\models\Satuan; 
use common\models\Kegiatan; 
use common\models\Mak; 
use common\models\Penerima; 
use dosamigos\ckeditor\CKEditor;
use kartik\date\DatePicker;
// use yii\widget\DatePicker;
// use mihaildev\ckeditor\CKEditor;
// use mihaildev\elfinder\ElFinder;


/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'KWITANSI / BUKTI PEMBAYARAN';
// $this->title = 'Update Kwitansi: ' . $model->id_kwitansi;
$this->params['breadcrumbs'][] = ['label' => 'Kwitansi', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id_kwitansi, 'url' => ['view', 'id' => $model->id_kwitansi]];
$this->params['breadcrumbs'][] = 'view';
// $this->params['breadcrumbs'][] = ['label' => $model->id_kwitansi];

?>

<div class="post-form">
	<div class="col-md-12">
		<!-- Form horizontal layout striped -->

			<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','class'=>'form-horizontal panel panel-default']]) ?>
			<div class="panel-heading">
				<?php echo \yii\helpers\Html::a( 'Back', Yii::$app->request->referrer,['class'=>'btn btn-default pull-left']); ?> 
				<h3 class="panel-title pull-left">Kwitansi </h3>
				<a href="<?php echo Yii::$app->getHomeUrl(); ?>kwitansi/report?id=<?= $_GET['id'] ?>" class='btn btn-default pull-right' style='margin-top:-3%;' target="_blank">Cetak</a>
			</div>              
			<div class="panel-body">
				<div style="margin-left:680px">
					<div class="form-group">
						<label class="col-sm-6 control-label">Tahun :</label>
						<div class="col-sm-5" style="margin-bottom:0px;margin-top:8px">
							<?php //echo  $this->context->tgl_indo($model['tgl_kwitansi']);?>
						</div>
					</div>
					<div class="form-group" style="margin-top:-10px">
						<label class="col-sm-6 control-label">Nomor Bukti :</label>
						<div class="col-sm-5" style="margin-top:5px">
							<?= $model['no_bukti'];?>
						</div>
					</div>
					<div class="form-group" style="margin-top:-10px">
						<label class="col-sm-6 control-label">Mak :</label>
						<div class="col-sm-5" style="margin-top:8px">
							<?= $model['mak'];?>
						</div>
						<div style="padding-top:10px">
							
						</div>
						
					</div>		
				</div>		
				<b><p style="margin-left:280px;font-size:30px;margin-bottom:30px"><u><?= Html::encode($this->title) ?></u></p></b>
				<div class="form-group">
					<label class="col-sm-2 control-label">Sudah Terima Dari :</label>
					<div class="col-sm-8">
						<p style="font-size:14px;margin-top:6px;margin-left:-15px;margin-bottom:-10px"> Kuasa Pengguna Anggaran / Pejabat Pembuat Komitmen UIN Suska Riau</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Uang Sebanyak :</label>
					<div class="col-sm-8">
						<p style="font-size:16px;margin-top: 5px;margin-left: -15px;">Rp <?php echo number_format($model['total']);?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Terbilang :</label>
					<div class="col-sm-10">
						<p style="font-size:16px;margin-top: 5px;margin-left: -15px;margin-bottom:0px"><?php echo $this->context->nominal($model['total']) ?> </p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Untuk Pembayaran :</label>
					<div class="col-sm-8" style="margin-top:7px;margin-left:-16px;font-size:14px">
						<?= $model['keterangan'];?>
					</div>
				</div>
				
				<div class="form-group" style="margin-top:10px;padding-top:15px;background-color:#e2e2e2">
					<div class="col-sm-12" style="padding-left:100px;">
						<div class="col-sm-4">
							<?= $form->field($model2, 'kegiatan')->textInput(['maxlength' => true,'placeholder'=>'Kegiatan','class'=>'form-control'])->label(false) ?>
						</div>
						<div class="col-sm-1">
							<?= $form->field($model2, 'volume')->textInput(['type'=>'number','maxlength' => true,'placeholder'=>'Vol','class'=>'form-control'])->label(false) ?>
						</div>
						<div class="col-sm-2">
							<?=
								$form->field($model2, 'satuan')->dropDownList(
									ArrayHelper::map(Satuan::find()->all(),'id_satuan','nama_satuan'),
									['prompt'=>'-pilih satuan-']
								)->label(false)
							?>
						</div>
						<div class="col-sm-3">
							<?= $form->field($model2, 'harga')->textInput(['maxlength' => true,'placeholder'=>'Harga','class'=>'form-control'])->label(false) ?>
						</div>
						
						<div class="col-sm-2">
							<?= Html::submitButton($model2->isNewRecord ? 'Tambah' : 'Update', ['class' => $model2->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
						</div>
					</div>
					<div class="col-sm-12" style="padding-left:500px;margin-top:-15px">
						<?= Html::a('<i class="ico-plus"></i> Satuan', ['satuan', 'id'=>$_GET['id'] ], ['class' => '']) ?>
					</div>
					<?php ActiveForm::end(); ?>
				</div>
				<br>
				<div class="form-group" style="margin-top:-10px;">
					<?php $total=0;?>
					<?php foreach($modeldetail as $md): ?>
					<div class="col-sm-12" >
						
						<div class="col-sm-9">
							<p style="font-size:17px;margin-top:10px;margin-left:100px;">
								<?= Html::a('<i class="ico-pencil5"></i>', ['/kwitansi/updatekd','id'=>$md['id_kd'],'view'=>$md['id_kwitansi'] ], ['class' => 'btn btn-info pull-left']) ?>
							</p>
							<p style="font-size:17px;margin-top:5px;margin-left:140px;">
								<?= Html::a('<i class="ico-trash"></i>', ['/kwitansi/deletekd','id'=>$md['id_kd'],'view'=>$md['id_kwitansi'], 'v'=>'view' ], ['class' => 'btn btn-danger pull-left', 'data' => ['confirm' => 'Anda yakin mau menghapus ?','method' => 'post',]]) ?>
							</p>
							<p style="font-size:17px;margin-top:5px;margin-left:200px"><?php echo $md['kegiatan']. " " .$md['volume']. " " .$md['nama_satuan']. " @ Rp " .number_format($md['harga']);?></p>
							
						</div>
						<div class="col-sm-3">
							<p style="font-size:17px;margin-top:5px;margin-left:50px;">= Rp<p style="font-size:17px;margin-top:-32px;margin-left:50px;text-align:right"> <?php $total=$total+($md['volume']*$md['harga']); echo number_format($md['volume']*$md['harga'])?></p>
						</div>
							
					</div>
					<?php endforeach; ?>
				</div>
				
				<div class="form-group" style="margin-top:-10px">
					<div class="col-sm-12" >
						<div class="col-sm-9">
							<p style="font-size:17px;margin-top:5px;margin-left:200px">Jumlah</p>
						</div>
						<div class="col-sm-3">
							<p style="font-size:17px;margin-top:5px;margin-left:50px;">= Rp<p style="font-size:17px;margin-top:-32px;margin-left:50px;text-align:right"> <?php echo number_format($total)?></p>
						</div>	
					</div>
					
				</div>
				<div class="form-group" style="margin-top:-10px">
					<div class="col-sm-12" >
						
						<div class="col-sm-9">
							<div style="margin-left:140px">
								<?php if($model['ppn']==0){?>
									<?= Html::a('<i class="ico-pencil5"></i>', ['/kwitansi/ubahppn','id'=>$model['id_kwitansi'],'ppn'=>'10' ], ['class' => 'btn btn-info']) ?>
								<?php }else{?>
									<?= Html::a('<i class="ico-pencil5"></i>', ['/kwitansi/ubahppn','id'=>$model['id_kwitansi'],'ppn'=>'0' ], ['class' => 'btn btn-warning']) ?>
								<?php }?>
							</div>
							<p style="font-size:17px;margin-top:-30px;margin-left:198px">PPN <?= $model['ppn'];?> %</p>
						</div>
						<div class="col-sm-3">
							<p style="font-size:17px;margin-top:5px;margin-left:50px;">= Rp<p style="font-size:17px;margin-top:-32px;margin-left:50px;text-align:right"> <?php $total2=$total*($model['ppn']/100);echo number_format($total2)?></p>
						</div>	
					</div>
					
				</div>
				
				<div class="form-group" style="margin-top:-10px">
					
					<div class="col-sm-12" >
						
						<div class="col-sm-9">
							<p style="font-size:17px;margin-top:5px;margin-left:200px">Total</p>
						</div>
						<div class="col-sm-3">
							<p style="font-size:17px;margin-top:5px;margin-left:50px;">= Rp<p style="font-size:17px;margin-top:-32px;margin-left:50px;text-align:right"> <?php $hasil=$total+$total2;echo number_format($hasil)?></p>
							<?php 

								$modeltotal->total=$hasil;
								$modeltotal->save(false);
							?>
						</div>	
					</div>
					
				</div>

				<div style="margin-left:750px" >					
					<div>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:30px;margin-bottom:-5px">
							Pekanbaru,  <?= $model['tgl_kwitansi'];?>
						</p>
					</div>
					<div style="height:100px"></div>
					<div style="">
						<b>
							<p style="font-size:17px;font-family:'Times New Roman', Times, serif;">
								<?= $model['nama_penerima'];?>
							</p>
						</b>
						<b>
							<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:-10px">
								<?= $model['nama_toko'];?>
							</p>
						</b>
					</div>	
				</div>
				
				
				<hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 1px;">
				<div class="col-sm-12">
					<div class="col-sm-7">
						<div>
							<p style="font-size:17px;font-family:'Times New Roman', Times, serif;">
								Setuju dibebankan pada mata annggaran berkenaan <br>a.n Kuasa Pengguna Anggaran 
							</p>
							<?php
								$pegawai= (new \yii\db\Query());
								$pegawai->select(['*']) 
								->from('pegawai')
								->where(['id_pegawai' => $model['pegawai1']]);
								$command = $pegawai->createCommand();
								$pegawai = $command->queryOne();
							?>
							<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:-10px">
								 <?php echo $model['jabatan1'];?>
							</p>
						</div>
						<div style="height:100px"></div>
						<div style="">
							<b>
								<p style="font-size:17px;font-family:'Times New Roman', Times, serif;">
									<?php echo $pegawai['nama_pegawai'];?>
								</p>
							</b>
							<b>
								<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:-10px">
									NIP. <?php echo $pegawai['nip'];?>
								</p>
							</b>
						</div>
					</div>
					<div class="col-sm-5">
						<div>
							
							<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:30px;margin-bottom:-5px">
								Lunas dibayar Tanggal, 
							</p>
							<?php
								$pegawai= (new \yii\db\Query());
								$pegawai->select(['*']) 
								->from('pegawai')
								->where(['id_pegawai' => $model['pegawai2']]);
								$command = $pegawai->createCommand();
								$pegawai = $command->queryOne();
							?>
							<p style="font-size:17px;font-family:'Times New Roman', Times, serif;">
								<?php echo $model['jabatan2'];?>
							</p>
						</div>
						<div style="height:100px"></div>
						<div style="">
							<b>
								<p style="font-size:17px;font-family:'Times New Roman', Times, serif;">
									<?php echo $pegawai['nama_pegawai'];?>	
								</p>
							</b>
							<b>
								<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:-10px">
									NIP.<?php echo $pegawai['nip'];?>
								</p>
							</b>
						</div>
					</div>
				</div>
				
				<div class="col-sm-12">
				
					<hr>
					<div class="col-sm-7">
						<div>
							<?php
								$pegawai= (new \yii\db\Query());
								$pegawai->select(['*']) 
								->from('pegawai')
								->where(['id_pegawai' => $model['pegawai3']]);
								$command = $pegawai->createCommand();
								$pegawai = $command->queryOne();
							?>
							<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:-10px">
								 <?php echo $model['jabatan3'];?>
							</p>
						</div>
						<div style="height:100px"></div>
						<div style="">
							<b>
								<p style="font-size:17px;font-family:'Times New Roman', Times, serif;">
									<?php echo $pegawai['nama_pegawai'];?>
								</p>
							</b>
							<b>
								<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:-10px">
									NIP. <?php echo $pegawai['nip'];?>
								</p>
							</b>
						</div>
					</div>
					
				</div>
				
			</div>
			
		<!--/ Form horizontal layout striped -->
	</div>
</div>




