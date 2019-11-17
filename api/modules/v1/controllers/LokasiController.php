<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\GuruBahanAjarLokasi;
use yii\rest\Controller;
use yii\web\Response;


class LokasiController extends Controller
{


    public function actionCreate(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response 					= null;

		if (Yii::$app->request->isPost){
			$data 					= Yii::$app->request->post();
			$lokasi 				= new GuruBahanAjarLokasi();
			$lokasi->guru_id 		= $data['guru_id'];
			$lokasi->provinsi 		= $data['provinsi'];
			$lokasi->kota 			= $data['kota'];
			$lokasi->kecamatan 		= $data['kecamatan'];

			if ($lokasi->save()){
				$response['code'] 	= 200;
				$response['message']= " Berhasil.";
			} else {
				$response['code'] 	= 500;
				$response['message']= "Gagal.";
			}
		}

		return $response;
	}

	 public function actionUpdate(){
        Yii::$app->response->format = Response::FORMAT_JSON;

            $response               = null;

        if (Yii::$app->request->isPost){
            $data                   = Yii::$app->request->post();
            $id_bahan_ajar_lokasi   = $data['id_bahan_ajar_lokasi'];

            $lokasi_update      = GuruBahanAjarLokasi::find()->where(['id_bahan_ajar_lokasi' => $id_bahan_ajar_lokasi])->one();

            $lokasi_update->guru_id  = $data['guru_id'];
            $lokasi_update->provinsi = $data['provinsi'];
            $lokasi_update->kota  	 = $data['kota'];
            $lokasi_update->kecamatan= $data['kecamatan'];

            if ($lokasi_update->save()){
                $response['code']   = 200;
                $response['message']= " Berhasil.";
            } else {
                $response['code']   = 500;
                $response['message']= "Gagal.";
            }
        }

        return $response;
    }

    public function actionFindById($id){
    	
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
            $matpel = GuruBahanAjarLokasi::find()
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
            if (($model = GuruBahanAjarLokasi::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }

}
