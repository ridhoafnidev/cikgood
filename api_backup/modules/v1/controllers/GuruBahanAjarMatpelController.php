<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\GuruBahanAjarMatpel;
use common\models\Guru;
use yii\rest\Controller;
use yii\web\Response;


class GuruBahanAjarMatpelController extends Controller
{

    public function actionFindByIdGuru($id){
            Yii::$app->response->format = Response::FORMAT_JSON;

        $response = null;

        if (Yii::$app->request->isGet){
            
        $data_matpel= (new \yii\db\Query())
        ->select('*')
        ->from('guru_bahan_ajar_matpel')
        // ->leftjoin('data_matpel','guru_bahan_ajar_matpel.matpel_id = data_matpel.id_matpel')
        ->where('guru_id = "'.$id.'" ')
        ->all();
            
            $response['master'] = $data_matpel;
        }
    }

}
