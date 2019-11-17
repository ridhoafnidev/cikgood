<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\GuruDokumen;
use yii\web\NotFoundHttpException;
use yii\rest\Controller;
use yii\web\Response;


class DokumenController extends Controller
{
    /**
     * Fungsi untuk melihat semua kantor
     */
    public function actionFindAll(){
        Yii::$app->response->format = Response::FORMAT_JSON;

        $response = null;

        if (Yii::$app->request->isGet){
            
            $kerja = GuruRiwayatPendidikan::find()->all();
            
            $response['master'] = $kerja;
        }

        return $response;
    }

     public function actionUpdate(){
        Yii::$app->response->format = Response::FORMAT_JSON;

            $response               = null;

        if (Yii::$app->request->isPost){
            $data                   = Yii::$app->request->post();
            $id_riwayat_pendidikan  = $data['id_riwayat_pendidikan'];

            $pendidikan_update      = GuruRiwayatPendidikan::find()->where(['id_riwayat_pendidikan' => $id_riwayat_pendidikan])->one();

            $pendidikan_update->guru_id  = $data['guru_id'];
            $pendidikan_update->gelar  = $data['gelar'];
            $pendidikan_update->jenis_institusi  = $data['jenis_institusi'];
            $pendidikan_update->nama_institusi   = $data['nama_institusi'];
            $pendidikan_update->jurusan          = $data['jurusan'];
            $pendidikan_update->tahun_masuk      = $data['tahun_masuk'];
            $pendidikan_update->tahun_selesai    = $data['tahun_selesai'];

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
            
            $dokumen = GuruDokumen::find()
                        ->where(['guru_id' => $id])
                        ->all();
            
            $response['master'] = $dokumen;
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
            if (($model = GuruDokumen::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }

}
