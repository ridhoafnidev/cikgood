<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\GuruProfil;
use common\models\Guru;
use yii\rest\Controller;
use yii\web\Response;


class GuruController extends Controller
{
    /**
     * Fungsi untuk melihat semua kantor
     */
    public function actionFindAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$guru = GuruProfil::find()->all();
			
			$response['master'] = $guru;
		}

		return $response;
    }

    public function actionRegister(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response 					= null;

		if (Yii::$app->request->isPost){
			$data 					= Yii::$app->request->post();
			$password 				= $data['password'];
			$guru 					= new GuruProfil();
			$guru->nama 			= $data['nama'];
			$guru->email 			= $data['email'];
			$guru->no_hp 			= $data['no_hp'];
			$guru->email 			= $data['email'];
			$guru->password 		= sha1($password);

			if ($guru->save()){
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
			
            $matpel = GuruProfil::find()
                        ->where(['id_guru' => $id])
                        ->one();
			
			$response['master'] = $matpel;
		}

		return $response;
    }

}
