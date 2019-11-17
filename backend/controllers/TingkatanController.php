<?php

namespace backend\controllers;

use Yii;
use common\models\Tingkatan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TingkatanController implements the CRUD actions for Tingkatan model.
 */
class TingkatanController extends Controller
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
     * Lists all Tingkatan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model= (new \yii\db\Query());
        $model  
        ->select(['tingkatan.*']) 
        ->from('tingkatan')
        ->orderBy('id DESC');
        $command = $model->createCommand();
        $data = $command->queryAll();
        
        return $this->render('index', [
            'data'=>$data,
        ]);
    }

    /**
     * Displays a single Tingkatan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model= (new \yii\db\Query());
        $model  
        ->select(['tingkatan.*']) 
        ->from('tingkatan')
        ->where('id = "'.$id.'"');
        $command = $model->createCommand();
        $data = $command->queryOne();
        
        return $this->render('view', [
            'model'=>$data,
        ]);
    }

    /**
     * Creates a new Tingkatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tingkatan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tingkatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tingkatan model.
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
     * Finds the Tingkatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tingkatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tingkatan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
