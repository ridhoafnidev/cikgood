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

	/**
     * Fungsi update saldo
     */

    public function actionUpdate(){
			Yii::$app->response->format = Response::FORMAT_JSON;

					$response                   = null;

			if (Yii::$app->request->isPost){
					$data                       = Yii::$app->request->post();
					$pengguna_id  				= $data['pengguna_id'];

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
    
    public function actionFindSaldo($id){
        
        Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;
		
		if (Yii::$app->request->isGet){
        
        $model = (new \yii\db\Query())
        ->select(['saldo_midtrans.*', 'murid.*', 'SUM(saldo_midtrans.gross_amount) as saldo'])
        ->from('saldo_midtrans')
        ->leftjoin('murid', 'murid.id = saldo_midtrans.custom_field1')
        ->where(' ((saldo_midtrans.fraud_status = "accept" && saldo_midtrans.transaction_status = "settlement") OR (saldo_midtrans.fraud_status = "accept" && saldo_midtrans.transaction_status = "capture")) AND saldo_midtrans.custom_field1 = "'.$id.'" ')
        ->groupBy('saldo_midtrans.custom_field1')
        ->all();
        
        $response['master'] = $model;
        
		}
		
		return $response;
        
    }
    
    public function actionFindSaldoAkun($id, $saldo_mitrans){
        
        Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;
		
		if (Yii::$app->request->isGet){
        
        $model = Saldo::find()->where(['pengguna_id' => $id])->one();
        
        if(isset($model)){
            $model->saldo_mitrans = $saldo_mitrans;
            $model->save(false);
            
            $saldo = $model['saldo_mitrans'] - $model['uang_keluar'];
        }
        
        $response['master'] = $saldo;
        
		}
		
		return $response;
        
    }

}
