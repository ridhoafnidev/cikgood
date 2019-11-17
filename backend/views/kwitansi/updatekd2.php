

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
$this->title = 'RINCIAN BIAYA PERJALANAN DINAS';
// $this->title = 'Update Kwitansi: ' . $model->id_kwitansi;
$this->params['breadcrumbs'][] = ['label' => 'Kwitansi', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id_kwitansi, 'url' => ['view', 'id' => $model->id_kwitansi]];
$this->params['breadcrumbs'][] = 'view  biaya perjalanan';
// $this->params['breadcrumbs'][] = ['label' => $model->id_kwitansi];

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
$jabata4->select(['jabatan.*',  'pegawai.nip as nip','pegawai.nama_pegawai as pegawai']) 
->from('jabatan')
->where(['id_jabatan' => 4])
->leftJoin('pegawai', 'pegawai.id_pegawai = jabatan.id_pegawai');
$command = $jabata4->createCommand();
$data5 = $command->queryOne();
//jabatan penanggunag jawab

//jabatan bendahara
$jabatan2= (new \yii\db\Query());
$jabatan2->select(['jabatan.*',  'pegawai.nip as nip','pegawai.nama_pegawai as pegawai']) 
->from('jabatan')
->where(['id_jabatan' => 2])
->leftJoin('pegawai', 'pegawai.id_pegawai = jabatan.id_pegawai');
$command = $jabatan2->createCommand();
$data3 = $command->queryOne();
//jabatan bendahara

//jabatan bendahara pembantu
$jabatan3= (new \yii\db\Query());
$jabatan3->select(['jabatan.*',  'pegawai.nip as nip','pegawai.nama_pegawai as pegawai']) 
->from('jabatan')
->where(['id_jabatan' => 3])
->leftJoin('pegawai', 'pegawai.id_pegawai = jabatan.id_pegawai');
$command = $jabatan3->createCommand();
$data4 = $command->queryOne();
//jabatan bendahara


$dibayar=0;
?>


<div class="post-form">
	<div class="col-md-12">
		<!-- Form horizontal layout striped -->

			<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','class'=>'form-horizontal panel panel-default']]) ?>
			<div class="panel-heading">
				<?php echo \yii\helpers\Html::a( 'Back', Yii::$app->request->referrer,['class'=>'btn btn-default pull-left']); ?> 
				<h3 class="panel-title pull-left">Kwitansi Biaya Perjalanan </h3>
			</div>               
			<div class="panel-body">
					
				<b><p style="margin-left:280px;font-size:30px;margin-bottom:30px"><u><?= Html::encode($this->title) ?></u></p></b>
				<div style="margin:0px 0px 0px -100px">
					<div class="form-group">
						<label class="col-sm-3 control-label">Lampiran SPD Nomor :</label>
						<div class="col-sm-8 control-label">
							<p class="pull-left">Un.04/PPK/&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp/<?php echo date('Y');?></p>
						</div>
					</div>
					<div class="form-group" style="margin-top:-20px">
						<label class="col-sm-3 control-label">Tanggal :</label>
						<div class="col-sm-8">
							<p style="font-size:14px;margin-top:6px;margin-left:-5px;margin-bottom:-10px"> </p>
						</div>
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
					<table class="table table-striped table-bordered" id="zero-configuration">
						<thead>
							<tr>
								<th>NO</th>
								<th>RINCIAN BIAYA</th>
								<th>BIAYA</th>
								<th>KET</th>
							</tr>
						</thead>
						<tbody>
							<?php $total=0;$no=1;foreach($modeldetail as $md): ?>
							<tr>
								<td align="center"><?= $no;?></td>
								<td >
									<?= Html::a('<i class="ico-pencil5"></i>', ['/kwitansi/updatekd2','id'=>$md['id_kd'],'view'=>$md['id_kwitansi'] ], ['class' => 'btn btn-info pull-left btn-xs']) ?>
									<?= Html::a('<i class="ico-trash"></i>', ['/kwitansi/deletekd','id'=>$md['id_kd'],'view'=>$md['id_kwitansi'], 'v'=>'view2' ], ['class' => 'btn btn-danger pull-left btn-xs', 'data' => ['confirm' => 'Anda yakin mau menghapus ?','method' => 'post',]]) ?> | 
									<?= $md['kegiatan']. " " .$md['volume']. " " .$md['nama_satuan']. " @ Rp " .number_format($md['harga']);?>
								</td>
								<td >Rp <span class="pull-right"><?=  number_format($md['volume']*$md['harga']);?></span></td>
								<td ></td>							
							</tr>
							<?php $total=$total+($md['volume']*$md['harga']);?>
							<?php $no++;endforeach; ?>
						</tbody>
						<tfoot>
							<tr>
								<th colspan="2" style="text-align:center">JUMLAH</th>
								<th>Rp <span class="pull-right"><?php echo number_format($total)?></span></th>
								<th></th>
							</tr>
							<tr>
								<th colspan="4" style="text-align:left"><b>Terbilang : <?php echo $this->context->nominal($total) ?></b></th>
								
							</tr>
						</tfoot>
						
					</table>
					
				</div>
				<?php 
					$modeltotal->total=$total;
					$modeltotal->save(false);
				?>
				
				<div style="margin-left:30px;margin-top:100px" >					
					<div>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:30px;margin-bottom:-5px">
							Telah dibayar sejumlah
						</p>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:0px;margin-bottom:-5px">
							Rp <?= $dibayar;?>,-
						</p>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:0px;margin-bottom:-5px">
							<?= $data4['nama_jabatan'];?>
						</p>
					</div>
					<div style="height:100px"></div>
					<div style="">
						<b>
							<p style="font-size:17px;font-family:'Times New Roman', Times, serif;">
								<?= $data4['pegawai'];?>
							</p>
						</b>
						<b>
							<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:-10px">
								<?= $data4['nip'];?>
							</p>
						</b>
					</div>	
				</div>

				<div style="margin-left:700px;margin-top:-295px" >					
					<div>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:30px;margin-bottom:-5px">
							Pekanbaru, 
						</p>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:30px;margin-bottom:-5px">
							Telah menerima jumlah uang sebesar
						</p>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:0px;margin-bottom:-5px">
							Rp <?php echo number_format($total)?>
						</p>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:0px;margin-bottom:-5px">
							Yang Menerima
						</p>
					</div>
					<div style="height:110px"></div>
					<div style="">
						<b>
							<p style="font-size:17px;font-family:'Times New Roman', Times, serif;">
								<?= $model['nama_pegawai'];?>
							</p>
						</b>
						<b>
							<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:-10px">
								<?= $model['nip'];?>
							</p>
						</b>
					</div>	
				</div>
				
				
				<hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 1px;">
				<div style="font-family:'Times New Roman', Times, serif;margin-left:300px">
					<h3>PERHITUNGAN SPD RAMPUNG</h3>
				</div>
				<div style="margin:0px 0px 0px 200px">
					<div class="">
						<label style="font-size:16px;margin-left:-65px">Ditetapkan sejumlah</label>
						<label style="font-size:16px;margin-top:6px;margin-left:225px;margin-bottom:-10px">Rp</label>
						<label style="font-size:16px;margin-top:6px;margin-left:100px;margin-bottom:-10px"><?php echo number_format($total)?>,- </label>
						
					</div>
					<div class="">
						<label style="font-size:16px;margin-left:-65px">Yang telah dibayar semula</label>
						<label style="font-size:16px;margin-top:6px;margin-left:180px;margin-bottom:-10px"> Rp </label>
						<label style="font-size:16px;margin-top:6px;margin-left:143px;margin-bottom:-10px"><?= $dibayar?>,-</label>
						
					</div>
				</div>
					
				<hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: 100px;margin-right: 200px;border-style: inset;border-width: 1px;">
				<div style="margin:0px 0px 0px 200px">
					<div class="">
						<label style="font-size:16px;margin-left:-65px">Sisa kurang / lebih</label>
						<label style="font-size:16px;margin-top:6px;margin-left:245px;margin-bottom:-10px"> Rp</label>
						<label style="font-size:16px;margin-top:6px;margin-left:105px;margin-bottom:-10px"><?php $totalbayar=$total+$dibayar; echo $totalbayar?>,-</label>
						
					</div>
				</div>
				<div style="margin:0px 100px 0px 100px;background-color:#989191;">
					<div class="">
						<label style="font-size:16px;margin-left:35px;color:white;padding:15px 0px 15px 0px">Terbilang "; <?php echo $this->context->nominal($totalbayar) ?></label>
						
						
					</div>
				</div>
				<div class="col-sm-12" style="margin-top:20px">
					<div class="col-sm-8">
						
					</div>
					<div class="col-sm-4">
						<div>
							<p style="font-size:17px;font-family:'Times New Roman', Times, serif;">
								<?php echo $data5['nama_jabatan'];?>
							</p>
						</div>
						<div style="height:100px"></div>
						<div style="">
							<b>
								<p style="font-size:17px;font-family:'Times New Roman', Times, serif;">
									<?php echo $data5['pegawai'];?>	
								</p>
							</b>
							<b>
								<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:-10px">
									NIP.<?php echo $data5['nip'];?>
								</p>
							</b>
						</div>
					</div>
				</div>
				
			</div>
			
		<!--/ Form horizontal layout striped -->
	</div>
</div>




