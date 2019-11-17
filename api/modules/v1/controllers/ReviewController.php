<?php
namespace api\modules\v1\controllers;

use Yii;
use common\models\Review;
use yii\rest\Controller;
use yii\web\Response;


class ReviewController extends Controller {
    /**
     * Fungsi untuk melihat semua kantor
     */
    public function actionFindAll(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$review = Review::find()->all();
			
			$response['master'] = $review;
		}

		return $response;
    }

public function actionFindRating($id){
	Yii::$app->response->format = Response::FORMAT_JSON;

	$response = null;

	if (Yii::$app->request->isGet){
		$rating= (new \yii\db\Query())
		->select(['review.*','pemesanan.guru_id','pemesanan.tgl_pemesanan', 'murid.id', 'murid.nama', 'murid.photo', 'guru_profil.nama_guru'])
		->from('review')
		->leftjoin('pemesanan','pemesanan.id_pemesanan = review.pemesanan_id')
		->leftjoin('guru_profil','guru_profil.id_guru = pemesanan.guru_id')
		->leftjoin('murid','pemesanan.murid_id = murid.id')
		->where(' pemesanan.guru_id = "'.$id.'" ')
		->all();

		$response['master'] = $rating;
	}

	return $response;
	}

}
