<?php
namespace backend\controllers;
use Yii;
use common\models\Pemesanan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * PemesananController implements the CRUD actions for Pemesanan model.
 */
class PesananHistoriController extends Controller
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
     * Lists all Pemesanan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model= (new \yii\db\Query());
        $model  
        ->select(['pemesanan.*', 'murid.nama', 'guru_profil.nama_guru']) 
        ->from('pemesanan')
        ->where('status_pemesanan="Batal" || status_pemesanan="Tidak Disetujui" || status_pemesanan="Diproses" || status_pemesanan="Diproses" || status_pemesanan="Disetujui"')
        ->leftJoin('murid', 'murid.id = pemesanan.murid_id')
        ->leftJoin('guru_profil', 'guru_profil.id_guru = pemesanan.guru_id')
        ->orderBy('id_pemesanan DESC');
        $command = $model->createCommand();
        $data = $command->queryAll();
        
        return $this->render('index', [
            'data'=>$data,
        ]);
    }

    /**
     * Displays a single Pemesanan model.
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
     * Finds the Pemesanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pemesanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pemesanan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
