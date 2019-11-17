<?php

namespace backend\controllers;

use Yii;
use common\models\DataMatpel;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DataMatpelController implements the CRUD actions for DataMatpel model.
 */
class DataMatpelController extends Controller
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
     * Lists all DataMatpel models.
     * @return mixed
     */
    public function actionIndex()
    {
       $model= (new \yii\db\Query())
        ->select(['master_matpel.*','data_matpel.*', 'tingkatan.*'])
        ->from('data_matpel')
        ->leftjoin('master_matpel','master_matpel.id_master_matpel = data_matpel.matpel')
        ->leftjoin('tingkatan','tingkatan.id = data_matpel.tingkatan')
        ->orderBy('data_matpel.id_matpel DESC')
        ->all();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single DataMatpel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model= (new \yii\db\Query())
        ->select(['master_matpel.*','data_matpel.*', 'tingkatan.*'])
        ->from('data_matpel')
        ->leftjoin('master_matpel','master_matpel.id_master_matpel = data_matpel.matpel')
        ->leftjoin('tingkatan','tingkatan.id = data_matpel.tingkatan')
        ->where('id_matpel = "'.$id.'"')
        ->one();

        return $this->render('view', ['model' => $model]);
    }

    /**
     * Creates a new DataMatpel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DataMatpel();

        if ($model->load(Yii::$app->request->post())) {
            $model->tingkatan=$_POST['DataMatpel']['tingkatan'];
            // $t = $_POST['DataMatpel']['tingkatan'];
            // $m =$_POST['DataMatpel']['matpel'];
            // $mt = $m." ".$t; 
            $model->matpel_detail = strtoupper($_POST['DataMatpel']['matpel_detail']);
            $model->save();
            return $this->redirect('index');
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DataMatpel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->tingkatan=$_POST['DataMatpel']['tingkatan'];
            // $t = $_POST['DataMatpel']['tingkatan'];
            // $m =$_POST['DataMatpel']['matpel'];
            // $mt = $m." ".$t; 
            $model->matpel_detail = strtoupper($_POST['DataMatpel']['matpel_detail']);

            $model->save();

            return $this->redirect(['view', 'id' => $model->id_matpel]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DataMatpel model.
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
     * Finds the DataMatpel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DataMatpel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DataMatpel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
