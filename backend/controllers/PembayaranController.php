<?php

namespace backend\controllers;

use Yii;
use common\models\SaldoMidtrans;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SaldoMidtransController implements the CRUD actions for SaldoMidtrans model.
 */
class PembayaranController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SaldoMidtrans models.
     * @return mixed
     */
    public function actionHistori()
    {
       $model= (new \yii\db\Query())
        ->select(['saldo_midtrans.*','murid.*'])
        ->from('saldo_midtrans')
        ->leftjoin('murid','murid.id = saldo_midtrans.custom_field1')
        ->orderBy('saldo_midtrans.id_mitrans DESC')
        ->all();

        return $this->render('histori', [
            'model' => $model,
        ]);
    }
    
    public function actionIndex(){
        $model = (new \yii\db\Query())
        ->select(['saldo_midtrans.*', 'murid.*'])
        ->from('saldo_midtrans')
        ->leftjoin('murid', 'murid.id = saldo_midtrans.custom_field1')
        ->where('saldo_midtrans.fraud_status = "accept" && saldo_midtrans.transaction_status = "settlement" ')
        ->orderBy('saldo_midtrans.id_mitrans DESC')
        ->all();
        
        return $this->render('index',
        ['model' => $model]);
    }

    /**
     * Displays a single SaldoMidtrans model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SaldoMidtrans model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SaldoMidtrans();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SaldoMidtrans model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_mitrans]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SaldoMidtrans model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SaldoMidtrans model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SaldoMidtrans the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SaldoMidtrans::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
