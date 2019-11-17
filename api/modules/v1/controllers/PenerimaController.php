<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\Penerima;
use yii\rest\Controller;
use yii\web\Response;


class PenerimaController extends Controller
{
    /**
     * Fungsi untuk mendapatkan semua data kategori
     */

    public function actionFindAll(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        
        $response = null;
        if(Yii::$app->request->isGet){
            $penerima = Penerima::find()->all();

            $response['master'] = $penerima;
        }
        return $response;
    }

}