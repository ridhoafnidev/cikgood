<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\Regencies;
use yii\rest\Controller;
use yii\web\Response;


class KotaController extends Controller
{
    /**
     * Fungsi untuk melihat semua kantor
     */
    public function actionFindAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$kota = Regencies::find()->all();
			
			$response['master'] = $kota;
		}

		return $response;
    }

     public function actionFindById($id){
    	
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
            $kota = Regencies::find()
                        ->where(['province_id' => $id])
                        ->all();
			
			$response['master'] = $kota;
		}

		return $response;
    }

}
