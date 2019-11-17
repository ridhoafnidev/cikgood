<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\Districts;
use yii\rest\Controller;
use yii\web\Response;


class KecamatanController extends Controller
{
    /**
     * Fungsi untuk melihat semua kantor
     */
    public function actionFindAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$kota = Districts::find()->all();
			
			$response['master'] = $kota;
		}

		return $response;
    }

}
