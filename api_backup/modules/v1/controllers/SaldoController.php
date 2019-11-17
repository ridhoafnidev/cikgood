<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\Saldo;
use yii\rest\Controller;
use yii\web\Response;


class SaldoController extends Controller
{
    /**
     * Fungsi untuk melihat semua kantor
     */

    public function actionCreate(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response 						= null;

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

	/**
     * Fungsi update saldo
     */

    public function actionUpdate(){
			Yii::$app->response->format = Response::FORMAT_JSON;

					$response               = null;

			if (Yii::$app->request->isPost){
					$data                   = Yii::$app->request->post();
					$pengguna_id  					= $data['pengguna_id'];

					$saldo = Saldo::find()->where(['pengguna_id' => $pengguna_id])->one();

					$saldo->pengguna_id  		= $data['pengguna_id'];
					$saldo->total_saldo  		= $data['total_saldo'];

					if ($saldo->save()){
							$response['code']   = 200;
							$response['message']= " Berhasil.";
					} else {
							$response['code']   = 500;
							$response['message']= "Gagal.";
					}
			}

			return $response;
	}

    public function actionFindById($id){
    	
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
            $saldo = Saldo::find()
                        ->where(['pengguna_id' => $id])
                        ->one();
			
			$response['master'] = $saldo;
		}

		return $response;
    }

}
