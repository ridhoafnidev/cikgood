<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\GuruJadwal;
use yii\rest\Controller;
use yii\web\Response;


class GuruJadwalController extends Controller
{
    /**
     * Fungsi untuk melihat semua kantor
     */
    public function actionFindAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$matpel = GuruJadwal::find()->all();
			
			$response['master'] = $matpel;
		}

		return $response;
    }

    public function actionRegister(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response 					= null;

		if (Yii::$app->request->isPost){
			$data 					= Yii::$app->request->post();
			$jadwal 				= new GuruJadwal();
			$jadwal->guru_id 		= $data['guru_id'];
			$jadwal->hari 			= $data['hari'];
			$jadwal->jam 			= $data['jam'];

			if ($jadwal->save()){
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
			
            $matpel = GuruJadwal::find()
                        ->where(['guru_id' => $id])
                        ->all();
			
			$response['master'] = $matpel;
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
            if (($model = GuruJadwal::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }


}
