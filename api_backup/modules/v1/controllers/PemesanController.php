<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\Pemesanan;
use yii\rest\Controller;
use yii\web\Response;


class PemesanController extends Controller
{

    /**
     * Fungsi untuk melihat history pemesanan
     */
    public function actionFindPemesanan($id){
			Yii::$app->response->format = Response::FORMAT_JSON;
	
			$response = null;
			$status = "Diproses";
	
			if (Yii::$app->request->isGet){
				$pemesanan= (new \yii\db\Query())
				->select(['pemesanan.*','murid.nama'])
				->from('pemesanan')
				->leftjoin('murid','murid.id = pemesanan.murid_id')
				// ->leftjoin('tingkatan','tingkatan.id = data_matpel.tingkatan')
				->where(' status_pemesanan = "'.$status.'" && murid_id = "'.$id.'" ')
				->all();

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
				->select(['pemesanan.*','murid.nama'])
				->from('pemesanan')
				->leftjoin('murid','murid.id = pemesanan.murid_id')
				// ->leftjoin('tingkatan','tingkatan.id = data_matpel.tingkatan')
				->where(' status_pemesanan = "'.$status.'" && murid_id = "'.$id.'" ')
				->all();

				$response['master'] = $pemesanan;
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

	  public function actionCreate(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response 					= null;
		$date = date('Y-m-d');

		if (Yii::$app->request->isPost){
			$data 											= Yii::$app->request->post();
			$pemesanan 									= new Pemesanan();
			$pemesanan->member_id 			= $data['member_id'];
			$pemesanan->nama_paket 			= $data['nama_paket'];
			$pemesanan->jumlah_pesanan 	= $data['jumlah_pesanan'];
			$pemesanan->total 		   		= $data['total'];
			$pemesanan->alamat_lengkap 	= $data['alamat_lengkap'];
			$pemesanan->latitude 				= $data['latitude'];
			$pemesanan->longitude 			= $data['longitude'];
			$pemesanan->tgl_pesanan 		= $date;
			$pemesanan->pesan_tambahan 	= $data['pesan_tambahan'];

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

}
