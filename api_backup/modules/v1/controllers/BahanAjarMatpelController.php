<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\GuruBahanAjarMatpel;
use yii\rest\Controller;
use yii\web\Response;


class BahanAjarMatpelController extends Controller
{
    /**
     * Fungsi untuk melihat semua kantor
     */
    public function actionFindAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$matpel = GuruBahanAjarMatpel::find()->all();
			
			$response['master'] = $matpel;
		}

		return $response;
    }

    public function actionRegister(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response 					= null;

		if (Yii::$app->request->isPost){
			$data 					= Yii::$app->request->post();
			$matpel 				= new GuruBahanAjarMatpel();
			$matpel->guru_id 		= $data['guru_id'];
			$matpel->matpel_id 		= $data['matpel_id'];
			$matpel->tarif 			= $data['tarif'];

			if ($matpel->save()){
				$response['code'] 	= 200;
				$response['message']= " Berhasil.";
			} else {
				$response['code'] 	= 500;
				$response['message']= "Gagal.";
			}
		}

		return $response;
	}
public function actionFindById($id){

	Yii::$app->response->format = Response::FORMAT_JSON;

	$response = null;

	if (Yii::$app->request->isGet){

	$model= (new \yii\db\Query())
        ->select(['guru_bahan_ajar_matpel.*','data_matpel.matpel_detail'])
        ->from('guru_bahan_ajar_matpel')
        ->leftjoin('data_matpel','guru_bahan_ajar_matpel.matpel_id = data_matpel.id_matpel')
        // ->leftjoin('tingkatan','tingkatan.id = data_matpel.tingkatan')
        // ->where('guru_id = "'.$id.'" ')
        ->all();

        $response['master'] = $model;
	}
		return $response;
}

public function actionDelete($id)
      {
          $model=$this->findModel($id);
          
          if($model->delete())
          { 
          echo json_encode(array('code'=>200,'message'=>"Berhasil"),JSON_PRETTY_PRINT);
          }
          else
          {
          echo json_encode(array('code'=>500,'message'=>"Gagal"),JSON_PRETTY_PRINT);
          }

      }

       protected function findModel($id)
        {
            if (($model = GuruBahanAjarMatpel::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }


}
