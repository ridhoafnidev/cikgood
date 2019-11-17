<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 12/10/17
 * Time: 11:46
 */

namespace api\modules\v1\controllers;

use Yii;
use common\models\Murid;
use common\models\Guru;
use common\models\GuruProfil;
use yii\rest\Controller;
use yii\web\Response;

class LoginController extends Controller
{
        public function actionMurid(){

            Yii::$app->response->format = Response::FORMAT_JSON;

            $response = null;

            if(Yii::$app->request->isPost){

                $data = Yii::$app->request->post();
                $pass     = $data['password'];
                $password = sha1($pass);
                
                $user = Murid::find()
                    ->where(['email'        =>$data['email']])
                    ->andWhere(['password'  => $password])
                    ->one();

                if(isset($user)){
                    $response['code']    = 200;
                    $response['message'] = 'Selamat datang '.$user->nama;
                    $response['data']    = $user;
                }
                else{
                    $response['code']    = 500;
                    $response['message'] = 'Login gagal! Username atau Password salah';
                }
            return $response;
        }
    }

    public function actionGuru(){

            Yii::$app->response->format = Response::FORMAT_JSON;

            $response = null;

            if(Yii::$app->request->isPost){

                $data     = Yii::$app->request->post();
                $pass     = $data['password'];
                $password = sha1($pass);
                
                $user = GuruProfil::find()
                    ->where(['email'       =>$data['email']])
                    ->andWhere(['password' => $password])
                    ->one();

                if(isset($user)){
                    $response['code'] = 200;
                    $response['message'] = 'Selamat datang '.$user->nama;
                    $response['data'] = $user;
                }
                else{
                    $response['code'] = 500;
                    $response['message'] = 'Login gagal! Username atau Password salah';
                }
            return $response;
        }
    }
}