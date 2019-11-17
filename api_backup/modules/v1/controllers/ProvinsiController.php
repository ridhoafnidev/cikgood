<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\Provinces;
use yii\rest\Controller;
use yii\web\Response;


class ProvinsiController extends Controller
{
    /**
     * Fungsi untuk melihat semua kantor
     */
    public function actionFindAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$guru = Provinces::find()->all();
			
			$response['master'] = $guru;
		}

		return $response;
    }

}
