

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Kwitansi; 
use common\models\Kegiatan; 
use common\models\Jabatan; 
use common\models\Mak; 
use common\models\Penerima; 
use common\models\Pegawai; 
use dosamigos\ckeditor\CKEditor;
use kartik\date\DatePicker;
// use yii\widget\DatePicker;
// use mihaildev\ckeditor\CKEditor;
// use mihaildev\elfinder\ElFinder;


/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'KWITANSI / BUKTI PEMBAYARAN';

?>

<div class="post-form">
	<div class="col-md-12">
		<!-- Form horizontal layout striped -->
		<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','class'=>'form-horizontal panel panel-default']]) ?>

			<div class="panel-heading">
				<h3 class="panel-title">Kwitansi </h3>
			</div>               
			<div class="panel-body">
				<div style="margin-left:580px">
					<div class="form-group">
						<label class="col-sm-4 control-label">Tanggal Kwitansi :</label>
						<div class="col-sm-4" style="margin-bottom:-50px">
							<?= $form->field($model, 'tgl_kwitansi')->textInput(['type'=>'date','maxlength' => true,'class'=>'form-control'])->label(false) ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Nomor Bukti :</label>
						<div class="col-sm-4" style="margin-bottom:-50px">
							<?= $form->field($model, 'no_bukti')->textInput(['maxlength' => true,'class'=>'form-control','placeholder'=>'No Bukti'])->label(false) ?>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label">Mak :</label>
						<div class="col-sm-4" style="margin-bottom:0px">
							<?=
								$form->field($model, 'mak')->dropDownList(
									ArrayHelper::map(Mak::find()->all(),'id_mak','mak','nama_mak'),
									['prompt'=>'Pilih Mak','required'=>'required']
								)->label(false)
							?>
						</div>
						<div class="col-sm-2" style="padding-top:5px">
							<?= Html::a('<i class="ico-plus"></i> mak', ['mak'], ['class' => '']) ?>
						</div>
					</div>
					
					<div class="form-group" style="margin-top:-15px">
						<label class="col-sm-4 control-label">Kegiatan :</label>
						<div class="col-sm-4" style="margin-bottom:0px">
							<?=
								$form->field($model, 'kegiatan')->dropDownList(
									ArrayHelper::map(Kegiatan::find()->all(),'id_kegiatan','kode_kegiatan', 'nama_kegiatan'),
									['prompt'=>'Pilih Kegiatan','required'=>'required']
								)->label(false)
							?>
						</div>
						<div class="col-sm-3" style="padding-top:5px">
							<?= Html::a('<i class="ico-plus"></i> Kegiatan', ['kegiatan'], ['class' => '']) ?>
						</div>
					</div>
					<div style="padding-top:10px">
						
					</div>
					
				</div>		
				<b><p style="margin-left:280px;font-size:30px;margin-bottom:30px"><u><?= Html::encode($this->title) ?></u></p></b>
				<div class="form-group">
					<label class="col-sm-2 control-label">Sudah Terima Dari :</label>
					<div class="col-sm-8">
						<p style="font-size:16px;margin-top:6px;margin-left: -15px;margin-bottom:-10px"> Kuasa Pengguna Anggaran / Pejabat Pembuat Komitmen UIN Suska Riau</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Uang Sebanyak :</label>
					<div class="col-sm-8">
						<p style="font-size:16px;margin-top: 5px;margin-left: -15px;">Rp <?php echo number_format($model['total']);?> </p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Terbilang :</label>
					<div class="col-sm-8">
						<p style="font-size:16px;margin-top: 5px;margin-left: -15px;margin-bottom:10px"><?php echo $this->context->nominal($model['total']) ?> </p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Untuk Pembayaran</label>
					<div class="col-sm-8">
						 <?php //echo $form->field($model, 'keterangan')->widget(CKEditor::className(), [
							// 'options' => ['rows' => 6],
							// 'preset' => 'basic',
						// ])->label(false) ?>
						<?= $form->field($model, 'keterangan')->textArea(['maxlength' => true,'class'=>'form-control','rows'=>10,'cols'=>5])->label(false) ?>
						
					</div>
				</div>
				<div style="margin-left:700px" >					
					<div>
						<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:30px;margin-bottom:-5px">
							Pekanbaru, <?= $model['tgl_kwitansi'];?>
						</p>
					</div>
					<div style="height:100px"></div>
					<div class="col-md-7">
						<?=
							$form->field($model, 'kepada')->dropDownList(
								ArrayHelper::map(Penerima::find()->all(),'id_penerima','nama_penerima','nama_toko'),
								['prompt'=>'Pilih Penerima']
							)->label(false)
						?>
					</div>
					<div class="col-sm-5" style="padding-top:5px">
						<?= Html::a('<i class="ico-plus"></i> Penerima', ['penerima'], ['class' => '']) ?>
					</div>
					<div class="col-md-7">
						<?=
							$form->field($model, 'pegawai')->dropDownList(
								ArrayHelper::map(pegawai::find()->all(),'id_pegawai','nama_pegawai'),
								['prompt'=>'Pilih Pegawai']
							)->label(false)
						?>
					</div>
					<div class="col-sm-5" style="padding-top:5px">
						<?= Html::a('<i class="ico-plus"></i> Pegawai', ['pegawai'], ['class' => '']) ?>
					</div>
				</div>
				
				<div class="row">
					
					<div class="col-md-11">
						<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
					</div>
				</div>
				<hr style="display: block;margin-top: 0.5em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border-width: 1px;">
				<div class="col-sm-12">
					<div class="col-sm-7">
						<div>
							<p style="font-size:17px;font-family:'Times New Roman', Times, serif;">
								Setuju dibebankan pada mata anggaran berkenaan<br>
								a.n Kuasa Pengguna Anggaran 
							</p>
							<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:-10px">
								<?php
								$modelx= (new \yii\db\Query());
								$modelx	->select(['ttd.*', 'jabatan.nama_jabatan as jabatan','pegawai.nama_pegawai as pegawai','pegawai.nip as nip','pegawai.id_pegawai as id_pegawai']) 
								->from('ttd')
								->where(['id_ttd' => 2])
								->leftJoin('jabatan', 'jabatan.id_jabatan = ttd.id_jabatan')
								->leftJoin('pegawai', 'jabatan.id_pegawai = pegawai.id_pegawai');
								
								$command = $modelx->createCommand();
								$data2 = $command->queryOne();
								
								$value='';
								if($model->isNewRecord)
								{
									$value=$data2['jabatan'];
								}else{
									$value=$model['jabatan1'];
								}
								 
								 ?>
								<!--<a href="<?php echo Yii::$app->getHomeUrl(); ?>ttd/update?id=2&act=update&act_id=<?php //$_GET['id'] ?>"><?php echo $model['jabatan1'];?></a>-->
							</p>
							<div class="col-md-7" style="margin:0px">
							<?=
								$form->field($model, 'jabatan1')->dropDownList(
									ArrayHelper::map(Jabatan::find()->all(),'nama_jabatan','nama_jabatan'),
									['prompt'=>'Pilih Jabatan', 'class'=>'form-control', 'value'=>$value]
								)->label(false)
							?>
							</div>
							<p style="margin-top:-30px;margin-left:330px">
								<!--?= Html::a('<i class="ico-plus"></i> Jabatan', ['ttd', 'id'=>$data2['id_ttd'],'update'=>$model2['id_kwitansi'] ], ['class' => '']) ?-->
							</p>
						</div>
						<div style="height:130px"></div>
						<div style="">
								<p style="font-size:17px;font-family:'Times New Roman', Times, serif; margin:0px">
									<?php
										$pegawai= (new \yii\db\Query());
										$pegawai->select(['*']) 
										->from('pegawai')
										->where(['id_pegawai' => $model['pegawai1']]);
										$command = $pegawai->createCommand();
										$pegawai = $command->queryOne();
									
										$value='';
										if($model->isNewRecord)
										{
											$value=$data2['id_pegawai'];
										}else{
											$value=$model['pegawai1'];
										}
									?>
									 
									<div class="row" style="margin:0px">
										<div class="col-md-7" style="margin:0px">
										<?=
											$form->field($model, 'pegawai1')->dropDownList(
												ArrayHelper::map(pegawai::find()->all(),'id_pegawai','nama_pegawai'),
												['prompt'=>'Pilih Pegawai', 'class'=>'form-control', 'value'=>$value]
											)->label(false)
										?>
										</div>
									</div>
								</p>
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
								$modelx= (new \yii\db\Query());
								$modelx	->select(['ttd.*', 'jabatan.nama_jabatan as jabatan','pegawai.nama_pegawai as pegawai','pegawai.nip as nip','pegawai.id_pegawai as id_pegawai']) 
								->from('ttd')
								->where(['id_ttd' => 3])
								->leftJoin('jabatan', 'jabatan.id_jabatan = ttd.id_jabatan')
								->leftJoin('pegawai', 'jabatan.id_pegawai = pegawai.id_pegawai');
								
								$command = $modelx->createCommand();
								$data3 = $command->queryOne();
								
								$value='';
								if($model->isNewRecord)
								{
									$value=$data3['jabatan'];
								}else{
									$value=$model['jabatan2'];
								}
							?>
							<p style="font-size:17px;font-family:'Times New Roman', Times, serif;">
								<!--<a href="<?php echo Yii::$app->getHomeUrl(); ?>ttd/update?id=3&act=update&act_id=<?php //$_GET['id'] ?>"><?php echo $model['jabatan2'];?></a>-->
							</p>
							<div class="col-md-7" style="margin:0px">
							<?=
								$form->field($model, 'jabatan2')->dropDownList(
									ArrayHelper::map(Jabatan::find()->all(),'nama_jabatan','nama_jabatan'),
									['prompt'=>'Pilih Jabatan', 'class'=>'form-control', 'value'=>$value]
								)->label(false)
							?>
							</div>
						</div>
						<div style="height:90px"></div>
						<div style="">
							<b>
								<p style="font-size:17px;font-family:'Times New Roman', Times, serif;">
									<?php
										$pegawai= (new \yii\db\Query());
										$pegawai->select(['*']) 
										->from('pegawai')
										->where(['id_pegawai' => $model['pegawai2']]);
										$command = $pegawai->createCommand();
										$pegawai = $command->queryOne();
									
										$value='';
										if($model->isNewRecord)
										{
											$value=$data3['id_pegawai'];
										}else{
											$value=$model['pegawai2'];
										}
									?>
									<div class="row" style="margin:0px">
										<div class="col-md-7" style="margin:0px">
										<?=
											$form->field($model, 'pegawai2')->dropDownList(
												ArrayHelper::map(pegawai::find()->all(),'id_pegawai','nama_pegawai'),
												['prompt'=>'Pilih Pegawai', 'class'=>'form-control', 'required'=>'required', 'value'=>$value]
											)->label(false)
										?>
										</div>
									</div>
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
				<hr>
				<div class="col-sm-12">
					<hr>
					<div class="col-sm-7">
						<div>
							<p style="font-size:17px;font-family:'Times New Roman', Times, serif;margin-top:-10px">
								<?php
								$modelx= (new \yii\db\Query());
								$modelx	->select(['ttd.*', 'jabatan.nama_jabatan as jabatan','pegawai.nama_pegawai as pegawai','pegawai.nip as nip','pegawai.id_pegawai as id_pegawai']) 
								->from('ttd')
								->where(['id_ttd' => 1])
								->leftJoin('jabatan', 'jabatan.id_jabatan = ttd.id_jabatan')
								->leftJoin('pegawai', 'jabatan.id_pegawai = pegawai.id_pegawai');
								
								$command = $modelx->createCommand();
								$data2 = $command->queryOne();
						
								$value='';
								if($model->isNewRecord)
								{
									$value=$data2['jabatan'];
								}else{
									$value=$model['jabatan3'];
								}
								 ?>
								<!--<a href="<?php echo Yii::$app->getHomeUrl(); ?>ttd/update?id=1&act=update&act_id=<?php //$_GET['id'] ?>"><?php echo $model['jabatan3'];?></a>-->
							</p>
							
							<div class="col-md-7" style="margin:0px">
							<?=
								$form->field($model, 'jabatan3')->dropDownList(
									ArrayHelper::map(Jabatan::find()->all(),'nama_jabatan','nama_jabatan'),
									['prompt'=>'Pilih Jabatan', 'class'=>'form-control', 'required'=>'required', 'value'=>$value]
								)->label(false)
							?>
							</div>
							<p style="margin-top:-30px;margin-left:330px">
								<!--?= Html::a('<i class="ico-plus"></i> Jabatan', ['ttd', 'id'=>$data2['id_ttd'],'update'=>$model2['id_kwitansi'] ], ['class' => '']) ?-->
							</p>
						</div>
						<div style="height:130px"></div>
						<div style="">
							<b>
								<p style="font-size:17px;font-family:'Times New Roman', Times, serif;">
								<?php
									$pegawai= (new \yii\db\Query());
									$pegawai->select(['*']) 
									->from('pegawai')
									->where(['id_pegawai' => $model['pegawai3']]);
									$command = $pegawai->createCommand();
									$pegawai = $command->queryOne();
									
									$value='';
									if($model->isNewRecord)
									{
										$value=$data2['id_pegawai'];
									}else{
										$value=$model['pegawai3'];
									}
								?>
									<div class="row" style="margin:0px">
										<div class="col-md-7" style="margin:0px">
										<?=
											$form->field($model, 'pegawai3')->dropDownList(
												ArrayHelper::map(pegawai::find()->all(),'id_pegawai','nama_pegawai'),
												['prompt'=>'Pilih Pegawai', 'class'=>'form-control', 'required'=>'required', 'value'=>$value]
											)->label(false)
										?>
										</div>
									</div>
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
			
		<?php ActiveForm::end(); ?>
		<!--/ Form horizontal layout striped -->
	</div>
</div>




