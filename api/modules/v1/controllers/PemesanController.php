<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\Pemesanan;
use common\models\GuruProfil;
use common\models\Review;
use yii\rest\Controller;
use yii\web\Response;


class PemesanController extends Controller
{
    public function actionFindPemesananLokasiMurid($id){
			Yii::$app->response->format = Response::FORMAT_JSON;
	
			$response = null;
			$status = "Disetujui";
	
			if (Yii::$app->request->isGet){
				$pemesanan= (new \yii\db\Query())
				->select(['pemesanan.lat', 'pemesanan.lng' , 'pemesanan.murid_id', 'pemesanan.alamat', 'pemesanan.*', 'murid.id', 'murid.nama', 'guru_profil.id_guru'])
				->from('pemesanan')
				->leftjoin('murid','murid.id = pemesanan.murid_id')
				->leftjoin('guru_profil','guru_profil.id_guru = pemesanan.guru_id')
				// ->leftjoin('tingkatan','tingkatan.id = data_matpel.tingkatan')
				->where('status_pemesanan = " '.$status.' " ')
				->all();

				$response['master'] = $pemesanan;
			}
	
			return $response;
			}
    
      public function actionFindPemesananGuru($id){
			Yii::$app->response->format = Response::FORMAT_JSON;
	
			$response = null;
			$status = "Diproses";
	
			if (Yii::$app->request->isGet){
				$pemesanan= (new \yii\db\Query())
				->select(['pemesanan.*','murid.*', 'guru_profil.*'])
				->from('pemesanan')
				->leftjoin('murid','murid.id = pemesanan.murid_id')
				->leftjoin('guru_profil','guru_profil.id_guru = pemesanan.guru_id')
				// ->leftjoin('tingkatan','tingkatan.id = data_matpel.tingkatan')
				->where('guru_id = "'.$id.'" && guru_id="'.$id.'"')
				->all();

				$response['master'] = $pemesanan;
			}
	
			return $response;
			}

    /**
     * Fungsi untuk melihat history pemesanan
     */
    public function actionFindPemesanan($id){
			Yii::$app->response->format = Response::FORMAT_JSON;
	
			$response = null;
			$status = "Diproses";
	
			if (Yii::$app->request->isGet){
				$pemesanan= (new \yii\db\Query())
				->select(['pemesanan.*','murid.*', 'guru_profil.*'])
				->from('pemesanan')
				->leftjoin('murid','murid.id = pemesanan.murid_id')
				->leftjoin('guru_profil','guru_profil.id_guru = pemesanan.guru_id')
				->where(' status_pemesanan = "'.$status.'" || status_pemesanan = "Batal" || status_pemesanan = "Tidak Disetujui" && murid_id = "'.$id.'" ')
				->all();

				$response['master'] = $pemesanan;
			}
	
			return $response;
			}
			
			 public function actionFindPemesananSetujui($id){
			Yii::$app->response->format = Response::FORMAT_JSON;
	
			$response = null;
			$status = "Disetujui";
	
			if (Yii::$app->request->isGet){
				$pemesanan= (new \yii\db\Query())
				->select(['pemesanan.*','murid.*', 'guru_profil.*'])
				->from('pemesanan')
				->leftjoin('murid','murid.id = pemesanan.murid_id')
				->leftjoin('guru_profil','guru_profil.id_guru = pemesanan.guru_id')
				// ->leftjoin('tingkatan','tingkatan.id = data_matpel.tingkatan')
				->where(' status_pemesanan = "'.$status.'" && murid_id = "'.$id.'" ')
				->all();

				$response['master'] = $pemesanan;
			}
	
			return $response;
			}
			
    public function actionFindPemesananSelesai($id){
			Yii::$app->response->format = Response::FORMAT_JSON;
	
			$response = null;
			$status = "Selesai";
	
			if (Yii::$app->request->isGet){
				$pemesanan= (new \yii\db\Query())
				->select(['pemesanan.*','murid.*', 'guru_profil.*'])
				->from('pemesanan')
				->leftjoin('murid','murid.id = pemesanan.murid_id')
				->leftjoin('guru_profil','guru_profil.id_guru = pemesanan.guru_id')
				->where(' status_pemesanan = "'.$status.'" && murid_id = "'.$id.'" ')
				->all();

				$response['master'] = $pemesanan;
			}
	
			return $response;
			}
			
			public function actionSaldoGuru($id){
			Yii::$app->response->format = Response::FORMAT_JSON;
	
			$response = null;
			$status = "Selesai";
	
			if (Yii::$app->request->isGet){
				$pemesanan= (new \yii\db\Query())
				->select('SUM(pemesanan.harga_total) as total_harga')
				->from('pemesanan')
				->leftjoin('guru_profil','guru_profil.id_guru = pemesanan.guru_id')
				->where(' status_pemesanan = "'.$status.'" && guru_id = "'.$id.'" ')
				->one();

				$response['master'] = $pemesanan;
			}
	
			return $response;
			}

			/**
     * Fungsi untuk melihat history pemesanan
     */

    public function actionFindPemesananHistory($id){
			Yii::$app->response->format = Response::FORMAT_JSON;
	
			$response = null;
			$status = "Disetujui";
	
			if (Yii::$app->request->isGet){
				$pemesanan= (new \yii\db\Query())
				->select(['pemesanan.*','murid.*', 'guru_profil.*'])
				->from('pemesanan')
				->leftjoin('murid','murid.id = pemesanan.murid_id')
				->leftjoin('guru_profil','guru_profil.id_guru = pemesanan.guru_id')
				// ->leftjoin('tingkatan','tingkatan.id = data_matpel.tingkatan')
				->where(' status_pemesanan = "'.$status.'" && murid_id = "'.$id.'" ')
				->all();

				$response['master'] = $pemesanan;
			}
	
			return $response;
			}
			
			public function actionFindPemesananHistoryGuru($id){
			Yii::$app->response->format = Response::FORMAT_JSON;
	
			$response = null;
			$status = "Disetujui";
	
			if (Yii::$app->request->isGet){
				$pemesanan= (new \yii\db\Query())
				->select(['pemesanan.*','murid.*', 'guru_profil.*'])
				->from('pemesanan')
				->leftjoin('murid','murid.id = pemesanan.murid_id')
				->leftjoin('guru_profil','guru_profil.id_guru = pemesanan.guru_id')
				// ->leftjoin('tingkatan','tingkatan.id = data_matpel.tingkatan')
				->where(' status_pemesanan = "'.$status.'" && guru_id = "'.$id.'" ')
				->all();

				$response['master'] = $pemesanan;
			}
	
			return $response;
			}
				
					// function to show guru ordered

			public function actionFindKomentar($id){
				Yii::$app->response->format = Response::FORMAT_JSON;
		
				$response = null;
		
				if (Yii::$app->request->isGet){
					$komentar= (new \yii\db\Query())
					->select(['pemesanan.*','murid.nama', 'guru_profil.*'])
					->from('pemesanan')
					->leftjoin('murid','murid.id = pemesanan.murid_id')
					->leftjoin('guru_profil','guru_profil.id_guru = pemesanan.guru_id')
					->where(' guru_id = "'.$id.'" ')
					->all();
	
					$response['master'] = $komentar;
				}
		
				return $response;
				}

    /**
     * Fungsi untuk melihat semua kantor
     */
    public function actionFindAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$murid = Pemesanan::find()->all();
			
			$response['master'] = $murid;
		}

		return $response;
    }

	  public function actionRating(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response 					= null;

		if (Yii::$app->request->isPost){
			
			$data 					= Yii::$app->request->post();
			
			$model_pemesanan 		= new Review();
			
			$model_pemesanan->pemesanan_id   = $data['pemesanan_id'];
			$model_pemesanan->rating 	     = $data['rating'];
			$model_pemesanan->isi            = $data['isi'];

			if ($model_pemesanan->save()){
				$response['code'] 	= 200;
				$response['message']= " Berhasil.";
			} else {
				$response['code'] 	= 500;
				$response['message']= "Gagal.";
			}
		}

		return $response;
	}
	
	public function actionSaveRating(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response 					= null;

		if (Yii::$app->request->isPost){
			
			$data 			= Yii::$app->request->post();
			
			$pemesanan_id   = $data['pemesanan_id'];
			$rating         = $data['rating'];
			$isi_rating     = $data['rating_isi'];
			
			$pemesanan_guru = Pemesanan::find()
                      ->where(['id_pemesanan' => $pemesanan_id])
                      ->one();
                      
              if(isset($pemesanan_guru) ){
                  
                  $pemesanan_guru->rating       = $rating;
                  $pemesanan_guru->rating_isi   = $isi_rating;
                  
                  if( $pemesanan_guru->update(false) ){
                    $total_rating = Pemesanan::find()
                                    ->where(['guru_id' => $pemesanan_guru->guru_id])
                                    ->sum('rating');
                                    
                    $jumlah_pemesanan = Pemesanan::find()
                                    ->where(['guru_id' => $pemesanan_guru->guru_id])
                                    ->count();
                                    
                    $jumlah_rating_guru = $total_rating / $jumlah_pemesanan;
                    
                    $guru = GuruProfil::findOne($pemesanan_guru->guru_id);
                    
                    $guru->rating = $jumlah_rating_guru;
                    
                    if($guru->save(false)){
                        $response['message'] = "Rating berhasil disimpan";        
                    }
                    
                        $response['code'] = 1;
                        $response['message'] = $response['message']. "Rating dan Review berhasil ditambah";
                        $response['data'] = $pemesanan_guru;
                  }else{
                      $response['code'] = 0;
                      $response['message'] = "Rating dan Review gagal ditambah";
                      $response['data'] = null;
              }
              }else {
                $response['code'] = 0;
                $response['message'] = "Data tidak ditemukan";
                $response['data'] = null;
              }
			} 

		return $response;
	}
	
	public function actionFindReviews($id){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response 					= null;

		if (Yii::$app->request->isGet){
		    
		    $rating = (new \yii\db\Query())
            		->select(['pemesanan.guru_id','pemesanan.rating', 'pemesanan.rating_isi', 'pemesanan.tgl_pemesanan', 'murid.id', 'murid.nama', 'murid.photo', 'guru_profil.nama_guru'])
            		->from('review')
            		->leftjoin('pemesanan','pemesanan.id_pemesanan = review.pemesanan_id')
            		->leftjoin('guru_profil','guru_profil.id_guru = pemesanan.guru_id')
            		->leftjoin('murid','pemesanan.murid_id = murid.id')
            		->where(' pemesanan.guru_id = "'.$id.'" AND pemesanan.rating > 0')
            		->all();
			
			$response['master'] = $rating;
		}

		return $response;
	}
	
	
	  public function actionBatalkanPemesanan(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response 					= null;
		$status                     = "Batal";

		if (Yii::$app->request->isPost){
			$data 					= Yii::$app->request->post();
			$id_pemesanan			= $data['id_pemesanan'];
			$model_pemesanan 		= Pemesanan::find()
			->where(['id_pemesanan' => $id_pemesanan])
			->one();
			$model_pemesanan->status_pemesanan 	= $status;

			if ($model_pemesanan->save()){
				$response['code'] 	= 200;
				$response['message']= " Berhasil.";
			} else {
				$response['code'] 	= 500;
				$response['message']= "Gagal.";
			}
		}

		return $response;
	}

	public function actionCreate(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response 					= null;
		$date = date('Y-m-d');

		if (Yii::$app->request->isPost){
			$data 							= Yii::$app->request->post();
			$pemesanan 						= new Pemesanan();
			$pemesanan->member_id 			= $data['member_id'];
			$pemesanan->nama_paket 			= $data['nama_paket'];
			$pemesanan->jumlah_pesanan 	    = $data['jumlah_pesanan'];
			$pemesanan->total 		   		= $data['total'];
			$pemesanan->alamat_lengkap 	    = $data['alamat_lengkap'];
			$pemesanan->latitude 			= $data['latitude'];
			$pemesanan->longitude 			= $data['longitude'];
			$pemesanan->tgl_pesanan 		= $date;
			$pemesanan->pesan_tambahan 	    = $data['pesan_tambahan'];

			if ($pemesanan->save()){
				$response['code'] 	= 200;
				$response['message']= " Berhasil.";
			} else {
				$response['code'] 	= 500;
				$response['message']= "Gagal.";
			}
		}

		return $response;
	}
	
	 public function actionUpdateStatusPemesanan(){
    	
		$response                   = null;

		if (Yii::$app->request->isPost){
				$data                       = Yii::$app->request->post();
				$id_pemesanan  				= $data['id_pemesanan'];

				$pemesanan = Pemesanan::find()->where(['id_pemesanan' => $id_pemesanan])->one();

				$pemesanan->id_pemesanan  		    = $id_pemesanan ;
				$pemesanan->status_pemesanan  		= $data['status_pemesanan'];

				if ($pemesanan->save()){
						$response['code']   = 200;
						$response['message']= " Berhasil.";
				} else {
						$response['code']   = 500;
						$response['message']= "Gagal.";
				}
		}

			return $response;
    }
    
    public function actionFindPemesananId($id){
			Yii::$app->response->format = Response::FORMAT_JSON;
	
			$response = null;
	
			if (Yii::$app->request->isGet){
				$pemesanan= (new \yii\db\Query())
				->select(['pemesanan.*','murid.*', 'guru_profil.*'])
				->from('pemesanan')
				->leftjoin('murid','murid.id = pemesanan.murid_id')
				->leftjoin('guru_profil','guru_profil.id_guru = pemesanan.guru_id')
				->where(' id_pemesanan = "'.$id.'" ')
				->one();

				$response['master'] = $pemesanan;
			}
	
			return $response;
			}

}
