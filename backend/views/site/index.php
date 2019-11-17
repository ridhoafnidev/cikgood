<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Contoh';
?>
<!--1) include file jquery.min.js dan higchart.js-->
<script type="text/javascript" src="<?php echo Yii::$app->getHomeUrl(); ?>js/jquery.min.js"></script>
<script src="<?php echo Yii::$app->getHomeUrl(); ?>js/highcharts.js"></script>

<script type="text/javascript">
//2)script untuk membuat grafik, perhatikan setiap komentar agar paham
	$(function () {
		var chart;
		$(document).ready(function() {
			chart = new Highcharts.Chart({
				chart: {
					renderTo: 'container',
					type: 'column',
					marginRight: 100,
					marginBottom: 50
				},
				title: {
					text: 'Realisasi ',
					x: -20 //center
				},
				subtitle: {
					text: '',
					x: -20
				},
				xAxis: {
					categories: [	
						<?php for($i=1;$i<=5;$i++): ?>
							<?= ''.$i.',' ?>
						<?php endfor; ?>
					]
				},
				yAxis: {
					title: {
						text: 'Pendapatan dalam Rupiah'
					},
					plotLines: [{
						value: 0,
						width: 1,
						color: '#808080'
					}]
				},
				tooltip: {
					formatter: function() {
							return '<b>'+ this.series.name +'</b><br/>'+
							this.x +': '+ this.y ;
					}
				},
				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'top',
					x: -10,
					y: 100,
					borderWidth: 0
				},
				series: [
					{
						name: 'Pagu',
						data: [							
							<?php for($i=1;$i<=5;$i++): ?>
								<?= ''.$i.',' ?>
							<?php endfor; ?>
						]
					},
					{
						name: 'Realisasi',
						data: [							
							<?php for($i=1;$i<=5;$i++): ?>
								<?= ''.$i.',' ?>
							<?php endfor; ?>
						]
					}
				]
			});
		});
		
	});
</script>






<div class="site-index">

    <div class="jumbotronx" align="center">
        <h1>CikGood App</h1>

        <p><?= Html::a('Buat Kwitansi Baru', Yii::$app->getHomeUrl().'kwitansi/index', ['class' => 'btn btn-lg btn-success']) ?></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">				
				<table class="table table-striped table-bordered" id="">
					<thead>
						<tr>
							<th>No</th>
							<th>Akun Belanja</th>
							<th>Persantase Total Realisasi</th>
						</tr>
					</thead>
					<tbody>		
							<tr>
								<td align="center">1</td>
								<td>
									<p class="btn btn-sm btn-primary">123321</p>
									<p class="btn btn-sm btn-default">Kode Belanja</p>
									
									<p><b>Pagu :</b></p>
									<p>Rp. <span class="pull-rightx"><?= number_format('10000000'); ?></span></p>

									<p><b>Total Realisasi :</b></p>
									Rp. <span class="pull-rightx"><?= number_format('1000000'); ?></span>
								</td>
								<td style="background:#ffffff;">
									
									<h2 class="btn btn-lg btn-default"><?= number_format('45',2); ?>%</h2>
<hr>
<script type="text/javascript">
//2)script untuk membuat grafik, perhatikan setiap komentar agar paham
	$(function () {
		var chart;
		$(document).ready(function() {
			chart = new Highcharts.Chart({
				chart: {
					renderTo: 'pie',
					type: 'pie',
					marginRight: 50,
					marginLeft: 50,
					marginBottom: 25
				},
				title: {
					text: '',
					x: -20 //center
				},
				subtitle: {
					text: '',
					x: -20
				},
				xAxis: {
					categories: [
					<?php for($i=1;$i<=5;$i++): ?>
						<?= '"'.$i.'",' ?>
					<?php endfor; ?>
					]
				},
				yAxis: {
					title: {
						text: 'Pendapatan dalam Rupiah'
					},
					plotLines: [{
						value: 0,
						width: 1,
						color: '#808080'
					}]
				},
				tooltip: {
					formatter: function() {
							return '<b>'+ this.series.name +'</b><br/>'+
							this.x +': '+ this.y ;
					}
				},
				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'top',
					x: -10,
					y: 100,
					borderWidth: 0
				},
				
				  series: [{
				    name: 'Brands',
				    colorByPoint: true,
				    data: [{
				      name: '<?= number_format(45,2); ?>',
				      y: <?= number_format(45,2); ?>,

				    },{
				      name: '<?= number_format(100-45,2); ?>',
				      y: <?= number_format(100-45,2); ?>,

				    }]
				  }]

			});
		});
		
	});
</script>
<div id="pie" style="min-width: 110px; height: 100px; max-width: 600px; margin: 0 auto"></div>


								</td>
							</tr>
						
						
					</tbody>
				</table>
            </div>

            <div class="col-lg-6">				

				<!--grafik pie akan ditampilkan disini -->

<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
<script type="text/javascript">

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('f0ab7ef19b8acd56fa8a', {
	cluster: 'ap1',
	forceTLS: true
});

var channel = pusher.subscribe('push-channel');
channel.bind('my-event', function(data) {
	// alert(JSON.stringify(data));
	// toa"//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"str.info(JSON.stringify(data));
	toastr.info(data.message);
});

//2)script untuk membuat grafik, perhatikan setiap komentar agar paham
	$(function () {
		var chart;
		$(document).ready(function() {
			chart = new Highcharts.Chart({
				chart: {
					renderTo: 'piex',
					type: 'pie',
					marginTop: 25,
					marginRight: 100,
					marginLeft: 200,
					marginBottom: 50
				},
				title: {
					text: '',
					x: -20 //center
				},
				subtitle: {
					text: '',
					x: -20
				},
				xAxis: {
					categories: [
					<?php for($i=1;$i<=5;$i++): ?>
						<?= '"'.$i.'",' ?>
					<?php endfor; ?>
					]
				},
				yAxis: {
					title: {
						text: 'Pendapatan dalam Rupiah'
					},
					plotLines: [{
						value: 0,
						width: 1,
						color: '#808080'
					}]
				},
				tooltip: {
					formatter: function() {
							return '<b>'+ this.series.name +'</b><br/>'+
							this.x +': '+ this.y ;
					}
				},
				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'top',
					x: -10,
					y: 100,
					borderWidth: 0
				},
				
				  series: [{
				    name: 'Persentase',
				    colorByPoint: true,
				    data: [
					<?php for($i=1;$i<=5;$i++): ?>


					{
				      		name: '<?= $i; ?>',
				     		 y: <?= number_format( (1)*100,2); ?>,
				    		  sliced: true,
				    		  selected: true
				  	  },
					<?php endfor; ?>
					]
				  }]

			});
		});
		
	});
</script>
<div id="piex" style="min-width: 410px; height: 400px; max-width: 600px; margin: 0 auto"></div>

				<!--grafik akan ditampilkan disini -->
				<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>


            </div>
        </div>

    </div>
</div>
