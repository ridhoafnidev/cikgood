<?php

namespace backend\controllers;

use Yii;
use common\models\MasterMatpel;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MasterMatpelController implements the CRUD actions for MasterMatpel model.
 */
class MasterMatpelController extends Controller
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
     * Lists all MasterMatpel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model= (new \yii\db\Query());
        $model  
        ->select(['master_matpel.*']) 
        ->from('master_matpel')
        ->orderBy('id_master_matpel DESC');
        $command = $model->createCommand();
        $data = $command->queryAll();
        
        return $this->render('index', [
            'data'=>$data,
        ]);
    }

    /**
     * Displays a single MasterMatpel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model= (new \yii\db\Query());
        $model  
        ->select(['master_matpel.*']) 
        ->from('master_matpel')
        ->where('id_master_matpel = "'.$id.'"');
        $command = $model->createCommand();
        $data = $command->queryOne();
        
        return $this->render('view', [
            'model'=>$data,
        ]);
    }

    /**
     * Creates a new MasterMatpel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MasterMatpel();

        if ($model->load(Yii::$app->request->post())) {
            $model->nama = strtoupper($_POST['MasterMatpel']['nama']);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_master_matpel]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MasterMatpel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_master_matpel]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MasterMatpel model.
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
     * Finds the MasterMatpel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MasterMatpel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MasterMatpel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
