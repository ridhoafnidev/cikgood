<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\DataMatpel;
use common\models\Guru;
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

    // 
    public function actionCariGuru($tingkatan, $matpel, $kota){
    	
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
    	$data_matpel= (new \yii\db\Query())
	        ->select(['guru_bahan_ajar_matpel.*','data_matpel.*', 'tingkatan.id', 'guru_profil.*', 'guru_bahan_ajar_lokasi.*', 'guru_riwayat_pendidikan.*'])
	        ->from('guru_bahan_ajar_matpel')
	        ->leftjoin('data_matpel','guru_bahan_ajar_matpel.matpel_id = data_matpel.id_matpel')
	        ->leftjoin('tingkatan','tingkatan.id = data_matpel.tingkatan')
	        ->leftjoin('guru_profil','guru_profil.id_guru = guru_bahan_ajar_matpel.guru_id')
	        ->leftjoin('guru_bahan_ajar_lokasi','guru_bahan_ajar_lokasi.guru_id = guru_bahan_ajar_matpel.guru_id')
	        ->leftjoin('guru_riwayat_pendidikan','guru_riwayat_pendidikan.guru_id = guru_bahan_ajar_matpel.guru_id')
	        ->where('data_matpel.tingkatan = "'.$tingkatan.'" AND data_matpel.matpel = "'.$matpel.'" AND guru_bahan_ajar_lokasi.kota = "'.$kota.'"')
	        ->groupBy('id_guru_bahan_ajar_matpel')
	        ->all();
			
			$response['master'] = $data_matpel;
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
