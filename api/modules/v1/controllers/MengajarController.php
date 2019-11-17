<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\GuruPengalamanMengajar;
use yii\web\NotFoundHttpException;
use yii\rest\Controller;
use yii\web\Response;


class MengajarController extends Controller
{
    /**
     * Fungsi untuk melihat semua kantor
     */
    public function actionFindAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$guru = GuruPengalamanMengajar::find()->all();
			
			$response['master'] = $guru;
		}

		return $response;
    }

    public function actionCreate(){
		Yii::$app->response->format = Response::FORMAT_JSON;

			$response 				= null;

		if (Yii::$app->request->isPost){
			$data 					= Yii::$app->request->post();
			$guru 					= new GuruPengalamanMengajar();
			// $guru->guru_id 			= "36";
			$guru->guru_id 			= $data['guru_id'];
			$guru->pengalaman 		= $data['pengalaman'];
			$guru->tgl_masuk 		= $data['tgl_masuk'];
			$guru->tgl_selesai 		= $data['tgl_selesai'];

			if ($guru->save()){
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
			
            $guru = GuruPengalamanMengajar::find()
                        ->where(['guru_id' => $id])
                        ->all();
			
			$response['master'] = $guru;
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
	        if (($model = GuruPengalamanMengajar::findOne($id)) !== null) {
	            return $model;
	        } else {
	            throw new NotFoundHttpException('The requested page does not exist.');
	        }
	    }

}
