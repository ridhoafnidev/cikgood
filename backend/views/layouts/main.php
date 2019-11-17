<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\BackAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

BackAsset::register($this);
//$user=Yii::$app->user->identity->username;
$user=Yii::$app->user->identity->username;
// $session = Yii::$app->session;

$level=Yii::$app->user->identity->level_user;
$id=Yii::$app->user->identity->id;
$profil = \common\models\User::find()
->where(['id' => $id])
// ->orderBy('text DESC')
// ->limit(3)
->one();

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	
    <?= Html::csrfMetaTags() ?>
	<meta charset="utf-8">
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">>
    <title><?= Html::encode($this->title) ?></title>
	<meta name="author" content="pampersdry.info">
	<meta name="description" content="Adminre is a clean and flat backend and frontend theme build with twitter bootstrap">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<link rel="shortcut icon" href="<?php echo Yii::$app->getHomeUrl(); ?>favicon.png" type="image/x-icon" />
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--modal-->

<!--modal-->
<!--mulai-->
        <!-- START Template Header -->
        <header id="header" class="navbar" style="margin-top:-20px">
            <!-- START navbar header -->
            <div class="navbar-header">
                <!-- Brand -->
                <a class="navbar-brand" href="javascript:void(0);">
					<span  class="logo-figure"></span>
					<span class="logo-textx" style="color:#fff;"></span>
                </a>
                <!--/ Brand -->
            </div>
            <!--/ END navbar header -->

            <!-- START Toolbar -->
            <div class="navbar-toolbar clearfix">
                <!-- START Left nav -->
                <ul class="nav navbar-nav navbar-left">
                    <!-- Sidebar shrink -->
                    <li class="hidden-xs hidden-sm">
                        <a href="javascript:void(0);" class="sidebar-minimize" data-toggle="minimize" title="Minimize sidebar">
                            <span class="meta">
                                <span class="icon"></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Sidebar shrink -->

                    <!-- Offcanvas left: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                    <li class="navbar-main hidden-lg hidden-md hidden-sm">
                        <a href="javascript:void(0);" data-toggle="sidebar" data-direction="ltr" rel="tooltip" title="Menu sidebar">
                            <span class="meta">
                                <span class="icon"><i class="ico-paragraph-justify3"></i></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Offcanvas left -->
                </ul>
                <!--/ END Left nav -->

                <!-- START navbar form -->
                <div class="navbar-form navbar-left dropdown" id="dropdown-form">
                    <form action="" role="search">
                        <div class="has-icon">
                            <input type="text" class="form-control" placeholder="Search application...">
                            <i class="ico-search form-control-icon"></i>
                        </div>
                    </form>
                </div>
                <!-- START navbar form -->

                <!-- START Right nav -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Profile dropdown -->
                    <li class="dropdown profile">
                        <a href="javascript:void(0);" class="dropdown-toggle dropdown-hover" data-toggle="dropdown">
                            <span class="meta">
                                <span class="avatar">

									<?php
									// $profil=User::model()->find('user=:user',array(':user'=>$user),array('class'=>'media-object img-circle')); 
									if(!empty($profil->foto)) {
										// echo CHtml::image(Yii::app()->request->baseUrl.'/images/no-image.png','Image',array('class'=>'media-object img-circle'));
										echo '<img src="'.Yii::getAlias('@web').'/images/user/'.$profil->foto.'" class="img-circle">';
									}else{
										echo '<img src="'.Yii::getAlias('@web').'/images/user/user.jpg" class="img-circle">';
										// echo CHtml::image(Yii::app()->request->baseUrl.'/images/'.$profil->image,'Image',array('class'=>'media-object img-circle')) ;
									}
									?>
								</span>
                                <span class="text hidden-xs hidden-sm pl5"><?= $user ?></span>
                                <span class="caret"></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            
                           
                            <li><?= Html::a('<span class="icon"><i class="ico-user-plus2"></i></span>Profil Saya ', ['/site/profile']) ?></li>
                            <!--<li><a href="javascript:void(0);"><span class="icon"><i class="ico-cog4"></i></span> Profile Setting</a></li>-->
                            <!---<li><a href="javascript:void(0);"><span class="icon"><i class="ico-question"></i></span> Help</a></li>-->
                            <li class="divider"></li>
                            <li><?= Html::a('<span class="icon"><i class="ico-exit"></i></span>LogOut ', ['/site/logout']) ?></li>
                        </ul>
                    </li>
                    <!-- Profile dropdown -->

                    <!-- Offcanvas right This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                    
                    <!--/ Offcanvas right -->
                </ul>
                <!--/ END Right nav -->
            </div>
            <!--/ END Toolbar -->
        </header>
        <!--/ END Template Header -->

        <!-- START Template Sidebar (Left) -->
        <aside class="sidebar sidebar-left sidebar-menu">
            <!-- START Sidebar Content -->
            <section class="content slimscroll">
                <h5 class="heading">Main Menu</h5>
                <!-- START Template Navigation/Menu -->
                <ul class="topmenu topmenu-responsive" data-toggle="menu">
                    <li class="active">
                       
						<?= Html::a('<span class="figure"><i class="ico-dashboard2"></i></span>&nbsp<span class="text">Dashboard</span>', ['/site/index'],array('class'=>'active')) ?>
                        <!-- START 2nd Level Menu -->
                        
                        <!--/ END 2nd Level Menu -->
                    </li>
                    
                    
					<?php if(($level=='writer')OR($level=='super admin')):?>
					
					<li class=''>
					</li>
					<li class='has_sub'>
						<a href="javascript:void(0);" data-toggle="submenu" data-target="#kwitansi" data-parent=".topmenu">
                            <span class="figure"><i class="ico-grid"></i></span>
                            <span class="text">Data Master</span>
                            <span class="arrow"></span>
                        </a>
						<ul id="kwitansi" class="submenu collapse ">
                           <li class="submenu-header ellipsis">Data Master</li>      
                            <li><?= Html::a('<span class="figure"></span>&nbsp<span class="text">Murid</span>', ['/murid/index']) ?>
                                <li>
							<li>
                            <li>
                            <li>
                            <?= Html::a('<span class="figure"></span>&nbsp<span class="text">Mata Pelajaran</span>', ['/master-matpel/index']) ?>
                            <li>
                            <li>
                            <?= Html::a('<span class="figure"></span>&nbsp<span class="text">Tingkatan</span>', ['/tingkatan/index']) ?>
                            <li>
                                <li>
                            <?= Html::a('<span class="figure"></span>&nbsp<span class="text">Data Mata Pelajaran</span>', ['/data-matpel/index']) ?>
                            <li>
						</ul>
						
					</li>
					
					<li class=''>
						<?= Html::a('<span class="figure"><i class="ico-user"></i></span>&nbsp<span class="text">Data Guru</span>', ['/guru-profil/index']) ?>
					</li>
					
					<li class=''>
						<?= Html::a('<span class="figure"><i class="ico-file"></i></span>&nbsp<span class="text">Data Pemesanan</span>', ['/pemesanan/index']) ?>
					</li>
					
					<li class=''>
						<?= Html::a('<span class="figure"><i class="ico-reorder"></i></span>&nbsp<span class="text">Histori Pemesanan</span>', ['/pesanan-histori/index']) ?>
					</li>
                    <li class=''>
						<?= Html::a('<span class="figure"><i class="ico-money"></i></span>&nbsp<span class="text">Pembayaran</span>', ['/pembayaran/index']) ?>
					</li>
					<li class=''>
						<?= Html::a('<span class="figure"><i class="ico-book3"></i></span>&nbsp<span class="text">Histori Pembayaran</span>', ['/pembayaran/histori']) ?>
					</li>
					<li class='has_sub'>
						<a href="javascript:void(0);" data-toggle="submenu" data-target="#keuangan" data-parent=".topmenu">
                            <span class="figure"><i class="ico-coins"></i></span>
                            <span class="text">Keuangan</span>
                            <span class="arrow"></span>
                        </a>
						<ul id="keuangan" class="submenu collapse ">
                           <li class="submenu-header ellipsis">Keuangan</li>      
                            <li>
                                <?= Html::a('<span class="figure"></span>&nbsp<span class="text">Murid</span>', ['/keuangan/murid']) ?>
                            <li>
							<li>
                            <li>
                            <li>
                            <?= Html::a('<span class="figure"></span>&nbsp<span class="text">Guru</span>', ['/keuangan/guru']) ?>
                            <li>
						</ul>
						
					</li>
					<li class=''>
						<?= Html::a('<span class="figure"><i class="ico-users"></i></span>&nbsp<span class="text">Review Pengguna</span>', ['/review/index']) ?>
					</li>
					<li class=''>
						<?= Html::a('<span class="figure"><i class="ico-signout"></i></span>&nbsp<span class="text">Logout</span>', ['/site/logout']) ?>
					</li>
					<?php elseif($level=='user'):?>
					<li class=''>
						<?= Html::a('<span class="figure"><i class="ico-globe"></i></span>&nbsp<span class="text">Comment</span>', ['#/comment/index']) ?>
					</li>
					<?php endif;?>
                    
                    <?php if($level=='super admin'):?>
                    <li class=''>
                        <?= Html::a('<span class="figure"><i class="ico-globe"></i></span>&nbsp<span class="text">User</span>', ['/user/index']) ?>
                    </li>
                    <?php endif;?>
                </ul>
            </section>
        </aside>
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid" style="min-height:224px;">
				<div class="row" style="margin:0px 10px 5px 10px">
					<?= Breadcrumbs::widget([
					'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					]) ?>
					<?= Alert::widget() ?>
					<!-- Page Header -->
					<?= $content ?>
                
				</div>
            </div>
            <!--/ END Template Container -->

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->
        </section>
 <?php
	yii\bootstrap\Modal::begin([
	'headerOptions' => ['id' => 'modalHeader'],
	'id' => 'modal',
	'size' => 'modal-lg',
	'clientOptions' => ['backdrop' => 'static', 'keyboard' => true]
	]);
	echo "<div id='modalContent'></div>";
	yii\bootstrap\Modal::end();
?>  
<!--akhir-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
