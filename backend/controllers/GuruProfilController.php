<?php

namespace backend\controllers;

use Yii;
use common\models\GuruProfil;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GuruProfilController implements the CRUD actions for GuruProfil model.
 */
class GuruProfilController extends Controller
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
     * Lists all GuruProfil models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model= (new \yii\db\Query())
        ->select(['guru_profil.*','guru_dokumen.*', 'guru_identitas.*', 'guru_jadwal.*', 'guru_pengalaman_kerja.*', 'guru_pengalaman_mengajar.*', 'guru_riwayat_pendidikan.*',
        'guru_bahan_ajar_matpel.*', 'guru_bahan_ajar_lokasi.*'])
        ->from('guru_profil')
        ->leftjoin('guru_dokumen','guru_dokumen.guru_id = guru_profil.id_guru')
        ->leftjoin('guru_identitas','guru_identitas.guru_id = guru_profil.id_guru')
        ->leftjoin('guru_jadwal','guru_jadwal.guru_id = guru_profil.id_guru')
        ->leftjoin('guru_bahan_ajar_matpel','guru_bahan_ajar_matpel.guru_id = guru_profil.id_guru')
        ->leftjoin('guru_pengalaman_kerja','guru_pengalaman_kerja.guru_id = guru_profil.id_guru')
        ->leftjoin('guru_pengalaman_mengajar','guru_pengalaman_mengajar.guru_id = guru_profil.id_guru')
        ->leftjoin('guru_riwayat_pendidikan','guru_riwayat_pendidikan.guru_id = guru_profil.id_guru')
        ->leftjoin('guru_bahan_ajar_lokasi','guru_bahan_ajar_lokasi.guru_id = guru_profil.id_guru')
        ->orderBy('guru_profil.id_guru DESC')
        ->groupBy('guru_profil.id_guru')
        ->all();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single GuruProfil model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model= (new \yii\db\Query());
        $model  
         ->select(['guru_profil.*','guru_dokumen.*', 'guru_identitas.*', 'guru_jadwal.*', 'guru_pengalaman_kerja.*', 'guru_pengalaman_mengajar.*', 'guru_riwayat_pendidikan.*',
        'guru_bahan_ajar_matpel.*', 'guru_bahan_ajar_lokasi.*'])
        ->from('guru_profil')
        ->leftjoin('guru_dokumen','guru_dokumen.guru_id = guru_profil.id_guru')
        ->leftjoin('guru_identitas','guru_identitas.guru_id = guru_profil.id_guru')
        ->leftjoin('guru_jadwal','guru_jadwal.guru_id = guru_profil.id_guru')
        ->leftjoin('guru_bahan_ajar_matpel','guru_bahan_ajar_matpel.guru_id = guru_profil.id_guru')
        ->leftjoin('guru_pengalaman_kerja','guru_pengalaman_kerja.guru_id = guru_profil.id_guru')
        ->leftjoin('guru_pengalaman_mengajar','guru_pengalaman_mengajar.guru_id = guru_profil.id_guru')
        ->leftjoin('guru_riwayat_pendidikan','guru_riwayat_pendidikan.guru_id = guru_profil.id_guru')
        ->leftjoin('guru_bahan_ajar_lokasi','guru_bahan_ajar_lokasi.guru_id = guru_profil.id_guru')
        ->orderBy('guru_profil.id_guru DESC')
        ->groupBy('guru_profil.id_guru')
        ->where('id_guru = "'.$id.'"');
        $command = $model->createCommand();
        $data = $command->queryOne();
        
        return $this->render('view', [
            'model'=>$data,
        ]);
    }

    /**
     * Creates a new GuruProfil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GuruProfil();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_guru]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionUpdateStatusSudah($id)
    {
      
      $model_guru_profil = GuruProfil::find()
        ->where(['id_guru'=>$id])
        ->one();
        $model_guru_profil->status="Sudah Terverifikasi";
        $model_guru_profil->save();

        return $this->redirect(['index']);  
      
    }
    
    public function actionUpdateStatusBelum($id)
    {
      
      $model_guru_profil = GuruProfil::find()
        ->where(['id_guru'=>$id])
        ->one();
        $model_guru_profil->status="Belum Terverifikasi";
        $model_guru_profil->save();

        return $this->redirect(['index']);  
      
    }
    
    /**
     * Updates an existing GuruProfil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_guru]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GuruProfil model.
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
     * Finds the GuruProfil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GuruProfil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GuruProfil::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
