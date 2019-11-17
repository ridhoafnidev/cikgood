<?php
namespace api\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use common\models\SaldoMidtrans;
use yii\web\Response;


class MidtransController extends Controller
{

  
  public function actionFindAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$murid = SaldoMidtrans::find()->all();

			$response['master'] = $murid;
		}	

		return $response;
		}
		
		
	public function actionJsonPostData(){
  	Yii::$app->response->format = Response::FORMAT_JSON;
    // get the raw POST data
    $rawData = json_decode(file_get_contents("php://input"), true);
    $dataJson = file_get_contents("php://input");

    // jika ada data masuk, cek kedatabase
	$model= (new \yii\db\Query())
        ->from('saldo_midtrans')
        ->where(['transaction_id' => $rawData['transaction_id']])
        ->count();

        if ($model > 0) {

		     // update
		        $saldo 	= SaldoMidtrans::findOne(["transaction_id" => $rawData['transaction_id'] ]);

				$saldo->transaction_status 		= $rawData['transaction_status'];
				$saldo->status_code 			= $rawData['status_code'];

				// cek ada fraude status ada atau tidak
				if (isset($rawData['fraud_status'])) {
					# code...
					$saldo->fraud_status = $rawData['fraud_status'];
				}

				if ($saldo->save()){
					$response['code'] 	= 200;
					$response['message']= " Berhasil.";
				} else {
					$response['code'] 	= 500;
					$response['message']= "Gagal.";
				}

        }else{
            $saldo = new SaldoMidtrans();
        	
        	$saldo->custom_field1           = $rawData['custom_field1'];   //bank transfer//csstore
        	$saldo->custom_field2           = $rawData['custom_field2'];   //bank transfer/csstore
        	$saldo->status_code             = $rawData['status_code'];     //bank transfer//csstore
        	$saldo->status_message          = $rawData['status_message'];  //bank transfer//csstore
        	$saldo->transaction_id          = $rawData['transaction_id'];  //bank transfer//csstore
        	$saldo->masked_card             = isset($rawData['masked_card']) ? $rawData['masked_card'] : "-";        //enggak ada attibut di transfer atau csstore
        	$saldo->order_id                = $rawData['order_id'];        //bank transfer//csstore
        	$saldo->payment_type            = $rawData['payment_type'];    //bank transfer//csstore
        	$saldo->transaction_time        = $rawData['transaction_time'];//bank transfer//csstore
        	$saldo->transaction_status      = $rawData['transaction_status']; //bank transfer//csstore
        	$saldo->fraud_status            = isset($rawData['fraud_status']) ? $rawData['fraud_status'] : "-";      //bank transfer
        	$saldo->approval_code           = isset($rawData['approval_code']) ? $rawData['approval_code'] : "-";    //enggak ada attibut di transfer atau csstore
        	$saldo->signature_key           = $rawData['signature_key'];   //bank transfer//csstore
        	$saldo->bank                    = isset($rawData['bank']) ? $rawData['bank'] : "-";                      //enggak ada attibut di transfer atau csstore
        	$saldo->gross_amount            = $rawData['gross_amount'];    //bank transfer//csstore
        	$saldo->channel_response_message= isset($rawData['channel_response_message']) ? $rawData['channel_response_message'] : "-"; // ini juga gak ada
        	$saldo->card_type               = isset($rawData['card_type']) ? $rawData['card_type'] : "-";
        	
        	$data [] = array(
        	    'custom_field1' => $saldo->custom_field1,
        	    'custom_field2' => $saldo->custom_field2,
        	    'status_code' => $saldo->status_code,
        	    'status_message' => $saldo->status_message,
        	    'transaction_id' => $saldo->transaction_id,
        	    'masked_card' => $saldo->masked_card,
        	    'order_id' => $saldo->order_id,
        	    'payment_type' => $saldo->payment_type,
        	    'transaction_time' => $saldo->transaction_time,
        	    'transaction_status' => $saldo->transaction_status,
        	    'fraud_status' => $saldo->fraud_status,
        	    'approval_code' => $saldo->approval_code,
        	    'signature_key' => $saldo->signature_key,
        	    'bank' => $saldo->bank,
        	    'gross_amount' => $saldo->gross_amount,
        	    'channel_response_message' => $saldo->channel_response_message,
        	    'card_type' => $saldo->card_type
        	    );
        	    
        	    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
        	    
        	    file_put_contents('test.json', $jsonfile);
        	    file_put_contents('data.json', $dataJson);
        	
        	$saldo->save();
        	
        }
  }
  
  public function getSaldoMurid(){
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

}
