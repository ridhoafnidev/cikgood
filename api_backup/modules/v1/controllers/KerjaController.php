<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\GuruPengalamanKerja;
use yii\web\NotFoundHttpException;
use yii\rest\Controller;
use yii\web\Response;


class KerjaController extends Controller
{
    /**
     * Fungsi untuk melihat semua kantor
     */
    public function actionFindAll(){
        Yii::$app->response->format = Response::FORMAT_JSON;

        $response = null;

        if (Yii::$app->request->isGet){
            
            $kerja = GuruPengalamanKerja::find()->all();
            
            $response['master'] = $kerja;
        }

        return $response;
    }

    public function actionCreate(){
        Yii::$app->response->format = Response::FORMAT_JSON;

            $response               = null;

        if (Yii::$app->request->isPost){
            $data                   = Yii::$app->request->post();
            $kerja                  = new GuruPengalamanKerja();
            $kerja->guru_id         = $data['guru_id'];
            $kerja->jabatan         = $data['jabatan'];
            $kerja->perusahaan      = $data['perusahaan'];
            $kerja->tgl_masuk       = $data['tgl_masuk'];
            $kerja->tgl_selesai     = $data['tgl_selesai'];

            if ($kerja->save()){
                $response['code']   = 200;
                $response['message']= " Berhasil.";
            } else {
                $response['code']   = 500;
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
            $id_pengalaman_kerja    = $data['id_pengalaman_kerja'];

            $kerja_update           = GuruPengalamanKerja::find()->where(['id_pengalaman_kerja' => $id_pengalaman_kerja])->one();

            $kerja_update->jabatan         = $data['jabatan'];
            $kerja_update->perusahaan      = $data['perusahaan'];
            $kerja_update->tgl_masuk       = $data['tgl_masuk'];
            $kerja_update->tgl_selesai     = $data['tgl_selesai'];

            if ($kerja_update->save()){
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
            
            $guru = GuruPengalamanKerja::find()
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
        if (($model = GuruPengalamanKerja::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
