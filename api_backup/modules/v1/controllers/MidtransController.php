<?php
namespace api\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use common\models\SaldoMidtrans;
use yii\web\Response;


class MidtransController extends Controller
{

   /**
   * Returns the JSON encoded POST data, if any, as an object.
   * 
   * @return Object|null
   */

  public function actionJsonPostData()
  {
  	Yii::$app->response->format = Response::FORMAT_JSON;
    // get the raw POST data
    $rawData = json_decode(file_get_contents("php://input"), true);

    // jika ada data masuk, cek kedatabase

	$model= (new \yii\db\Query())
        ->from('saldo_midtrans')
        ->where(['transaction_id' => $rawData['transaction_id'])
        // ->leftjoin('tingkatan','tingkatan.id = data_matpel.tingkatan')
        // ->where('guru_id = "'.$id.'" ')
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
        	$saldo->load($rawData);
        	$saldo->save();
        }


        if ($saldo->status_code == 200 && $saldo->transaction_status == "settlement") {
        	# code...
        	$response['message'] = "topup Berhasil";
        	$model= (new \yii\db\Query())
		        ->from($saldo->custom_field2)
		        ->where(['id' => $saldo->custom_field1)
		        // ->leftjoin('tingkatan','tingkatan.id = data_matpel.tingkatan')
		        // ->where('guru_id = "'.$id.'" ')
		        ->update(["saldo" => new Expression("saldo+".$saldo->gross_amount)]);
		        // update guru set saldo = saldo+1 where id = 1

        }

    // this returns null if not valid json
  }


}
