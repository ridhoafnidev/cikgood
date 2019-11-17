<?php

namespace backend\controllers;

use Yii;
use common\models\Kwitansi;
use common\models\KwitansiDetail;
use common\models\Mak;
use common\models\Penerima;
use common\models\Jabatan;
use common\models\Pegawai;
use common\models\Satuan;
use common\models\Kegiatan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use mPDF;
use yii\web\UploadedFile;
use yii\helpers\Url;
use kartik\export\ExportMenu;

/**
 * KwitansiController implements the CRUD actions for Kwitansi model.
 */
class KwitansiController extends Controller
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
     * Lists all Kwitansi models.
     * @return mixed
     */
    public function actionIndex()
    {
        
		$model= (new \yii\db\Query());
		$model	
		->select(['kwitansi.*', 'penerima.nama_penerima', 'penerima.nama_toko']) 
		->from('kwitansi')
		->leftJoin('penerima', 'penerima.id_penerima = kwitansi.kepada')
		->orderBy('id_kwitansi DESC');
		$command = $model->createCommand();
		$data = $command->queryAll();
		

		 // SELECT `mak`,SUM(`total`) as `total` FROM `kwitansi` WHERE `created_by`=1 GROUP By `mak`
		// $models= (new \yii\db\Query());
		// $models	->select(['kwitansi.*', 'SUM(`total`) as total'])
		// ->groupBy('mak')
		// $commands = $models->createCommand();
		// $model2 = $commands->queryAll();
	


        return $this->render('index', [
            // 'dataProvider' => $dataProvider,
			'data'=>$data,
			// 'model2'=>$model2,
			// 'sum'=>$sum,
        ]);
    }
	
	public function actionIndex2($from,$to)
    {
        
		$model= (new \yii\db\Query());
		$model	->select(['kwitansi.*', 'kegiatan.kode_kegiatan as kegiatan','mak.mak as mak', 'penerima.nama_penerima', 'penerima.nama_toko']) 
		->from('kwitansi')
		->where('tgl_kwitansi BETWEEN "'.$from.'" AND "'.$to.'"')
		->leftJoin('kegiatan', 'kegiatan.id_kegiatan = kwitansi.kegiatan')
		->leftJoin('mak', 'mak.id_mak = kwitansi.mak')
		->leftJoin('penerima', 'penerima.id_penerima = kwitansi.kepada');
		$command = $model->createCommand();
		$data = $command->queryAll();
		if(isset($_POST['Kwitansi']))
		{
			// $var = $_POST['Kwitansi']['from'];
			// $date = str_replace('/', '-', $var);
			// $from=  date('Y-m-d', strtotime($date));
			// $var1 = $_POST['Kwitansi']['to'];
			// $date1 = str_replace('/', '-', $var1);
			// $to=  date('Y-m-d', strtotime($date1));
			$this->redirect('/index2&from='.$_POST['Kwitansi']['from'].'&to='.$_POST['Kwitansi']['to']);
			}
        return $this->render('index2', [
            // 'dataProvider' => $dataProvider,
			'data'=>$data,
        ]);
    }
	 /**
     * Creates a new Kwitansi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kwitansi();

        if ($model->load(Yii::$app->request->post())) {
			 $model->mak=$_POST['Kwitansi']['mak'];
			 $model->tgl_kwitansi=$_POST['Kwitansi']['tgl_kwitansi'];
			 $model->kegiatan=$_POST['Kwitansi']['kegiatan'];
			 $model->pegawai=$_POST['Kwitansi']['pegawai'];
			 $model->pegawai1=$_POST['Kwitansi']['pegawai1'];
			 $model->pegawai2=$_POST['Kwitansi']['pegawai2'];
			 $model->pegawai3=$_POST['Kwitansi']['pegawai3'];
			 $model->jabatan1=$_POST['Kwitansi']['jabatan1'];
			 $model->jabatan2=$_POST['Kwitansi']['jabatan2'];
			 $model->jabatan3=$_POST['Kwitansi']['jabatan3'];
			 $model->created_date= date('Y-m-d');
			 $model->created_by='1';
			 $model->save();
            if($model->mak=='10'){
				return $this->redirect(['view2', 'id' => $model->id_kwitansi]);
			}else{
				return $this->redirect(['view', 'id' => $model->id_kwitansi]);
			}
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionSalin($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
        	 $model = new Kwitansi();
        	 $model->load(Yii::$app->request->post());
			 $model->mak=$_POST['Kwitansi']['mak'];
			 $model->tgl_kwitansi=$_POST['Kwitansi']['tgl_kwitansi'];
			 $model->kegiatan=$_POST['Kwitansi']['kegiatan'];
			 $model->pegawai=$_POST['Kwitansi']['pegawai'];
			 $model->pegawai1=$_POST['Kwitansi']['pegawai1'];
			 $model->pegawai2=$_POST['Kwitansi']['pegawai2'];
			 $model->pegawai3=$_POST['Kwitansi']['pegawai3'];
			 $model->jabatan1=$_POST['Kwitansi']['jabatan1'];
			 $model->jabatan2=$_POST['Kwitansi']['jabatan2'];
			 $model->jabatan3=$_POST['Kwitansi']['jabatan3'];
			 $model->created_date= date('Y-m-d');
			 $model->created_by='1';
			 $model->save();

			 $modeldetail= (new \yii\db\Query())
			->select('*')
			->from('kwitansi_detail')
			->where('id_kwitansi="'.$id.'"')
			->join('INNER JOIN', 'satuan s', 's.id_satuan=kwitansi_detail.satuan') 
			->all();

			foreach ($modeldetail as $db) {
				$model2=new KwitansiDetail();
				$model2->id_kwitansi=$model->id_kwitansi;
				$model2->kegiatan=$db['kegiatan'];
				$model2->volume=$db['volume'];
				$model2->satuan=$db['satuan'];
				$model2->harga=$db['harga'];
				$model2->created_date=$db['created_date'];
				$model2->created_by=$db['created_by'];
				$model2->save();
			}

            if($model->mak=='10'){
				return $this->redirect(['view2', 'id' => $model->id_kwitansi]);
			}else{
				return $this->redirect(['view', 'id' => $model->id_kwitansi]);
			}
        } else {
            return $this->render('salin', [
                'model' => $model,
            ]);
        }
    }
	/**
     * Updates an existing Kwitansi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
	
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
			 $model->mak=$_POST['Kwitansi']['mak'];
			 $model->tgl_kwitansi=$_POST['Kwitansi']['tgl_kwitansi'];
			 $model->kegiatan=$_POST['Kwitansi']['kegiatan'];
			 $model->pegawai=$_POST['Kwitansi']['pegawai'];
			 $model->pegawai1=$_POST['Kwitansi']['pegawai1'];
			 $model->pegawai2=$_POST['Kwitansi']['pegawai2'];
			 $model->pegawai3=$_POST['Kwitansi']['pegawai3'];
			 $model->jabatan1=$_POST['Kwitansi']['jabatan1'];
			 $model->jabatan2=$_POST['Kwitansi']['jabatan2'];
			 $model->jabatan3=$_POST['Kwitansi']['jabatan3'];
			 $model->save();
            if($model->mak=='10'){
				return $this->redirect(['view2', 'id' => $model->id_kwitansi]);
			}else{
				return $this->redirect(['view', 'id' => $model->id_kwitansi]);
			}
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
	
    public function actionUpdatekd($id, $view)
    {
        $modeltotal = Kwitansi::findOne($view);
		
		$model= (new \yii\db\Query())
		->select('*')
		->from('kwitansi')
		->where('id_kwitansi="'.$view.'"')
		->join('INNER JOIN', 'mak m', 'm.id_mak=kwitansi.mak') 
		->join('INNER JOIN', 'penerima p', 'p.id_penerima=kwitansi.kepada') 
		// ->orderBy('id DESC')
		->one();
		
		$modeldetail= (new \yii\db\Query())
		->select('*')
		->from('kwitansi_detail')
		->where('id_kwitansi="'.$view.'"')
		->join('INNER JOIN', 'satuan s', 's.id_satuan=kwitansi_detail.satuan') 
		// ->orderBy('id DESC')
		->all();
		
		
		
        $model2 = KwitansiDetail::findOne($id);
		if ($model2->load(Yii::$app->request->post())) {
			$model2->id_kwitansi=$view;
			$model2->created_date=date('y-m-d');
			$model2->created_by='1';
			$model2->save();
			
            return $this->redirect(['view', 'id' => $model2->id_kwitansi]);
        } else {
			return $this->render('updatekd', [
				'model' => $model,
				'model2' => $model2,
				'modeldetail'=>$modeldetail,
				'modeltotal'=>$modeltotal,
				// 'data' => $data,
			]);
		}
    }
	
	public function actionUpdatekd2($id, $view)
    {
        $modeltotal = Kwitansi::findOne($view);
		
		$model= (new \yii\db\Query())
		->select('*')
		->from('kwitansi')
		->where('id_kwitansi="'.$view.'"')
		->join('INNER JOIN', 'mak m', 'm.id_mak=kwitansi.mak') 
		->join('INNER JOIN', 'penerima p', 'p.id_penerima=kwitansi.kepada') 
		// ->orderBy('id DESC')
		->one();
		
		$modeldetail= (new \yii\db\Query())
		->select('*')
		->from('kwitansi_detail')
		->where('id_kwitansi="'.$view.'"')
		->join('INNER JOIN', 'satuan s', 's.id_satuan=kwitansi_detail.satuan') 
		// ->orderBy('id DESC')
		->all();
		
		
		
        $model2 = KwitansiDetail::findOne($id);
		if ($model2->load(Yii::$app->request->post())) {
			$model2->id_kwitansi=$view;
			$model2->created_date=date('y-m-d');
			$model2->created_by='1';
			$model2->save();
			
            return $this->redirect(['view2', 'id' => $model2->id_kwitansi]);
        } else {
			return $this->render('updatekd2', [
				'model' => $model,
				'model2' => $model2,
				'modeldetail'=>$modeldetail,
				'modeltotal'=>$modeltotal,
				// 'data' => $data,
			]);
		}
    }

    /**
     * Deletes an existing Kwitansi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionDeletekd($id,$view, $v)
    {
        $model=KwitansiDetail::findOne($id);
		// $view=$model->id_kwitansi
		$model->delete();

        return $this->redirect([$v,'id'=>$view]);
    }
    /**
     * Displays a single Kwitansi model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$modeltotal = Kwitansi::findOne($id);
		
		$model= (new \yii\db\Query())
		->select('*')
		->from('kwitansi')
		->where('id_kwitansi="'.$id.'"')
		->join('INNER JOIN', 'mak m', 'm.id_mak=kwitansi.mak') 
		->join('INNER JOIN', 'penerima p', 'p.id_penerima=kwitansi.kepada') 
		// ->orderBy('id DESC')
		->one();
		
		$modeldetail= (new \yii\db\Query())
		->select('*')
		->from('kwitansi_detail')
		->where('id_kwitansi="'.$id.'"')
		->join('INNER JOIN', 'satuan s', 's.id_satuan=kwitansi_detail.satuan') 
		// ->orderBy('id DESC')
		->all();
		
		
		
        $model2 = new KwitansiDetail();
		if ($model2->load(Yii::$app->request->post())) {
			$model2->id_kwitansi=$id;
			$model2->created_date=date('y-m-d');
			$model2->created_by='1';
			$model2->save();
			
            return $this->redirect(['view', 'id' => $model2->id_kwitansi]);
        } else {
			return $this->render('view', [
				'model' => $model,
				'model2' => $model2,
				'modeldetail'=>$modeldetail,
				'modeltotal'=>$modeltotal,
				// 'data' => $data,
			]);
		}
    }
	//view biaya perjalanan
	public function actionView2($id)
    {
		$modeltotal = Kwitansi::findOne($id);
		
		$model= (new \yii\db\Query())
		->select('*')
		->from('kwitansi')
		->where('id_kwitansi="'.$id.'"')
		->join('INNER JOIN', 'mak m', 'm.id_mak=kwitansi.mak') 
		// ->join('INNER JOIN', 'penerima p', 'p.id_penerima=kwitansi.kepada') 
		->join('INNER JOIN', 'pegawai p', 'p.id_pegawai=kwitansi.pegawai') 
		// ->orderBy('id DESC')
		->one();
		
		$modeldetail= (new \yii\db\Query())
		->select('*')
		->from('kwitansi_detail')
		->where('id_kwitansi="'.$id.'"')
		->join('INNER JOIN', 'satuan s', 's.id_satuan=kwitansi_detail.satuan') 
		// ->orderBy('id DESC')
		->all();
		
		
		
        $model2 = new KwitansiDetail();
        // $model3 = new Kwitansi();
		$model3 = Kwitansi::findOne($id);
		
		if(isset($_POST['KwitansiDetail']))
		{
			// $model->vid_durasi = $_POST['Video']['vid_durasi'];
			// $model2->attributes=$_POST['KwitansiDetail'];
			$model2->id_kwitansi=$id;
			$model2->kegiatan=$_POST['KwitansiDetail']['kegiatan'];
			$model2->volume=$_POST['KwitansiDetail']['volume'];
			$model2->satuan=$_POST['KwitansiDetail']['satuan'];
			$model2->harga=$_POST['KwitansiDetail']['harga'];
			$model2->created_date=date('y-m-d');
			$model2->created_by='1';
			$model2->save();
			// if($model2->save())
				// $model2->id_kwitansi=$id;
				// $model2->created_date=date('y-m-d');
				// $model2->created_by='1';
				
				
			return $this->redirect(['view2', 'id' => $model2->id_kwitansi]);
		}
		if(isset($_POST['Kwitansi']))
		{
			// $model->vid_durasi = $_POST['Video']['vid_durasi'];
			// $model3->attributes=$_POST['Kwitansi'];
			
			// if($model3->save())
			$model3->id_kwitansi=$id;
			$model3->no_spd=$_POST['Kwitansi']['no_spd'];
			$model3->tgl_spd=$_POST['Kwitansi']['tgl_spd'];
			$model3->uang_muka=$_POST['Kwitansi']['uang_muka'];
			$model3->save();
				
				
			return $this->redirect(['view2', 'id' => $model3->id_kwitansi]);
		}
		
		
		
		
		// if ($model2->load(Yii::$app->request->post()) && $model3->load(Yii::$app->request->post()) && Model::validateMultiple([$model2, $model3])) {

			// $model2->id_kwitansi=$id;
			// $model2->created_date=date('y-m-d');
			// $model2->created_by='1';
			// $model2->save();
			
			
			
			// $model3->no_spd=$_POST['Kwitansi']['no_spd'];
			// $model3->tgl_spd=$_POST['Kwitansi']['tgl_spd'];
			// $model3->save();
			
			
            // return $this->redirect(['view2', 'id' => $model2->id_kwitansi]);
        // }
		else {
			return $this->render('view2', [
				'model' => $model,
				'model2' => $model2,
				'model3' => $model3,
				'modeldetail'=>$modeldetail,
				'modeltotal'=>$modeltotal,
				// 'data' => $data,
			]);
		}
    }


	public function actionRiil($id,$riil)
    {
		$model = KwitansiDetail::findOne($id);
		$model->riil=$riil;
		$model->save();
		return $this->redirect(['view2', 'id' => $model->id_kwitansi]);
    }

   
	
	public function actionMak()
    {
        $model = new Mak();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create']);
			 // if($model['mak']==521211){
				// return $this->redirect(['view', 'id' => $model->id_kwitansi]);
			// }else{
				// return $this->redirect(['view2', 'id' => $model->id_kwitansi]);
			// }
        } else {
            return $this->render('_mak', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionSatuan($id)
    {
        $model = new Satuan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id'=>$id]);
        } else {
            return $this->render('_satuan', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionKegiatan()
    {
        $model = new Kegiatan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create']);
			 // if($model['mak']==521211){
				// return $this->redirect(['view', 'id' => $model->id_kwitansi]);
			// }else{
				// return $this->redirect(['view2', 'id' => $model->id_kwitansi]);
			// }
        } else {
            return $this->render('_kegiatan', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionPenerima()
    {
        $model = new Penerima();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create']);
			 // if($model['mak']==521211){
				// return $this->redirect(['view', 'id' => $model->id_kwitansi]);
			// }else{
				// return $this->redirect(['view2', 'id' => $model->id_kwitansi]);
			// }
        } else {
            return $this->render('_penerima', [
                'model' => $model,
            ]);
        }
    }
	public function actionPegawai()
    {
        $model = new Pegawai();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create']);
			 // if($model['mak']==521211){
				// return $this->redirect(['view', 'id' => $model->id_kwitansi]);
			// }else{
				// return $this->redirect(['view2', 'id' => $model->id_kwitansi]);
			// }
        } else {
            return $this->render('_penerima', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionUbahppn($id,$ppn)
    {
        
		$model = $this->findModel($id);
		$model->ppn=$ppn;
		$model->save(false);
		return $this->redirect(['view', 'id' => $model->id_kwitansi]);
    }
    
	
	public function actionReport($id) {
    // get your HTML raw content without any layouts or scripts
		// $content = $this->renderPartial('cetak');
		$modeltotal = Kwitansi::findOne($id);
		
		$model= (new \yii\db\Query())
		->select('*')
		->from('kwitansi')
		->where('id_kwitansi="'.$id.'"')
		->join('INNER JOIN', 'penerima p', 'p.id_penerima=kwitansi.kepada') 
		// ->orderBy('id DESC')
		->one();
		
		$modeldetail= (new \yii\db\Query())
		->select('*')
		->from('kwitansi_detail')
		->where('id_kwitansi="'.$id.'"')
		->join('INNER JOIN', 'satuan s', 's.id_satuan=kwitansi_detail.satuan') 
		// ->orderBy('id DESC')
		->all();
        $model2 = new KwitansiDetail();

		
		// $mpdf= new mPDF;
		// require_once __DIR__ . '/vendor/mpdf/mpdf/autoload.php';

		$mpdf = new \Mpdf\Mpdf();
		$mpdf->SetTitle('Kwitansi '.$model['mak'].' - '.number_format($model['total']) );
		// $mpdf->WriteHTML($this->renderPartial('cetak','id'=>$model->id_kwitansi,['model'=>$model]));
		$mpdf->WriteHTML($this->renderPartial('cetak',[
			'model' => $model,
			'model2' => $model2,
			'modeldetail'=>$modeldetail,
			'modeltotal'=>$modeltotal,
		]
		));
		$mpdf->Output('Kwitansi '.$model['mak'].' - '.number_format($model['total']).'.pdf','I');
		exit;
		
		// return the pdf output as per the destination setting
		// return $pdf->render(); 
	}
	public function actionReport2($id) {
    // get your HTML raw content without any layouts or scripts
		// $content = $this->renderPartial('cetak');
		$modeltotal = Kwitansi::findOne($id);
		
		$model= (new \yii\db\Query())
		->select('*')
		->from('kwitansi')
		->where('id_kwitansi="'.$id.'"')
		->join('INNER JOIN', 'mak m', 'm.id_mak=kwitansi.mak') 
		->join('INNER JOIN', 'kegiatan k', 'k.id_kegiatan=kwitansi.kegiatan') 
		// ->join('INNER JOIN', 'penerima p', 'p.id_penerima=kwitansi.kepada') 
		->join('INNER JOIN', 'pegawai p', 'p.id_pegawai=kwitansi.pegawai') 
		// ->orderBy('id DESC')
		->one();

		$modelJabatan= (new \yii\db\Query())
		->select('*')
		->from('jabatan')
		->where('id_pegawai="'.$model['id_pegawai'].'"')
		->one();
		
		$modeldetail= (new \yii\db\Query())
		->select('*')
		->from('kwitansi_detail')
		->where('id_kwitansi="'.$id.'" AND riil="1"')
		->join('INNER JOIN', 'satuan s', 's.id_satuan=kwitansi_detail.satuan') 
		// ->orderBy('id DESC')
		->all();
        $model2 = new KwitansiDetail();

		
		// $mpdf= new mPDF;
		// require_once __DIR__ . '/vendor/mpdf/mpdf/autoload.php';

		$mpdf = new \Mpdf\Mpdf();
		$mpdf->SetTitle('Kwitansi '.$model['mak'].' - '.number_format($model['total']));
		// $mpdf->WriteHTML($this->renderPartial('cetak','id'=>$model->id_kwitansi,['model'=>$model]));
		$mpdf->WriteHTML($this->renderPartial('cetak2',[
			'model' => $model,
			'model2' => $model2,
			'modeldetail'=>$modeldetail,
			'modeltotal'=>$modeltotal,
			'modelJabatan'=>$modelJabatan,
		]
		));
		$mpdf->Output('Kwitansi '.$model['mak'].' - '.number_format($model['total']).'.pdf','I');
		exit;
		
		
		// return the pdf output as per the destination setting
		// return $pdf->render(); 
	}


	public function actionSptjm($from,$to) {
    // get your HTML raw content without any layouts or scripts
		// $content = $this->renderPartial('cetak');
		
		$model= (new \yii\db\Query());
		$model	->select(['kwitansi.*', 'kegiatan.kode_kegiatan as kegiatan','mak.mak as mak', 'penerima.nama_penerima', 'penerima.nama_toko']) 
		->from('kwitansi')
		->where('tgl_kwitansi BETWEEN "'.$from.'" AND "'.$to.'"')
		->leftJoin('kegiatan', 'kegiatan.id_kegiatan = kwitansi.kegiatan')
		->leftJoin('mak', 'mak.id_mak = kwitansi.mak')
		->leftJoin('penerima', 'penerima.id_penerima = kwitansi.kepada');
		$command = $model->createCommand();
		$data = $command->queryAll();



		//SPTJM
		$model= ( (new \yii\db\Query())
					->select(['mak.nama_mak', 'mak.mak', 'mak.saldo', 
					'(SELECT sum(total) as total FROM kwitansi WHERE tgl_kwitansi BETWEEN "'.$_GET['from'].'" AND "'.$_GET['to'].'" AND mak=mak.id_mak) as total', 
					'(SELECT sum(total) as total FROM kwitansi WHERE tgl_kwitansi !="" AND mak=mak.id_mak) as total2']
					) 
					->from('kwitansi')
					->join('RIGHT JOIN','mak', 'mak.id_mak = kwitansi.mak')
					->orderby('mak.nama_mak')
					->groupby(['mak.id_mak'])
					);
		$command = $model->createCommand();
		$model = $command->queryAll();
		$total=0;
		$total2=0;
		$saldo=0;
		$total_persen=0;
		$nox=1;
		foreach($model as $db):


						$total+=$db['total'];
						$total2+=$db['total2'];
						$saldo+=$db['saldo'];
						$persen=($db['total2']/$db['saldo'])*100;
						$total_persen+=$persen;
			$nox++;
		endforeach;
		
		// $mpdf= new mPDF;
		// require_once __DIR__ . '/vendor/mpdf/mpdf/autoload.php';

		$mpdf = new \Mpdf\Mpdf();
		$mpdf->SetTitle('SPTJM');
		// $mpdf->WriteHTML($this->renderPartial('cetak','id'=>$model->id_kwitansi,['model'=>$model]));
		$mpdf->WriteHTML($this->renderPartial('cetak_sptjm',[
			'data'=>$data,
			'total'=>$total,
		]
		));
		$mpdf->Output('SPTJM.pdf','I');
		exit;
	}
    /**
     * Finds the Kwitansi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kwitansi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kwitansi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	public function nominal($uang)
	{
		$str=strlen($uang);
		$hasil='';
		if($uang==0)
		{
			$hasil='';
		}else{
			$str2=explode(',',number_format($uang));
			for($i=0;$i<count($str2);$i++)
			{
				// $hasil.=$i.''.strlen($str2[$i]);
				$temp=0;
				for($j=0;$j<strlen($str2[$i]);$j++)
				{
					$temp+=$str2[$i][$j];
					if(strlen($str2[$i])>2)
					{
						if( ($j==1)&&($str2[$i][$j]=='1')&&($str2[$i][$j+1]>'0') )
						{
							$hasil.=$this->ubahAngka($j+1, $str2[$i][$j+1], strlen($str2[$i]) );
							$hasil.='belas ';
							break;
						}else{
							$hasil.=$this->ubahAngka($j+1, $str2[$i][$j], strlen($str2[$i]) );
							$hasil.=$this->ubahSatuan($j+1, $str2[$i][$j], strlen($str2[$i]), $str2[$i] );
						}
					}else{
						if( (strlen($str2[$i])>1) )
						{
							if( ($j==0)&&($str2[$i][$j]=='1')&&($str2[$i][$j+1]>'0') )
							{
								$hasil.=$this->ubahAngka($j+1, $str2[$i][$j+1], strlen($str2[$i]) );
								$hasil.='belas ';
								break;
							}else{
								$hasil.=$this->ubahAngka($j+1, $str2[$i][$j], strlen($str2[$i]) );
								$hasil.=$this->ubahSatuan($j+1, $str2[$i][$j], strlen($str2[$i]), $str2[$i] );
							}
						}else{
							$hasil.=$this->ubahAngka($j+1, $str2[$i][$j], strlen($str2[$i]) );
							$hasil.=$this->ubahSatuan($j+1, $str2[$i][$j], strlen($str2[$i]), $str2[$i] );
						}
					}
				}

				if($str==6)
				{
					if($i==0)
					{
						$hasil.='Ribu ';
					}elseif($i==1){
						if($temp>0)
						{
							$hasil.='Rupiah ';
						}
					}else if($i==2){
						$hasil.='Rupiah ';
					}	
				}else{

					if($i==0)
					{
						$hasil.='Juta ';
					}elseif($i==1){
						if($temp>0)
						{
							$hasil.='Ribu ';
						}
					}else if($i==2){
						$hasil.='Rupiah ';
					}
				}
			}
		}
		
		return strtoupper($hasil);
	}
	
	public function ubahAngka($string, $angka, $len)
	{
		if($len>1)
		{
			if($len==2)
			{
				if($string<2)
				{	
					switch($angka)
					{
						case '1':$hasil='Se';break;
						case '2':$hasil='Dua ';break;
						case '3':$hasil='Tiga ';break;
						case '4':$hasil='Empat ';break;
						case '5':$hasil='Lima ';break;
						case '6':$hasil='Enam ';break;
						case '7':$hasil='Tujuh ';break;
						case '8':$hasil='Delapan ';break;
						case '9':$hasil='Sembilan ';break;
						default:$hasil='';break;
					}
				}else{	
					switch($angka)
					{
						case '1':$hasil='Satu ';break;
						case '2':$hasil='Dua ';break;
						case '3':$hasil='Tiga ';break;
						case '4':$hasil='Empat ';break;
						case '5':$hasil='Lima ';break;
						case '6':$hasil='Enam ';break;
						case '7':$hasil='Tujuh ';break;
						case '8':$hasil='Delapan ';break;
						case '9':$hasil='Sembilan ';break;
						default:$hasil='';break;
					}
				}
			}else
			{
				if($string<3)
				{	
					switch($angka)
					{
						case '1':$hasil='Se';break;
						case '2':$hasil='Dua ';break;
						case '3':$hasil='Tiga ';break;
						case '4':$hasil='Empat ';break;
						case '5':$hasil='Lima ';break;
						case '6':$hasil='Enam ';break;
						case '7':$hasil='Tujuh ';break;
						case '8':$hasil='Delapan ';break;
						case '9':$hasil='Sembilan ';break;
						default:$hasil='';break;
					}
				}else{	
					switch($angka)
					{
						case '1':$hasil='Satu ';break;
						case '2':$hasil='Dua ';break;
						case '3':$hasil='Tiga ';break;
						case '4':$hasil='Empat ';break;
						case '5':$hasil='Lima ';break;
						case '6':$hasil='Enam ';break;
						case '7':$hasil='Tujuh ';break;
						case '8':$hasil='Delapan ';break;
						case '9':$hasil='Sembilan ';break;
						default:$hasil='';break;
					}
				}
			}
		}else{
			switch($angka)
			{
				case '1':$hasil='Satu ';break;
				case '2':$hasil='Dua ';break;
				case '3':$hasil='Tiga ';break;
				case '4':$hasil='Empat ';break;
				case '5':$hasil='Lima ';break;
				case '6':$hasil='Enam ';break;
				case '7':$hasil='Tujuh ';break;
				case '8':$hasil='Delapan ';break;
				case '9':$hasil='Sembilan ';break;
				default:$hasil='';break;
			}
		}
		return $hasil;
	}
	
	public function ubahSatuan($string, $angka, $len, $uang)
	{
		if($len>1)
		{
			if($len==2)
			{
				if($angka==1)
				{
					switch($string)
					{
						case '1':$hasil='puluh ';break;
						case '2':$hasil=' ';break;
						default:$hasil='-';break;
					}
				}elseif($angka!=0){
					switch($string)
					{
						case '1':$hasil='puluh ';break;
						case '2':$hasil=' ';break;
						default:$hasil='-';break;
					}
				}else{
					$hasil='';
				}
			}else
			{
				if($angka==1)
				{
					switch($string)
					{
						case '1':$hasil='ratus ';break;
						case '2':$hasil='puluh ';break;
						case '3':$hasil='';break;
						default:$hasil='-';break;
					}
				}elseif($angka!=0){
					switch($string)
					{
						case '1':$hasil='ratus ';break;
						case '2':$hasil='puluh ';break;
						case '3':$hasil='';break;
						default:$hasil='-';break;
					}
				}else{
					$hasil='';
				}
			}
			return $hasil;
		}
	}
	function tgl_indo($tanggal){
		if(!$tanggal)
		{
			return '';
		}else{
			$bulan = array (
				1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
			$pecahkan = explode('-', $tanggal);
			
			// variabel pecahkan 0 = tanggal
			// variabel pecahkan 1 = bulan
			// variabel pecahkan 2 = tahun

			return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
		}
		
	}
	public function actionImport2()
    {
		$model = new Kwitansi();
		$id=Yii::$app->user->identity->id;
		// $inputFile= Url::base().'/upload/import_category.xlsx';
		// $inputFile= $_SERVER['DOCUMENT_ROOT'].Url::base().'/upload/import_kegiatan.xlsx';
		$inputFile= $_SERVER['DOCUMENT_ROOT'].Url::base().'/upload/import_kwitansi.xlsx';
		if ($model->load(Yii::$app->request->post())) {
			// $model->save(false);
			
			
			$model->attributes=$_POST['Kwitansi'];
			$itu=UploadedFile::getInstance($model,'file_excel');
			// $image=UploadedFile::getInstance($model, 'file');
			
			$path=$inputFile;
			
			$itu->saveAs($path);
			
			try{
			$inputFileType = \PHPExcel_IOFactory::identify($inputFile);
			$objReader = \PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFile);
			
			
			}catch(Exception $e)
			{
				die('Error');
			}
			$sheet = $objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow();
			$highestColumn = $sheet->getHighestColumn();
			
			for($row=2; $row<=$highestRow; $row++)
			{
				$rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
				
				// if($row==2)
				// {
					// continue;
				// }
				$kwi = new Kwitansi();
				$kwi_id= $rowData[0][0];
				$kwi->tgl_kwitansi= $rowData[0][1];
				$kwi->kegiatan= $rowData[0][2];
				$kwi->mak= $rowData[0][3];
				$kwi->keterangan= $rowData[0][4];
				$kwi->ppn= $rowData[0][5];
				$kwi->total= $rowData[0][6];
				$kwi->kepada= $rowData[0][7];
				$kwi->pegawai= $rowData[0][8];
				$kwi->created_date= date('y-m-d');
				$kwi->created_by= '1';
				$kwi->save(false);
				
				// print_r($cat->getErrors());

			}
				
			// echo '<pre>';
			// print_r($model);
			// exit;
			// echo '</pre>';
			
			return $this->redirect(['index']);	
        }else{
            return $this->render('import', [
                'model' => $model,
            ]);
        }
    }
	public function actionExport()
	{
		$query =Kwitansi::find()->all();
		// $query->from(['u' => User::tableName()]);
		// $query->innerJoin(['g' => UserCatItem::tableName()], 'g.user_id=u.id');

		// $query->select([
			// 'id' => 'id',
			// 'email' => 'u.email',
			// 'firstname' => 'u.firstname',
			// 'lastname' => 'u.lastname',
		// ]);
		// $query->limit(10);

		// Instantiate a new PHPExcel object
		$objPHPExcel = new \PHPExcel();
		// Set the active Excel worksheet to sheet 0
		$objPHPExcel->setActiveSheetIndex(0);
		// Initialise the Excel row number
		$rowCount = 1;

		foreach ($query as $row) {
			if ($rowCount == 1) {
				//start of printing column names as names of MySQL fields
				$column = 'A';
				foreach ($row as $attribute => $value) {
					$objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $attribute);
					$column++;
				}
				//end of adding column names
				$rowCount++;
			}

			$column = 'A';

			foreach ($row as $attribute => $value) {
				$objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $value);
				$column++;
			}
			$rowCount++;
		}

		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="kwitansi.xls"');
		header('Cache-Control: max-age=0');
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		Yii::$app->end();
	}
	public function actionDownload($from, $to)
    {

            $model = Kwitansi::find()->where(['between','tgl_kwitansi', $from, $to ])->all();
			// $model= (new \yii\db\Query())
			// ->select('*')
			// ->from('kwitansi')
			// ->where('id_kwitansi="'.$id.'"')
			// ->join('INNER JOIN', 'mak m', 'm.id_mak=kwitansi.mak') 
			// ->join('INNER JOIN', 'kegiatan k', 'k.id_kegiatan=kwitansi.kegiatan') 
			// ->join('INNER JOIN', 'penerima pen', 'pen.id_penerima=kwitansi.kepada') 
			// ->join('INNER JOIN', 'pegawai p', 'p.nip=kwitansi.pegawai') 
			// ->all();
			
	
            $objPHPExcel = new \PHPExcel();
            $stylehead = array(
                'alignment' => array(
                    'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ),
                'font'  => array(
						'bold'  => true,
						'size'  => 16,
						'name'  => 'Times New Rowman'
					)    
                );
			
			$no='1';
            $objPHPExcel->getActiveSheet()->setCellValue("A".$no ,"Buku Kas Umum")
                ->mergeCells('A1:G1')
                ->getStyle('A1')->applyFromArray($stylehead);
			
			$no++;
            $objPHPExcel->getActiveSheet()->setCellValue("A".$no ,"Bendahara Pengeluaran 2018")
                ->mergeCells('A2:G2')
                ->getStyle('A2')->applyFromArray($stylehead);
            $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
            
			$no++;
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$no ,"Kementerian");
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no ,": (025) Kementerian Agama");
            
			$no++;
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$no ,"Unit Organisasi");
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no ,": (04) Ditjen Pendidikan Islam");
            
			$no++;
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$no ,"Provinsi / Kota");
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no ,": (0900) Riau/ Pekanbaru");
            
			$no++;
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$no ,"Satuan Kerja");
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no ,": (424157) UIN SUSKA RIAU");
            
			$no++;
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$no ,"Revisi Ke");
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no ,"1 :");
			$no++;
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no ,"2 :");
			$no++;
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no ,"3 :");
            
			$no++;
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$no ,"Tahun Anggaran");
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no ,": (04) Ditjen Pendidikan Islam");
			
			$no++;
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$no ,"KPPN");
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no ,": (04) Ditjen Pendidikan Islam");

			$no++;
			$no++;
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$no ,"No");
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$no ,"Tanggal Kwitansi");
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$no ,"No Bukti");
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$no ,"Uraian");
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$no ,"Akun Belanja");
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$no ,"Debet");
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$no ,"Kredit");
			
			$no++;
			// $objPHPExcel->getActiveSheet()->setCellValue('B4',"Kode Kegiatan");
			// $objPHPExcel->getActiveSheet()->setCellValue('C4',"Kode Mak");
			// $objPHPExcel->getActiveSheet()->setCellValue('D4',"Keterngan");
            // $objPHPExcel->getActiveSheet()->setCellValue('A4',"NO. Identitas");
            // $objPHPExcel->getActiveSheet()->setCellValue('B4',"Nama");
            // $objPHPExcel->getActiveSheet()->setCellValue('C4',"Informasi Kontak");
            // $objPHPExcel->getActiveSheet()->setCellValue('D4',"Alamat");
            // $objPHPExcel->getActiveSheet()->setCellValue('E4',"Isi Pengaduan");
            // $objPHPExcel->getActiveSheet()->setCellValue('F4',"Status Pengaduan");
            // $objPHPExcel->getActiveSheet()->setCellValue('G4',"GeoJson");
            // $objPHPExcel->getActiveSheet()->setTitle('Data detail kwitansi');
            $i = 0;
            $x = $no;

            for ($col = 'A'; $col != 'H'; $col++) {
                $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
            }

			$nox=1;
            foreach ($model as $value) {
                // if ($model[$i]->pengaduan_status == 1) {
                    // $s = "Sudah Di Selesaikan";
                // }else {
                    // $s = "Belum Di Selesaikan";
                // }
				$mak = Mak::find()
					->where(['id_mak' => $model[$i]->mak ])
					->one();
				$keg = Kegiatan::find()
					->where(['id_kegiatan' => $model[$i]->kegiatan ])
					->one();
				$penerima = Penerima::find()
					->where(['id_penerima' => $model[$i]->kepada ])
					->one();
					
				$ket='';
				if($mak['mak']=='525115')
				{
					$ket='Dibayar ';
				}else{
					$ket='Dibayar kepada '.$penerima['nama_penerima'].' '.$penerima['nama_toko'].' ';
				}
						
					
                $objPHPExcel->getActiveSheet()->setCellValue('A'. $x,$nox);
                $objPHPExcel->getActiveSheet()->setCellValue('B'. $x,$model[$i]->tgl_kwitansi);
                $objPHPExcel->getActiveSheet()->setCellValue('C'. $x,'              '.$model[$i]->no_bukti);
                $objPHPExcel->getActiveSheet()->setCellValue('D'. $x,$ket.$model[$i]->keterangan);
                $objPHPExcel->getActiveSheet()->setCellValue('E'. $x,$mak['mak']);
                $objPHPExcel->getActiveSheet()->setCellValue('F'. $x,'');
                $objPHPExcel->getActiveSheet()->setCellValue('G'. $x,''.$model[$i]->total );
				
                $x++;
                $i++;
				$no++;
				$nox++;
            }
			
			
			$no++;
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$no ,"No");
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$no ,"Akun Belanja");
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$no ,"Keterangan");
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$no ,"Pagu");
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$no ,"Realisasi Per BKU");
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$no ,"Total Realisasi");
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$no ,"Persentase Total Realisasi");
			
			$no++;
			$model= ( (new \yii\db\Query())
			->select(['mak.nama_mak', 'mak.mak', 'mak.saldo', 'sum(kwitansi.total) as total', '(SELECT sum(total) as total FROM kwitansi WHERE tgl_kwitansi !="" AND mak=mak.id_mak) as total2']) 
			->from('kwitansi')
			// ->where('tgl_kwitansi !=""')
			->where('tgl_kwitansi BETWEEN "'.$_GET['from'].'" AND "'.$_GET['to'].'"')
			->leftJoin('kegiatan', 'kegiatan.id_kegiatan = kwitansi.kegiatan')
			->leftJoin('mak', 'mak.id_mak = kwitansi.mak')
			->groupby(['kwitansi.mak'])
			);


			$model= ( (new \yii\db\Query())
						->select(['mak.nama_mak', 'mak.mak', 'mak.saldo', 
						'(SELECT sum(total) as total FROM kwitansi WHERE tgl_kwitansi BETWEEN "'.$_GET['from'].'" AND "'.$_GET['to'].'" AND mak=mak.id_mak) as total', 
						'(SELECT sum(total) as total FROM kwitansi WHERE tgl_kwitansi !="" AND mak=mak.id_mak) as total2']
						) 
						->from('kwitansi')
						->join('RIGHT JOIN','mak', 'mak.id_mak = kwitansi.mak')
						->orderby('mak.nama_mak')
						->groupby(['mak.id_mak'])
						);
			$command = $model->createCommand();
			$model = $command->queryAll();
			$total=0;
			$total2=0;
			$saldo=0;
			$total_persen=0;
			$nox=1;
			foreach($model as $db):


							$total+=$db['total'];
							$total2+=$db['total2'];
							$saldo+=$db['saldo'];
							$persen=($db['total2']/$db['saldo'])*100;
							$total_persen+=$persen;
				
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$no ,$nox);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$no ,$db['mak']);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$no ,$db['nama_mak']);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$no ,number_format($db['saldo']) );
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$no ,number_format($db['total']) );
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$no ,number_format($db['total2']) );
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$no ,number_format($persen,2).'%' );
				$nox++;
				$no++;
			endforeach;
			
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$no ,'');
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$no ,'');
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$no ,'Jumlah');
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$no ,number_format($saldo) );
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$no ,number_format($total) );
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$no ,number_format($total2) );
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$no ,number_format( ($total2/$saldo)*100 ,2).'%' );
			
			
			$no++;
			$no++;
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$no ,"Pekanbaru");
			
			$no++;
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$no ,"Kepala Bagian Akademik");
			
			$no++;
			$no++;
			$no++;
			$no++;
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$no ,"Rinayeni, S.Sos");
			$no++;
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$no ,"NIP. 19690618 199102 2 001");

             
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Kwitansi Detail - '.date("Y-m-d H:i:s").'.xls"');
            header('Cache-Control: max-age=0');
            header('Cache-Control: max-age=1');
            
             
            $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
        

    }
	
}
