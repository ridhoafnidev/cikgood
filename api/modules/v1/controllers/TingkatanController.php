<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\Tingkatan;
use yii\web\NotFoundHttpException;
use yii\rest\Controller;
use yii\web\Response;


class TingkatanController extends Controller
{
    /**
     * Fungsi untuk melihat semua kantor
     */
    public function actionFindAll(){
        Yii::$app->response->format = Response::FORMAT_JSON;

        $response = null;

        if (Yii::$app->request->isGet){
            
            $tingkatan = Tingkatan::find()->all();
            
            $response['master'] = $tingkatan;
        } 

        return $response;
    }

}
