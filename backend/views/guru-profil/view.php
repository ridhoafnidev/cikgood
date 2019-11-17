<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Murid */

$this->title = $model['nama_guru'];
$this->params['breadcrumbs'][] = ['label' => 'Data Guru', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<body>
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#profil" data-toggle="tab">Profile</a></li>
        <li><a href="#identitas" data-toggle="tab">Identitas</a></li>
        <li><a href="#bahan-ajar" data-toggle="tab">Bahan Ajar</a></li>
        <li><a href="#jadwal-mengajar" data-toggle="tab">Jadwal Mengajar</a></li>
        <li><a href="#pengalaman" data-toggle="tab">Pengalaman</a></li>
        <li><a href="#dokumen-penghargaan" data-toggle="tab">Dokumen</a></li>
        <li><a href="#jadwal-pemesanan" data-toggle="tab">Jadwal Pemesanan</a></li>
        
    </ul>
    <div class="tab-content panel">
        
      <div class="tab-pane active" id="profil">
          
          <?php 
             $model_bahan_ajar = (new \yii\db\Query())
                ->select(['guru_profil.*', 'guru_bahan_ajar_matpel.*'])
                ->from('guru_profil')
                ->leftjoin('guru_bahan_ajar_matpel','guru_bahan_ajar_matpel.guru_id = guru_profil.id_guru')
                ->orderBy('guru_profil.id_guru DESC')
                ->all();
          ?>
       <table class="table table-bordered">
            <tbody>
                <tr>
                    <th >ID</th>
                    <th><span class="badge badge-primary">M0<?= $model['id_guru'];?></span></th>
                </tr>
                <tr>
                    <th >Status</th>
                    <th>
                        <div class="form-group">
                            <div class="col-sm-8">
                                        <?= $model['status'];?>
                                        <?php if($model['status'] == "Belum Terverifikasi"){
                                           echo Html::a('<i class="ico-check"></i> Sudah Terverifikasi', ['/guru-profil/update-status-sudah','id'=>$model['id_guru']], ['class' => 'btn btn-primary','data' => [
                                            'confirm' => 'anda yakin?',
                                            'method' => 'post',
                                        ]]); }else{
                                            echo Html::a('<i class="ico-check"></i> Belum Terverifikasi', ['/guru-profil/update-status-belum','id'=>$model['id_guru']], ['class' => 'btn btn-primary','data' => [
                                            'confirm' => 'anda yakin?',
                                            'method' => 'post',
                                        ]]);
                                        
                                        }?>
                                      
                            </div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>Photo</th>
                     <?php if(isset($model['photo_profile'])) { ?>
                         <th colspan="2">
                             <a href="http://arslyn.com/cikgood/backend/web/upload/images/guru/profile/<?php echo $model['photo_profile'];?>" target="blank">
                                <?php echo '<img src="'.Yii::getAlias('@web').'/backend/web/upload/images/guru/profile/'.$model['photo_profile'].'" class="img-circle" width="100px" height="100px">';?></th>
                            </a>
                    <?php }else{ ?>
                         <th> Belum Ada Photo Profile</th>
                    <?php } ?>
                </tr>
                <tr>
                    <th >Nama</th>
                    <th><?= $model['nama_guru'];?></th>
                </tr>
                <tr>
                    <th >NO HP</th>
                    <th><?= $model['no_hp'];?></th>
                </tr>
                <tr>
                    <th >Email</th>
                    <th><?= $model['email'];?></th>
                </tr>
                <tr>
                    <th >Tanggal Lahir</th>
                    <th><?= $model['tgl_lahir'];?></th>
                </tr>
                 <tr>
                    <th >Jenis Kelamin</th>
                    <th><?= $model['jk'];?></th>
                </tr>
                 <tr>
                    <th >Provinsi (KTP)</th>
                    <th><?= $model['provinsi_ktp'];?></th>
                </tr>
                 <tr>
                    <th >Kota (KTP)</th>
                    <th><?= $model['kota_ktp'];?></th>
                </tr>
                 <tr>
                    <th >Kecamatan (KTP)</th>
                    <th><?= $model['kecamatan_ktp'];?></th>
                </tr>
                 <tr>
                    <th >Alamat (KTP)</th>
                    <th><?= $model['alamat_ktp'];?></th>
                </tr>
                 <tr>
                    <th >Provinsi (Domisili)</th>
                    <th><?= $model['provinsi_domisili'];?></th>
                </tr>
                 <tr>
                    <th >Kota (Domisili)</th>
                    <th><?= $model['kota_domisili'];?></th>
                </tr>
                 <tr>
                    <th >Kecamatan (Domisili)</th>
                    <th><?= $model['kecamatan_domisili'];?></th>
                </tr>
                 <tr>
                    <th >Alamat (Domisili)</th>
                    <th><?= $model['alamat_domisili'];?></th>
                </tr>
                 <tr>
                    <th >Biodata</th>
                    <th><?= $model['biodata'];?></th>
                </tr>
                 
            </tbody>
        </table>
      </div>
      <!-- /.tab-pane -->
      
      <div class="tab-pane" id="identitas">
       <table class="table table-bordered">
            <tbody>
                <tr>
                    <th >Nomor KTP</th>
                     <?php if(isset($model['nomor_ktp'])){ ?>
                    
                     <th><?= $model['nomor_ktp'];?></th>
                    
                    <?php }else{ ?>
                    
                     <th>-</th>
                    
                    <?php } ?>
                </tr>
                <tr>
                    <th >Photo KTP</th> 
                        
                         <?php if(isset($model['photo_ktp'])) { ?>
                         <th colspan="2">
                             <a href="http://arslyn.com/cikgood/backend/web/upload/images/guru/identitas/<?php echo $model['photo_ktp'];?>" target="blank">
                                 <?php echo '<img src="'.Yii::getAlias('@web').'/backend/web/upload/images/guru/identitas/'.$model['photo_ktp'].'" class="img-circle" width="100px" height="100px">';?></th>
                            </a>
                         <?php }else{ ?>
                         <th> Belum Ada Photo KTP</th>
                         <?php } ?>
                     </a>
                </tr>
                <tr>
                    <th >NPWP</th>
                     <?php if(isset($model['npwp'])){ ?>
                    
                     <th><?= $model['npwp'];?></th>
                    
                    <?php }else{ ?>
                    
                     <th>-</th>
                    
                    <?php } ?>
                </tr>
                <tr>
                    <th >Photo NPWP</th>
                    <?php if(isset($model['photo_ktp'])) { ?>
                         <th colspan="2">
                             <a href="http://arslyn.com/cikgood/backend/web/upload/images/guru/identitas/<?php echo $model['photo_npwp'];?>" target="blank">
                             <?php echo '<img src="'.Yii::getAlias('@web').'/backend/web/upload/images/guru/identitas/'.$model['photo_npwp'].'" class="img-circle" width="100px" height="100px">';?></th>
                            </a>
                         <?php }else{ ?>
                         <th> Belum Ada Photo NPWP</th>
                         <?php } ?>
                </tr>
                 <tr>
                    <th >Nama Bank</th>
                    <?php if(isset($model['nama_bank'])){ ?>
                    
                     <th><?= $model['nama_bank'];?></th>
                    
                    <?php }else{ ?>
                    
                     <th>-</th>
                    
                    <?php } ?>
                   
                </tr>
                 <tr>
                    <th >Nomor Rekening</th>
                    
                    <?php if(isset($model['nomor_rekening'])){ ?>
                    
                     <th><?= $model['nomor_rekening'];?></th>
                    
                    <?php }else{ ?>
                    
                     <th>-</th>
                    
                    <?php } ?>
                </tr>
                 <tr>
                    <th >Nama Pemilik Rekening</th>
                     <?php if(isset($model['nama_pemilik_rekening'])){ ?>
                    
                     <th><?= $model['nama_pemilik_rekening'];?></th>
                    
                    <?php }else{ ?>
                    
                     <th>-</th>
                    
                    <?php } ?>
                </tr>
                 <tr>
                    <th >Kecamatan (KTP)</th>
                     <?php if(isset($model['kecamatan_ktp'])){ ?>
                    
                     <th><?= $model['kecamatan_ktp'];?></th>
                    
                    <?php }else{ ?>
                    
                     <th>-</th>
                    
                    <?php } ?>
                </tr>
                
            </tbody>
        </table>
      </div>
      <!-- /.tab-pane -->
      
      <!--Bahan ajar mata pelajaran dan lokasi mengajar -->
      <div class="tab-pane" id="bahan-ajar">
        <h4 class="text-primary mt0">Mata Pelajaran</h4>
        <table class="table table-bordered">
		<thead>
			<tr>
				<th>Mata Pelajaran</th>
				<th>Tarif</th>
			</tr>
		</thead>
		
		<?php 
             $model_bahan_ajar = (new \yii\db\Query())
                ->select(['guru_profil.*', 'guru_bahan_ajar_matpel.*', 'data_matpel.*'])
                ->from('guru_profil')
                ->leftjoin('guru_bahan_ajar_matpel','guru_bahan_ajar_matpel.guru_id = guru_profil.id_guru')
                ->leftjoin('data_matpel','data_matpel.id_matpel = guru_bahan_ajar_matpel.matpel_id')
                ->where('guru_id = "'.$model['id_guru'].'"')
                ->orderBy('guru_profil.id_guru DESC')
                ->all();
                
                $no = 1; 
                foreach($model_bahan_ajar as $data_bahan_ajar):
            ?>
            
             <?php if(!empty($model_bahan_ajar)) { ?>
             
             <tbody>		
				<tr>
					<td ><?= $data_bahan_ajar['matpel_detail'];?></td>
					<td >Rp.<?php echo number_format($data_bahan_ajar['tarif']);?></td>
				</tr>
		    </tbody>
             
             <?php }else{ ?>
             
             <tbody>		
				<tr>
					<td>Kosong</td>
					<td>Kosong</td>
				</tr>
		    </tbody>
             
         	 <?php } ?>
         
         	 <?php $no++;endforeach; ?>
		</table>
		
		<!--lokasi-->
		<h4 class="text-primary mt0">Lokasi Mengajar</h4>
        <table class="table table-bordered">
		<thead>
			<tr>
				<th>Provinsi</th>
				<th>Kabupaten/Kota</th>
				<th>Kecamatan</th>
			</tr>
		</thead>
		<tbody>		
				
			<?php 
             $model_bahan_lokasi = (new \yii\db\Query())
                ->select(['guru_profil.*', 'guru_bahan_ajar_lokasi.*'])
                ->from('guru_profil')
                ->leftjoin('guru_bahan_ajar_lokasi','guru_bahan_ajar_lokasi.guru_id = guru_profil.id_guru')
                ->where('guru_id = "'.$model['id_guru'].'"')
                ->orderBy('guru_profil.id_guru DESC')
                ->all();
                
                $no = 1; 
                foreach($model_bahan_lokasi as $data_bahan_ajar_lokasi):
            
            ?>
				
				<tr>
					<td ><?= $data_bahan_ajar_lokasi['provinsi'];?></td>
					<td ><?= $data_bahan_ajar_lokasi['kota'];?></td>
					<td ><?= $data_bahan_ajar_lokasi['kecamatan'];?></td>
				</tr>
				
				<?php $no++;endforeach; ?>
				
		</tbody>
		</table>
        
      </div>
      <!--</ bahan ajar matpel dan lokasi mengajar-->
      
      <!-- Jadwal Mengajar -->
      <div class="tab-pane" id="jadwal-mengajar">
        <h4 class="text-primary mt0">Jadwal Mengajar</h4>
        <table class="table table-bordered">
		<thead>
			<tr>
				<th>Hari</th>
				<th>Waktu dan Jam</th>
			</tr>
		</thead>
		<tbody>		
				
			<?php 
             $model_jadwal_mengajar = (new \yii\db\Query())
                ->select(['guru_profil.*', 'guru_jadwal.*'])
                ->from('guru_profil')
                ->leftjoin('guru_jadwal','guru_jadwal.guru_id = guru_profil.id_guru')
                ->where('guru_id = "'.$model['id_guru'].'"')
                ->orderBy('guru_profil.id_guru DESC')
                ->all();
                
                $no = 1; 
                foreach($model_jadwal_mengajar as $data_jadwal_mengajar):
            
            ?>
				
				<tr>
					<td ><?= $data_jadwal_mengajar['hari'];?></td>
					<td >
						<?php
						  $jam = $data_jadwal_mengajar['jam'];
						  $explode_jam = explode(", ",$jam);
						  foreach($explode_jam as $data_jam):
						    echo $data_jam."<br>"    ;
						  endforeach;
						?>
					</td>
				</tr>
				
				<?php $no++;endforeach; ?>
				
		</tbody>
		</table>
        
      </div>
      <!--Jadwal mengajar-->
      
      <!--Pengalaman Mengajar, Kerja, Riwayat Pendidikan, Dokumen-->
      <div class="tab-pane" id="pengalaman">
        <h4 class="text-primary mt0">Pengalaman Mengajar</h4>
        <table class="table table-bordered">
		<thead>
			<tr>
				<th>Pengalaman Mengajar</th>
				<th>Tanggal Masuk</th>
				<th>Tanggal Keluar</th>
			</tr>
		</thead>
		<tbody>		
				
			<?php 
             $model_pengalaman_mengajar = (new \yii\db\Query())
                ->select(['guru_profil.*', 'guru_pengalaman_mengajar.*'])
                ->from('guru_profil')
                ->leftjoin('guru_pengalaman_mengajar','guru_pengalaman_mengajar.guru_id = guru_profil.id_guru')
                ->where('guru_id = "'.$model['id_guru'].'"')
                ->orderBy('guru_profil.id_guru DESC')
                ->all();
                
                $no = 1; 
                foreach($model_pengalaman_mengajar as $data_pengalaman_mengajar):
            
            ?>
				
				<tr>
					<td ><?= $data_pengalaman_mengajar['pengalaman'];?></td>
					<td ><?php echo $data_pengalaman_mengajar['tgl_masuk'];?></td>
					<td ><?php echo $data_pengalaman_mengajar['tgl_selesai'];?></td>
				</tr>
				
				<?php $no++;endforeach; ?>
				
		</tbody>
		</table>
		
		<!--guru pengalaman kerja-->
		<h4 class="text-primary mt0">Pengalaman Kerja</h4>
        <table class="table table-bordered">
		<thead>
			<tr>
				<th>Pengalaman</th>
				<th>Tempat Kerja</th>
				<th>Tahun Masuk</th>
				<th>Tahun Keluar</th>
			</tr>
		</thead>
		<tbody>		
				
			<?php 
             $model_pengalaman_kerja = (new \yii\db\Query())
                ->select(['guru_profil.*', 'guru_pengalaman_kerja.*'])
                ->from('guru_profil')
                ->leftjoin('guru_pengalaman_kerja','guru_pengalaman_kerja.guru_id = guru_profil.id_guru')
                ->where('guru_id = "'.$model['id_guru'].'"')
                ->orderBy('guru_profil.id_guru DESC')
                ->all();
                
                $no = 1; 
                foreach($model_pengalaman_kerja as $data_pengalaman_kerja):
            
            ?>
				
				<tr>
					<td ><?= $data_pengalaman_kerja['jabatan'];?></td>
					<td ><?= $data_pengalaman_kerja['perusahaan'];?></td>
					<td ><?= $data_pengalaman_kerja['tgl_masuk'];?></td>
					<td ><?= $data_pengalaman_kerja['tgl_selesai'];?></td>
				</tr>
				
				<?php $no++;endforeach; ?>
				
		</tbody>
		</table>
		
		<!--riwayat pendidikan guru-->
		<h4 class="text-primary mt0">Riwayat Pendidikan</h4>
        <table class="table table-bordered">
		<thead>
			<tr>
				<th>Gelar</th>
				<th>Nama Institusi</th>
				<th>Jenis Institusi</th>
				<th>Jurusan</th>
				<th>Tahun Masuk</th>
				<th>Tahun Selesai</th>
			</tr>
		</thead>
		<tbody>		
				
			<?php 
             $model_riwayat_pendidikan = (new \yii\db\Query())
                ->select(['guru_profil.*', 'guru_riwayat_pendidikan.*'])
                ->from('guru_profil')
                ->leftjoin('guru_riwayat_pendidikan','guru_riwayat_pendidikan.guru_id = guru_profil.id_guru')
                ->where('guru_id = "'.$model['id_guru'].'"')
                ->orderBy('guru_profil.id_guru DESC')
                ->all();
                
                $no = 1; 
                foreach($model_riwayat_pendidikan as $data_riwayat_pendidikan):
            
            ?>
				
				<tr>
				    <td ><?= $data_riwayat_pendidikan['gelar'];?></td>
					<td ><?= $data_riwayat_pendidikan['nama_institusi'];?></td>
					<td ><?= $data_riwayat_pendidikan['jenis_institusi'];?></td>
					<td ><?= $data_riwayat_pendidikan['jurusan'];?></td>
					<td ><?= $data_riwayat_pendidikan['tahun_masuk'];?></td>
					<td ><?= $data_riwayat_pendidikan['tahun_selesai'];?></td>
				</tr>
				
				<?php $no++;endforeach; ?>
				
		</tbody>
		</table>
        
      </div>
      
      <!--Dokumen-->
      <div class="tab-pane" id="dokumen-penghargaan">
        <h4 class="text-primary mt0">Dokumen</h4>
        <table class="table table-bordered">
		<thead>
			<tr>
				<th>Jenis Dokumen</th>
				<th>Nama</th>
				<th>Tahun</th>
				<th>Photo</th>
			</tr>
		</thead>
		<tbody>		
				
			<?php 
             $model_dokumen = (new \yii\db\Query())
                ->select(['guru_profil.*', 'guru_dokumen.*'])
                ->from('guru_profil')
                ->leftjoin('guru_dokumen','guru_dokumen.guru_id = guru_profil.id_guru')
                ->where('guru_id = "'.$model['id_guru'].'"')
                ->orderBy('guru_profil.id_guru DESC')
                ->all();
                
                $no = 1; 
                foreach($model_dokumen as $data_dokumen):
            
            ?>
				
				<tr>
					<td ><?= $data_dokumen['jenis_dokumen'];?></td>
					<td ><?php echo $data_dokumen['nama_dokumen'];?></td>
					<td ><?php echo $data_dokumen['tahun'];?></td>
					<td align="center">
					    <a href="http://arslyn.com/cikgood/backend/web/upload/images/guru/dokumen/<?php echo $data_dokumen['photo_dokumen'];?>" target="blank">
					        <?php echo '<img src="'.Yii::getAlias('@web').'/backend/web/upload/images/guru/dokumen/'.$data_dokumen['photo_dokumen'].'" class="img-circle" width="100px" height="100px">';?>
                        </a>
					</td>
				</tr>
				
				<?php $no++;endforeach; ?>
				
		</tbody>
		</table>
      </div>
      <!--Dokumen-->
      
      <!--Jadwal Mengajar-->
      <div class="tab-pane" id="jadwal-pemesanan">
        <h4 class="text-primary mt0">Pemesanan Jadwal</h4>	
				
			<?php 
             $model_pemesanan_jadwal = (new \yii\db\Query())
                ->select(['guru_profil.*', 'pemesanan.*', 'murid.*'])
                ->from('pemesanan')
                ->leftjoin('guru_profil','pemesanan.guru_id = guru_profil.id_guru')
                ->leftjoin('murid','murid.id = pemesanan.murid_id')
                ->where('pemesanan.guru_id = "'.$model['id_guru'].'" AND pemesanan.status_pemesanan="Disetujui"')
                ->orderBy('pemesanan.murid_id DESC')
                ->all();
                
                $no = 1; 
                foreach($model_pemesanan_jadwal as $data_pemesanan_jadwal):
                if(empty($data_pemesanan_jadwal)){
                    echo "Data Kosong";
                }else{
            ?>
            
            
            
             <!-- START row -->
        <div class="row">
            <div class="col-md-12">
                <!-- START panel -->
                <div class="panel panel-default">
                    <!-- panel heading/header -->
                    <div class="panel-heading">
                        <h3 class="panel-title ellipsis"> <span class="label label-primary">Lihat Detail</span></h3>
                        <!-- panel toolbar -->
                        <div class="panel-toolbar text-right">
                            <!-- option -->
                            <div class="option">
                                <button class="btn up" data-toggle="panelcollapse"><i class="arrow"></i></button>
                                <button class="btn" data-toggle="panelremove" data-parent=".col-md-6"><i class="remove"></i></button>
                            </div>
                            <!--/ option -->
                        </div>
                        <!--/ panel toolbar -->
                    </div>
                    <!--/ panel heading/header -->
                    <!-- panel body with collapse capabale -->
                    <div class="panel-collapse pull out">
                        <div class="panel-body">
                            <dl class="dl-horizontal">
                                
                                <dt>ID Pemesanan :</dt>
                                <dd>PMS0<?php echo $data_pemesanan_jadwal['id_pemesanan'];?></dd>
                                
                                <dt>Status Pemesanan :</dt>
                                <dd><?php echo $data_pemesanan_jadwal['status_pemesanan'];?></dd>
                                
                                <dt>Nama Murid :</dt>
                                <dd><?php echo $data_pemesanan_jadwal['nama'];?></dd>
                                
                                <dt>Mata Pelajaran :</dt>
                                <dd><?php echo $data_pemesanan_jadwal['matpel'];?></dd>
                                
                                <dt>Pertemuan :</dt>
                                <dd><?php echo $data_pemesanan_jadwal['jumlah_pertemuan'];?> Kali</dd>
                                
                                <dt>Jadwal :</dt>
                                <dd>
                                <?php
    							  $jadwal = $data_pemesanan_jadwal['jadwal'];
    							  $explode_jadwal2 = str_replace("[","",$jadwal);
    							  $explode_jadwal3 = str_replace("]","",$explode_jadwal2);
    							 
    							
    							  $explode_jadwal = explode("@ ",$explode_jadwal3);
    							  foreach($explode_jadwal as $data_jadwal):
    							    echo $data_jadwal."<br>";
    							  endforeach;
    							  ?>
                                </dd>
                                
                            </dl>
                        </div>
                    </div>
                    <!--/ panel body with collapse capabale -->
                </div>
                <!--/ END panel -->
            </div>
        </div>
        <!--/ END row -->
            	
	  <?php } $no++;endforeach; ?>
	  
      </div>
      <!--Jadwal Mengajar-->
      <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
  </div>
</body>
          
        
