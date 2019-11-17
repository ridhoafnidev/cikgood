
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
$level=Yii::$app->user->identity->level_user;

?>
<div class="row">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
				
	<div class="col-md-12">
		<div class="widget">
			<div class="widget-header">
				<h2><strong>User</strong> DataTable</h2>
				<div class="additional-btn">
					<a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
					<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					<a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
				</div>
			</div>
			<div class="widget-content">
			<br>					
				<div class="table-responsive">
					<?php if($level=='super admin'){?>
					<table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>NO</th>
									<th>Username</th>
									<th>E-mail</th>
									<th>Level</th>
									<th>Status</th>
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
									<td><?= $no;?></td>
									<td><?= $db['username'];?></td>
									<td><?= $db['email'];?></td>
									<td><?= $db['level_user'];?></td>
									<td><?= $db['status']=='10'?'Ada Akses':'Tidak Ada Akses';;?></td>
									
									<td>
										<?= Html::a('<i class="icon-pencil-3"></i>', ['/user/update','id'=>$db['id']], ['class' => 'btn btn-info']) ?>
										<?= Html::a('<i class="icon-trash-3"></i>', ['/user/delete','id'=>$db['id']], ['class' => 'btn btn-danger']) ?>
									</td>
								
								</tr>
								<?php $no++;endforeach; ?>
							<tbody>
							
					 
						</table>
					<?php }else{echo'<h1><b>anda tidak punya akses</b></h1>';}?>

				</div>
			</div>
		</div>
	</div>
</div>

