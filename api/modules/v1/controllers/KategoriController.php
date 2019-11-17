<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\User;
use app\models\Kategori;
use yii\rest\Controller;
use yii\web\Response;


class KategoriController extends Controller
{
    /**
     * Fungsi untuk mendapatkan semua data kategori
     */

    public function actionFindAll(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        
        $response = null;
        if(Yii::$app->request->isGet){
            $kategori = Kategori::find()->all();

            $response['master'] = $kategori;
        }

        return $response;
    }

}