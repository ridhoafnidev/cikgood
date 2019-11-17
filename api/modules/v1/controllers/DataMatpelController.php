<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\DataMatpel;
use common\models\GuruBahanAjarMatpel;
use common\models\Guru;
use common\models\Murid;
use yii\rest\Controller;
use yii\web\Response;


class DataMatpelController extends Controller
{
    /**
     * Fungsi untuk melihat semua kantor
     */
    public function actionFindAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$master_matpel = DataMatpel::find()
			->groupBy('matpel')
			->all();
			
			$response['master'] = $master_matpel;
		}

		return $response;
    }

     public function actionFindById($id){
    	
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
            $data_matpel = DataMatpel::find()
                        ->where(['matpel' => $id])
                        ->all();
			
			$response['master'] = $data_matpel;
		}

		return $response;
    }

        public function actionFindByIdTingkatan($id){
    	
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
            $data_matpel = DataMatpel::find()
                        ->where(['tingkatan' => $id])
                        ->all();
			
			$response['master'] = $data_matpel;
		}

		return $response;
    }

    // mencari join table bahan_ajar_guru dengan data_matpel 
    // untuk mendapatkan detail_matpel
    public function actionFind($id){
    	
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
    	$data_matpel= (new \yii\db\Query())
        ->select(['guru_bahan_ajar_matpel.*','data_matpel.matpel_detail'])
        ->from('guru_bahan_ajar_matpel')
        ->leftjoin('data_matpel','guru_bahan_ajar_matpel.matpel_id = data_matpel.id_matpel')
        ->where('guru_id = "'.$id.'" ')
        ->all();
			
			$response['master'] = $data_matpel;
		}

		return $response;
    }

    // function to searcing teacher with (tingkatan, matpel and kota)  
    public function actionCariGuru($id, $tingkatan, $matpel, $kota){
    	
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
		    
		 $murid = Murid::find()
                  ->where(['id' => $id])
                  ->one();
                      
        $kotas = "'$kota'";
	   
        $sql = "SELECT guru_bahan_ajar_matpel.*, guru_profil.alamat_domisili, guru_riwayat_pendidikan.jurusan, guru_profil.lat, guru_profil.biodata, guru_profil.lng, guru_profil.photo_profile, guru_profil.rating, guru_profil.nama_guru, guru_profil.token, guru_profil.photo_profile, 
            guru_profil.email, guru_profil.no_hp, data_matpel.*, (((acos(sin(('$murid->lat'*pi()/180))
                * sin((`lat`*pi()/180))+cos(('$murid->lat'*pi()/180))
                * cos((`lat`*pi()/180)) * cos((('$murid->lng'-`lng`)
                * pi()/180))))*180/pi())*60*1.1515*1.609344)
                as jarak 
            FROM guru_bahan_ajar_matpel
            INNER JOIN data_matpel ON data_matpel.id_matpel = guru_bahan_ajar_matpel.matpel_id 
            INNER JOIN tingkatan ON tingkatan.id = data_matpel.tingkatan 
            INNER JOIN guru_profil ON guru_profil.id_guru = guru_bahan_ajar_matpel.guru_id 
            INNER JOIN guru_bahan_ajar_lokasi ON guru_bahan_ajar_lokasi.guru_id = guru_bahan_ajar_matpel.guru_id 
            INNER JOIN guru_riwayat_pendidikan ON guru_riwayat_pendidikan.guru_id = guru_bahan_ajar_matpel.guru_id
            WHERE data_matpel.tingkatan = $tingkatan AND data_matpel.matpel = $matpel AND guru_bahan_ajar_lokasi.kota = $kotas 
            GROUP BY guru_id
            ORDER BY guru_profil.nama_guru ASC";
    		
    		$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
    }
    
    
    // function to searcing teacher with (tingkatan, matpel and kota)  
    public function actionCariGuruNama($id, $tingkatan, $matpel, $kota, $nama){
    	
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
		    
		 $murid = Murid::find()
                  ->where(['id' => $id])
                  ->one();
                      
        $kotas = "'$kota'";
	   
        $sql = "SELECT guru_bahan_ajar_matpel.*, guru_profil.alamat_domisili, guru_riwayat_pendidikan.jurusan, guru_profil.lat, guru_profil.biodata, guru_profil.lng, guru_profil.photo_profile, guru_profil.rating, guru_profil.nama_guru, guru_profil.token, guru_profil.photo_profile, 
            guru_profil.email, guru_profil.no_hp, data_matpel.*, (((acos(sin(('$murid->lat'*pi()/180))
                * sin((`lat`*pi()/180))+cos(('$murid->lat'*pi()/180))
                * cos((`lat`*pi()/180)) * cos((('$murid->lng'-`lng`)
                * pi()/180))))*180/pi())*60*1.1515*1.609344)
                as jarak 
            FROM guru_bahan_ajar_matpel
            INNER JOIN data_matpel ON data_matpel.id_matpel = guru_bahan_ajar_matpel.matpel_id 
            INNER JOIN tingkatan ON tingkatan.id = data_matpel.tingkatan 
            INNER JOIN guru_profil ON guru_profil.id_guru = guru_bahan_ajar_matpel.guru_id 
            INNER JOIN guru_bahan_ajar_lokasi ON guru_bahan_ajar_lokasi.guru_id = guru_bahan_ajar_matpel.guru_id 
            INNER JOIN guru_riwayat_pendidikan ON guru_riwayat_pendidikan.guru_id = guru_bahan_ajar_matpel.guru_id
            WHERE data_matpel.tingkatan = $tingkatan AND data_matpel.matpel = $matpel AND guru_bahan_ajar_lokasi.kota = $kotas AND guru_profil.nama_guru LIKE '%$nama%'
            GROUP BY guru_id
            ORDER BY guru_profil.nama_guru ASC";
    		
    		$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
    }
    
    // function to searcing teacher with (tingkatan, matpel and kota)  
    public function actionCariGuruJarak($id, $tingkatan, $matpel, $kota){
    	
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
		  
		    $murid = Murid::find()
                      ->where(['id' => $id])
                      ->one();
                      
            $kotas = "'$kota'";
            
            $sql = "SELECT guru_bahan_ajar_matpel.*, guru_profil.alamat_domisili, guru_riwayat_pendidikan.jurusan, guru_profil.lat, guru_profil.biodata, guru_profil.lng, guru_profil.rating, guru_profil.nama_guru, guru_profil.token, guru_profil.photo_profile, 
            guru_profil.email, guru_profil.no_hp, data_matpel.*, (((acos(sin(('$murid->lat'*pi()/180))
                * sin((`lat`*pi()/180))+cos(('$murid->lat'*pi()/180))
                * cos((`lat`*pi()/180)) * cos((('$murid->lng'-`lng`)
                * pi()/180))))*180/pi())*60*1.1515*1.609344)
                as jarak 
            FROM guru_bahan_ajar_matpel
            INNER JOIN data_matpel ON data_matpel.id_matpel = guru_bahan_ajar_matpel.matpel_id 
            INNER JOIN tingkatan ON tingkatan.id = data_matpel.tingkatan 
            INNER JOIN guru_profil ON guru_profil.id_guru = guru_bahan_ajar_matpel.guru_id 
            INNER JOIN guru_bahan_ajar_lokasi ON guru_bahan_ajar_lokasi.guru_id = guru_bahan_ajar_matpel.guru_id 
            INNER JOIN guru_riwayat_pendidikan ON guru_riwayat_pendidikan.guru_id = guru_bahan_ajar_matpel.guru_id
            WHERE data_matpel.tingkatan = $tingkatan AND data_matpel.matpel = $matpel AND guru_bahan_ajar_lokasi.kota = $kotas 
            GROUP BY guru_id
            ORDER BY jarak ASC";
	                
	        $response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
	        
		}
		return $response;
    }
    
    // function to searcing teacher with (tingkatan, matpel and kota)  
    public function actionCariGuruCustom($id, $tingkatan, $matpel, $kota, $tarif1, $tarif2, $jk, $hari){
    	
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
		    
		$murid = Murid::find()
                      ->where(['id' => $id])
                      ->one();
                      
            $kotas  = "'$kota'";
            $jks    = "'$jk'";
            $haris  = "'$hari'";
			
    // 	$data_matpel= (new \yii\db\Query())
	   //     ->select(['guru_bahan_ajar_matpel.*','data_matpel.*', 'tingkatan.id', 'guru_profil.*', 'guru_bahan_ajar_lokasi.*', 'guru_riwayat_pendidikan.*', 'guru_jadwal.*'])
	   //     ->from('guru_bahan_ajar_matpel')
	   //     ->leftjoin('data_matpel','guru_bahan_ajar_matpel.matpel_id = data_matpel.id_matpel')
	   //     ->leftjoin('tingkatan','tingkatan.id = data_matpel.tingkatan')
	   //     ->leftjoin('guru_profil','guru_profil.id_guru = guru_bahan_ajar_matpel.guru_id')
	   //     ->leftjoin('guru_jadwal','guru_profil.id_guru = guru_jadwal.guru_id')
	   //     ->leftjoin('guru_bahan_ajar_lokasi','guru_bahan_ajar_lokasi.guru_id = guru_bahan_ajar_matpel.guru_id')
	   //     ->leftjoin('guru_riwayat_pendidikan','guru_riwayat_pendidikan.guru_id = guru_bahan_ajar_matpel.guru_id')
	   //     ->where('data_matpel.tingkatan = "'.$tingkatan.'" AND data_matpel.matpel = "'.$matpel.'" AND guru_bahan_ajar_lokasi.kota = "'.$kota.'" AND guru_bahan_ajar_matpel.tarif BETWEEN "'.$tarif1.'" AND "'.$tarif2.'" AND guru_profil.jk = "'.$jk.'" AND guru_jadwal.hari = "'.$hari.'" ')
	   //     ->groupBy('id_guru_bahan_ajar_matpel')
	   //     ->orderBy('guru_profil.nama_guru ASC')
	   //     ->all();
	   
	        $sql = "SELECT guru_bahan_ajar_matpel.*, guru_profil.alamat_domisili, guru_riwayat_pendidikan.jurusan, guru_profil.lat, guru_profil.biodata, guru_profil.lng, guru_profil.photo_profile, guru_profil.rating, guru_profil.nama_guru, guru_profil.token, guru_profil.photo_profile, 
            guru_profil.email, guru_profil.no_hp, data_matpel.*, (((acos(sin(('$murid->lat'*pi()/180))
                * sin((`lat`*pi()/180))+cos(('$murid->lat'*pi()/180))
                * cos((`lat`*pi()/180)) * cos((('$murid->lng'-`lng`)
                * pi()/180))))*180/pi())*60*1.1515*1.609344)
                as jarak 
            FROM guru_bahan_ajar_matpel
            INNER JOIN data_matpel ON data_matpel.id_matpel = guru_bahan_ajar_matpel.matpel_id 
            INNER JOIN tingkatan ON tingkatan.id = data_matpel.tingkatan 
            INNER JOIN guru_profil ON guru_profil.id_guru = guru_bahan_ajar_matpel.guru_id 
            INNER JOIN guru_bahan_ajar_lokasi ON guru_bahan_ajar_lokasi.guru_id = guru_bahan_ajar_matpel.guru_id 
            INNER JOIN guru_riwayat_pendidikan ON guru_riwayat_pendidikan.guru_id = guru_bahan_ajar_matpel.guru_id
            INNER JOIN guru_jadwal ON guru_jadwal.guru_id = guru_profil.id_guru
            WHERE data_matpel.tingkatan = $tingkatan AND data_matpel.matpel = $matpel AND guru_bahan_ajar_lokasi.kota = $kotas AND guru_bahan_ajar_matpel.tarif BETWEEN $tarif1 AND $tarif2 AND guru_profil.jk = $jks AND guru_jadwal.hari = $haris
            GROUP BY guru_id
            ORDER BY guru_profil.nama_guru ASC";
			
			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
    }
    
    // function to searcing teacher with (tingkatan, matpel and kota)  
    public function actionCariGuruCustomRatings($id, $tingkatan, $matpel, $kota, $tarif1, $tarif2, $jk, $hari){
    	
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
//     	$data_matpel= (new \yii\db\Query())
// 	        ->select(['guru_bahan_ajar_matpel.*','data_matpel.*', 'tingkatan.id', 'guru_profil.*', 'guru_bahan_ajar_lokasi.*', 'guru_riwayat_pendidikan.*', 'guru_jadwal.*'])
// 	        ->from('guru_bahan_ajar_matpel')
// 	        ->leftjoin('data_matpel','guru_bahan_ajar_matpel.matpel_id = data_matpel.id_matpel')
// 	        ->leftjoin('tingkatan','tingkatan.id = data_matpel.tingkatan')
// 	        ->leftjoin('guru_profil','guru_profil.id_guru = guru_bahan_ajar_matpel.guru_id')
// 	        ->leftjoin('guru_jadwal','guru_profil.id_guru = guru_jadwal.guru_id')
// 	        ->leftjoin('guru_bahan_ajar_lokasi','guru_bahan_ajar_lokasi.guru_id = guru_bahan_ajar_matpel.guru_id')
// 	        ->leftjoin('guru_riwayat_pendidikan','guru_riwayat_pendidikan.guru_id = guru_bahan_ajar_matpel.guru_id')
// 	        ->where('data_matpel.tingkatan = "'.$tingkatan.'" AND data_matpel.matpel = "'.$matpel.'" AND guru_bahan_ajar_lokasi.kota = "'.$kota.'" AND guru_bahan_ajar_matpel.tarif BETWEEN "'.$tarif1.'" AND "'.$tarif2.'" AND guru_profil.jk = "'.$jk.'" AND guru_jadwal.hari = "'.$hari.'" ')
// 	        ->groupBy('id_guru_bahan_ajar_matpel')
// 	        ->orderBy('guru_profil.rating DESC')
// 	        ->all();
			
// 			$response['master'] = $data_matpel;

        $murid = Murid::find()
                      ->where(['id' => $id])
                      ->one();
                      
        $kotas  = "'$kota'";
        $jks    = "'$jk'";
        $haris  = "'$hari'";
			
		$sql = "SELECT guru_bahan_ajar_matpel.*, guru_profil.alamat_domisili, guru_riwayat_pendidikan.jurusan, guru_profil.lat, guru_profil.biodata, guru_profil.lng, guru_profil.photo_profile, guru_profil.rating, guru_profil.nama_guru, guru_profil.token, guru_profil.photo_profile, 
            guru_profil.email, guru_profil.no_hp, data_matpel.*, (((acos(sin(('$murid->lat'*pi()/180))
                * sin((`lat`*pi()/180))+cos(('$murid->lat'*pi()/180))
                * cos((`lat`*pi()/180)) * cos((('$murid->lng'-`lng`)
                * pi()/180))))*180/pi())*60*1.1515*1.609344)
                as jarak 
            FROM guru_bahan_ajar_matpel
            INNER JOIN data_matpel ON data_matpel.id_matpel = guru_bahan_ajar_matpel.matpel_id 
            INNER JOIN tingkatan ON tingkatan.id = data_matpel.tingkatan 
            INNER JOIN guru_profil ON guru_profil.id_guru = guru_bahan_ajar_matpel.guru_id 
            INNER JOIN guru_bahan_ajar_lokasi ON guru_bahan_ajar_lokasi.guru_id = guru_bahan_ajar_matpel.guru_id 
            INNER JOIN guru_riwayat_pendidikan ON guru_riwayat_pendidikan.guru_id = guru_bahan_ajar_matpel.guru_id
            INNER JOIN guru_jadwal ON guru_jadwal.guru_id = guru_profil.id_guru
            WHERE data_matpel.tingkatan = $tingkatan AND data_matpel.matpel = $matpel AND guru_bahan_ajar_lokasi.kota = $kotas AND guru_bahan_ajar_matpel.tarif BETWEEN $tarif1 AND $tarif2 AND guru_profil.jk = $jks AND guru_jadwal.hari = $haris
            GROUP BY guru_id
            ORDER BY guru_profil.rating DESC";
			
			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
			
		}

		return $response;
    }
    
    // function to searcing teacher with (tingkatan, matpel and kota)  
    public function actionCariGuruCustomJarak($id, $tingkatan, $matpel, $kota, $tarif1, $tarif2, $jk, $hari){
    	
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
//     	$data_matpel= (new \yii\db\Query())
// 	        ->select(['guru_bahan_ajar_matpel.*','data_matpel.*', 'tingkatan.id', 'guru_profil.*', 'guru_bahan_ajar_lokasi.*', 'guru_riwayat_pendidikan.*', 'guru_jadwal.*'])
// 	        ->from('guru_bahan_ajar_matpel')
// 	        ->leftjoin('data_matpel','guru_bahan_ajar_matpel.matpel_id = data_matpel.id_matpel')
// 	        ->leftjoin('tingkatan','tingkatan.id = data_matpel.tingkatan')
// 	        ->leftjoin('guru_profil','guru_profil.id_guru = guru_bahan_ajar_matpel.guru_id')
// 	        ->leftjoin('guru_jadwal','guru_profil.id_guru = guru_jadwal.guru_id')
// 	        ->leftjoin('guru_bahan_ajar_lokasi','guru_bahan_ajar_lokasi.guru_id = guru_bahan_ajar_matpel.guru_id')
// 	        ->leftjoin('guru_riwayat_pendidikan','guru_riwayat_pendidikan.guru_id = guru_bahan_ajar_matpel.guru_id')
// 	        ->where('data_matpel.tingkatan = "'.$tingkatan.'" AND data_matpel.matpel = "'.$matpel.'" AND guru_bahan_ajar_lokasi.kota = "'.$kota.'" AND guru_bahan_ajar_matpel.tarif BETWEEN "'.$tarif1.'" AND "'.$tarif2.'" AND guru_profil.jk = "'.$jk.'" AND guru_jadwal.hari = "'.$hari.'" ')
// 	        ->groupBy('id_guru_bahan_ajar_matpel')
// 	        ->orderBy('guru_profil.rating DESC')
// 	        ->all();
			
// 			$response['master'] = $data_matpel;

        $murid = Murid::find()
                      ->where(['id' => $id])
                      ->one();
                      
        $kotas  = "'$kota'";
        $jks    = "'$jk'";
        $haris  = "'$hari'";
			
		$sql = "SELECT guru_bahan_ajar_matpel.*, guru_profil.alamat_domisili, guru_riwayat_pendidikan.jurusan, guru_profil.lat, guru_profil.biodata, guru_profil.lng, guru_profil.photo_profile, guru_profil.rating, guru_profil.nama_guru, guru_profil.token, guru_profil.photo_profile, 
            guru_profil.email, guru_profil.no_hp, data_matpel.*, (((acos(sin(('$murid->lat'*pi()/180))
                * sin((`lat`*pi()/180))+cos(('$murid->lat'*pi()/180))
                * cos((`lat`*pi()/180)) * cos((('$murid->lng'-`lng`)
                * pi()/180))))*180/pi())*60*1.1515*1.609344)
                as jarak 
            FROM guru_bahan_ajar_matpel
            INNER JOIN data_matpel ON data_matpel.id_matpel = guru_bahan_ajar_matpel.matpel_id 
            INNER JOIN tingkatan ON tingkatan.id = data_matpel.tingkatan 
            INNER JOIN guru_profil ON guru_profil.id_guru = guru_bahan_ajar_matpel.guru_id 
            INNER JOIN guru_bahan_ajar_lokasi ON guru_bahan_ajar_lokasi.guru_id = guru_bahan_ajar_matpel.guru_id 
            INNER JOIN guru_riwayat_pendidikan ON guru_riwayat_pendidikan.guru_id = guru_bahan_ajar_matpel.guru_id
            INNER JOIN guru_jadwal ON guru_jadwal.guru_id = guru_profil.id_guru
            WHERE data_matpel.tingkatan = $tingkatan AND data_matpel.matpel = $matpel AND guru_bahan_ajar_lokasi.kota = $kotas AND guru_bahan_ajar_matpel.tarif BETWEEN $tarif1 AND $tarif2 AND guru_profil.jk = $jks AND guru_jadwal.hari = $haris
            GROUP BY guru_id
            ORDER BY jarak ASC";
			
			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();   

		}

		return $response;
    }
    
      public function actionCariGuruByRatings($id, $tingkatan, $matpel, $kota){
    	
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
    	 $murid = Murid::find()
                  ->where(['id' => $id])
                  ->one();
                      
        $kotas = "'$kota'";
	   
        $sql = "SELECT guru_bahan_ajar_matpel.*, guru_profil.alamat_domisili, guru_riwayat_pendidikan.jurusan, guru_profil.lat, guru_profil.biodata, guru_profil.lng, guru_profil.photo_profile, guru_profil.rating, guru_profil.nama_guru, guru_profil.token, guru_profil.photo_profile, 
            guru_profil.email, guru_profil.no_hp, data_matpel.*, (((acos(sin(('$murid->lat'*pi()/180))
                * sin((`lat`*pi()/180))+cos(('$murid->lat'*pi()/180))
                * cos((`lat`*pi()/180)) * cos((('$murid->lng'-`lng`)
                * pi()/180))))*180/pi())*60*1.1515*1.609344)
                as jarak 
            FROM guru_bahan_ajar_matpel
            INNER JOIN data_matpel ON data_matpel.id_matpel = guru_bahan_ajar_matpel.matpel_id 
            INNER JOIN tingkatan ON tingkatan.id = data_matpel.tingkatan 
            INNER JOIN guru_profil ON guru_profil.id_guru = guru_bahan_ajar_matpel.guru_id 
            INNER JOIN guru_bahan_ajar_lokasi ON guru_bahan_ajar_lokasi.guru_id = guru_bahan_ajar_matpel.guru_id 
            INNER JOIN guru_riwayat_pendidikan ON guru_riwayat_pendidikan.guru_id = guru_bahan_ajar_matpel.guru_id
            WHERE data_matpel.tingkatan = $tingkatan AND data_matpel.matpel = $matpel AND guru_bahan_ajar_lokasi.kota = $kotas 
            GROUP BY guru_id
            ORDER BY guru_profil.rating DESC";
    		
    		$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
    }

     public function actionFindPengalamanKerja($id){
    	
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
    	$data_matpel= (new \yii\db\Query())
        ->select('*')
        ->from('guru_pengalaman_kerja')
        ->where('guru_id = "'.$id.'" ')
        ->all();
			
			$response['master'] = $data_matpel;
		}

		return $response;
    }

}
