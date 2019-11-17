<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\Murid;
use yii\rest\Controller;
use yii\web\Response;


class MuridController extends Controller
{
    /**
     * Fungsi untuk melihat semua kantor
     */
    public function actionFindAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$murid = Murid::find()->all();

			$response['master'] = $murid;
		}	

		return $response;
		}
		
		public function actionUpdatePwd(){
			Yii::$app->response->format = Response::FORMAT_JSON;
	
			$response 	= null;
			// $id_murid = $data['id_laporan'];
	
			if (Yii::$app->request->isPost){
				 // $data = Murid::find()->where(['id' => $id_murid])->one();
				$data 								= Yii::$app->request->post();
				$id_murid 						= $data["id"];
				$pwd 									= $data["password"];
				$murid 	= Murid::find()->where(['id' => $id_murid])->one();	
				$murid->password 			= sha1($pwd);
	
				if ($murid->save()){
					$response['code'] 	= 200;
					$response['message']= " Berhasil Update.";
				} else {
					$response['code'] 	= 500;
					$response['message']= "Gagal Update.";
				}
			}
	
			return $response;
		}

    public function actionUpdate(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response 	= null;
		// $id_murid = $data['id_laporan'];

		if (Yii::$app->request->isPost){
		 	// $data = Murid::find()->where(['id' => $id_murid])->one();
			$data 								= Yii::$app->request->post();
			$id_murid 						= $data["id"];
			$murid 	= Murid::find()->where(['id' => $id_murid])->one();	
			$murid->nama 					= $data['nama'];
			$murid->email 				= $data['email'];
			$murid->no_hp 				= $data['no_hp'];
			$murid->email 				= $data['email'];
			$murid->alamat 				= $data['alamat'];
			$murid->jk 						= $data['jk'];
			$murid->nisn 					= $data['nisn'];
			$murid->kelas 				= $data['kelas'];
			$murid->nama_sekolah 	= $data['nama_sekolah'];
			$murid->photo 				= $data['photo'];

			if ($murid->save()){
				$response['code'] 	= 200;
				$response['message']= " Berhasil Update.";
			} else {
				$response['code'] 	= 500;
				$response['message']= "Gagal Update.";
			}
		}

		return $response;
	}

	  public function actionCreate(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response 					= null;

		if (Yii::$app->request->isPost){
			$data 							= Yii::$app->request->post();
			$password 					= $data['password'];
			$murid 							= new Murid();
			$murid->nama 				= $data['nama'];
			$murid->email 			= $data['email'];
			$murid->no_hp 			= $data['no_hp'];
			$murid->email 			= $data['email'];
			$murid->password 		= sha1($password);

			if ($murid->save()){
				$response['code'] 	= 200;
				$response['message']= " Berhasil.";
			} else {
				$response['code'] 	= 500;
				$response['message']= "Gagal.";
			}
		}

		return $response;
	}

    public function actionFindById($id){
    	
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
            $murid = Murid::find()
                        ->where(['id' => $id])
                        ->all();
			
			$response['master'] = $murid;
		}

		return $response;
    }

}
