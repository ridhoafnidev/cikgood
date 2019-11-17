<?php

namespace backend\controllers;

use Yii;
use common\models\Pemesanan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class KeuanganController extends Controller
{
    
    public function actionMurid()
    {
        $model = (new \yii\db\Query())
        ->select(['saldo_midtrans.*', 'murid.*', 'SUM(saldo_midtrans.gross_amount) as saldo'])
        ->from('saldo_midtrans')
        ->leftjoin('murid', 'murid.id = saldo_midtrans.custom_field1')
        ->where('(saldo_midtrans.fraud_status = "accept" && saldo_midtrans.transaction_status = "settlement") OR (saldo_midtrans.fraud_status = "accept" && saldo_midtrans.transaction_status = "capture") ')
        ->groupBy('saldo_midtrans.custom_field1')
        ->all();
        
        return $this->render('murid',
        ['model' => $model]);
    }
    
    public function actionGuru(){
        
        $status = "Disetujui";
        
        $model = (new \yii\db\Query())
            ->select(['SUM(pemesanan.harga_total) as saldo', 'guru_profil.*'])
            ->from('pemesanan')
            ->leftjoin('guru_profil', 'guru_profil.id_guru = pemesanan.guru_id')
            ->where('pemesanan.status_pemesanan = "'.$status.'"')
            ->groupBy('pemesanan.guru_id')
            ->all();
            
            return $this->render('guru',
            ['model' => $model]);
    }
    
    public function actionViewGuru($id){
        $status = "Disetujui";
        $model = (new \yii\db\Query())
        ->select(['pemesanan.*', 'guru_profil.*'])
        ->from('pemesanan')
        ->leftjoin('guru_profil', 'guru_profil.id_guru = pemesanan.guru_id')
        ->where('pemesanan.status_pemesanan = "'.$status.'" && pemesanan.guru_id = "'.$id.'"')
        ->all();
        
        return $this->render('view_guru',
        ['model' => $model]);
    }
    
     public function actionViewMurid($id)
    {
        $model = (new \yii\db\Query())
        ->select(['saldo_midtrans.*', 'murid.*'])
        ->from('saldo_midtrans')
        ->leftjoin('murid', 'murid.id = saldo_midtrans.custom_field1')
        ->where('saldo_midtrans.custom_field1 = "'.$id.'" && saldo_midtrans.transaction_status = "settlement" ')
        ->orderBy('saldo_midtrans.id_mitrans DESC')
        ->all();
        
        
        return $this->render('view_murid',
        ['model' => $model]);
    }
    
}
