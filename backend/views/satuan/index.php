<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Satuan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row" >


	<div class="col-md-12">
		<p>
			<?= Html::a('Tambah Satuan', ['create'], ['class' => 'btn btn-success']) ?>
		</p>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Satuan</strong> DataTable</h3>
			</div>
			<table class="table table-striped table-bordered" id="zero-configuration">
				<thead>
					<tr>
						<th>NO</th>
						<th>Nama Satuan</th>
						<th>Aksi</th>
						<?php 
							// 'foto',
							// 'create_time:datetime',
							// 'update_time:datetime',
							// 'user_id',
						?>
					</tr>
				</thead>
				<tbody>		
						
						<?php 
						$no=1;foreach($model as $db):
						?>
						
						<tr>
							<td align="center"><?= $no;?></td>
							<td ><?= $db['nama_satuan'];?></td>
							
							<td>
							<?= Html::a('<i class="ico-pencil5"></i>', ['/satuan/update','id'=>$db['id_satuan']], ['class' => 'btn btn-info']) ?>
							<?= Html::a('<i class="ico-trash"></i>', ['/satuan/delete', 'id' => $db['id_satuan']], [
									'class' => 'btn btn-danger',
									'data' => [
										'confirm' => 'anda yakin mau menghapus  "'.$db['nama_satuan'].'"?',
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


