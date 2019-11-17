<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\User;
use app\models\Kantor;
use yii\rest\Controller;
use yii\web\Response;


class KantorController extends Controller
{
    /**
     * Fungsi untuk melihat semua kantor
     */
    public function actionFindAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$kantor = Kantor::find()->all();
			
			$response['master'] = $kantor;
		}

		return $response;
    }
    
    /**
     * Fungsi melihat kantor kategori kantor polisi
     */

    public function actionFindAllKantorPolisi(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
            $kantor = Kantor::find()
                        ->where(['kategori' => 'Kantor Polisi'])
                        ->all();
			
			$response['master'] = $kantor;
		}

		return $response;
    }

    /**
     * Fungsi melihat kantor kategori pos polisi
     */

    public function actionFindAllPosPolisi(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
            $kantor = Kantor::find()
                        ->where(['kategori' => 'Pos Polisi'])
                        ->all();
			
			$response['master'] = $kantor;
		}

		return $response;
    }

    /**
     * Fungsi melihat kantor by id_kantor
     */

    public function actionFindByIdKantor($id_kantor){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
            $kantor = Kantor::find()
                        ->where(['id_kantor' => $id_kantor])
                        ->all();
			
			$response['master'] = $kantor;
		}

		return $response;
    }

}
