<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\MasterMatpel;
use common\models\Guru;
use yii\rest\Controller;
use yii\web\Response;


class MasterMatpelController extends Controller
{
    /**
     * Fungsi untuk melihat semua kantor
     */
    public function actionFindAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$master_matpel = MasterMatpel::find()->all();
			
			$response['master'] = $master_matpel;
		}

		return $response;
    }

}
