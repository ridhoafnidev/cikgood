<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\Matpel;
use yii\rest\Controller;
use yii\web\Response;


class MatpelController extends Controller
{
    /**
     * Fungsi untuk melihat semua kantor
     */
    public function actionFindAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$matpel = Matpel::find()->all();
			
			$response['master'] = $matpel;
		}

		return $response;
    }

    public function actionCreate(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response 					= null;

		if (Yii::$app->request->isPost){
			$data 					= Yii::$app->request->post();
			$password 				= $data['password'];
			$murid 					= new Murid();
			$murid->nama 			= $data['nama'];
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
			
            $matpel = Matpel::find()
                        ->where(['id' => $id])
                        ->one();
			
			$response['master'] = $matpel;
		}

		return $response;
    }

}
