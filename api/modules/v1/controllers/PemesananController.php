<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\Pemesanan;
use yii\rest\Controller;
use yii\web\Response;


class PemesananController extends Controller
{
    /**
     * Fucntion to create data Order
     */

    public function actionCreate(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response 					= null;
// 		$date = date('Y-m-d HH.mm.ss');
		if (Yii::$app->request->isPost){
			$data 					    = Yii::$app->request->post();
			$pemesanan 				    = new Pemesanan();
			$pemesanan->guru_id 		= $data['guru_id'];
			$pemesanan->murid_id 		= $data['murid_id'];
			$pemesanan->matpel 			= $data['matpel'];
			$pemesanan->jumlah_pertemuan= $data['jumlah_pertemuan'];
			$pemesanan->durasi          = $data['durasi'];
			$pemesanan->alamat          = $data['alamat'];
			$pemesanan->lat             = $data['lat'];
            $pemesanan->lng             = $data['lng'];           
			$pemesanan->jadwal          = $data['jadwal'];
			$pemesanan->pesan_tambahan  = $data['pesan_tambahan'];
// 			$pemesanan->tgl_pemesanan 	= $date;
			$pemesanan->harga           = $data['harga'];
			$pemesanan->harga_total     = $data['harga_total'];
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

	// jad

}
