<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\User;
use app\models\Laporan;
use yii\rest\Controller;
use yii\web\Response;
use yii\web\UploadedFile;


class LaporanController extends Controller
{

	/**
	 * Aplikasi web ingin menampilkan semua laporan di google maps beserta marker
	 */
    public function actionGetAllMarkers(){
        Yii::$app->response->format = Response::FORMAT_XML;

        $response = null;

        if (Yii::$app->request->isGet){
            $sql = "SELECT tb_laporan.id_laporan, tb_laporan.id_pelapor, tb_pelapor.nama as nama_pelapor, tb_laporan.judul, tb_laporan.lokasi, tb_laporan.lat, tb_laporan.lng, tb_laporan.ket, tb_laporan.foto, tb_kategori.judul as kategori, tb_laporan.created_at, tb_laporan.updated_at
                    FROM tb_laporan INNER JOIN tb_pelapor, tb_kategori WHERE tb_laporan.id_pelapor = tb_pelapor.id_pelapor AND tb_laporan.id_kategori = tb_kategori.id_kategori ORDER BY id_laporan DESC";

            $response = Yii::$app->db->createCommand($sql)->queryAll();

            //$this->layout='mainxml';
			 // Parsing Karakter-Karakter Khusus
			 function parseToXML($htmlStr)
			 {
				  $xmlStr=str_replace('<','<',$htmlStr);
				  $xmlStr=str_replace('>','>',$xmlStr);
				  $xmlStr=str_replace('"','"',$xmlStr);
				  $xmlStr=str_replace("'","'",$xmlStr);
				  $xmlStr=str_replace("&",'&',$xmlStr);
				  return $xmlStr;
			 }
		 
			
		 
			 // Header File XML
			 header("Content-type: text/xml");
		 
			 // Parent node XML
			 echo '<markers>';
		 
			 // Iterasi baris, masing-masing menghasilkan node-node XML
			foreach($response as $db)
			{
				  // Menambahkan ke node dokumen XML
				  echo '<marker ';
				  echo 'id_laporan="' . parseToXML($db['id_laporan']) . '" ';
				  echo 'id_pelapor="' . parseToXML($db['id_pelapor']) . '" ';
                  echo 'nama_pelapor="' . parseToXML($db['nama_pelapor']) . '" ';
                  echo 'judul="' . parseToXML($db['judul']) . '" ';
                  echo 'lat="' . parseToXML($db['lat']) . '" ';
                  echo 'lng="' . parseToXML($db['lng']) . '" ';
                  echo 'ket="' . parseToXML($db['ket']) . '" ';
                  echo 'foto="' . parseToXML($db['foto']) . '" ';
                  echo 'kategori="' . parseToXML($db['kategori']) . '" ';
				  $date = date_create($db['created_at']); 
				  echo 'waktu="' . date_format($date, 'j F Y, \p\u\k\u\l G:i') . '" ';
				 
				  echo '/>';
			 }
		 
			 // Akhir File XML (tag penutup node)
			 echo '</markers>';
        }

       
	}

	/**
	 * Masyarakat melakukan aksi tambah laporan
	 */
	
	public function actionCreate(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isPost){
			$data = Yii::$app->request->post();
			$laporan = new Laporan();
			$laporan->id_pelapor = $data['id_pelapor'];
			$laporan->judul = $data['judul'];
			$laporan->lokasi = $data['lokasi'];
			$laporan->lat = $data['lat'];
			$laporan->lng = $data['lng'];
			$laporan->ket = $data['ket'];
			$laporan->foto = $data['foto'];
			$laporan->id_kategori = $data['id_kategori'];

			if ($laporan->save()){
				$response['code'] = 200;
				$response['id_laporan'] = $laporan->id_laporan;
				$response['message'] = $laporan->judul." berhasil dilaporkan.";
			} else {
				$response['code'] = 500;
				$response['id_laporan'] = '';
				$response['message'] = "Gagal mengirim laporan.";
			}
		}

		return $response;
	}

	/**
	 * Masyarakat melihat histori laporan
	 */

	public function actionLihatLaporanku($id_pelapor){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$sql = "SELECT tb_laporan.id_laporan, tb_laporan.id_pelapor, tb_pelapor.nama as nama_pelapor, tb_laporan.judul, tb_laporan.lokasi, tb_laporan.lat, tb_laporan.lng, tb_laporan.ket, tb_laporan.foto, tb_kategori.judul as kategori, tb_laporan.status, tb_laporan.created_at, tb_laporan.updated_at
					FROM tb_laporan INNER JOIN tb_pelapor, tb_kategori WHERE tb_laporan.id_pelapor = tb_pelapor.id_pelapor AND tb_laporan.id_kategori = tb_kategori.id_kategori AND tb_laporan.id_pelapor = '$id_pelapor' ORDER BY id_laporan DESC";
			
			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	/**
	 * Melihat laporan by id_kategori
	 */

	public function actionFindAllByIdKategori($id_kategori){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$sql = "SELECT tb_laporan.id_laporan, tb_laporan.id_pelapor, tb_pelapor.nama as nama_pelapor, tb_laporan.judul, tb_laporan.lokasi, tb_laporan.lat, tb_laporan.lng, tb_laporan.ket, tb_laporan.foto, tb_kategori.judul as kategori, tb_laporan.created_at, tb_laporan.updated_at
					FROM tb_laporan INNER JOIN tb_pelapor, tb_kategori WHERE tb_laporan.id_pelapor = tb_pelapor.id_pelapor AND tb_laporan.id_kategori = tb_kategori.id_kategori AND tb_laporan.id_kategori = '$id_kategori' ORDER BY id_laporan DESC";
			
			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	/**
	 * Melihat laporan by id_pelapor
	 */

	public function actionFindAllByIdPelapor($id_pelapor){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$sql = "SELECT tb_laporan.id_laporan, tb_laporan.id_pelapor, tb_pelapor.nama as nama_pelapor, tb_laporan.judul, tb_laporan.status, tb_laporan.lokasi, tb_laporan.lat, tb_laporan.lng, tb_laporan.ket, tb_laporan.foto, tb_kategori.judul as kategori, tb_laporan.created_at, tb_laporan.updated_at
					FROM tb_laporan INNER JOIN tb_pelapor, tb_kategori WHERE tb_laporan.id_pelapor = tb_pelapor.id_pelapor AND tb_laporan.id_kategori = tb_kategori.id_kategori AND tb_laporan.id_pelapor = '$id_pelapor' ORDER BY id_laporan DESC";
			
			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionFindByIdLaporan($id_laporan){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$sql = "SELECT tb_laporan.id_laporan, tb_laporan.id_pelapor, tb_pelapor.nama as nama_pelapor, tb_laporan.judul, tb_laporan.status, tb_laporan.lokasi, tb_laporan.lat, tb_laporan.lng, tb_laporan.ket, tb_laporan.foto, tb_kategori.judul as kategori, tb_laporan.created_at, tb_laporan.updated_at
					FROM tb_laporan INNER JOIN tb_pelapor, tb_kategori WHERE tb_laporan.id_pelapor = tb_pelapor.id_pelapor AND tb_laporan.id_kategori = tb_kategori.id_kategori AND tb_laporan.id_laporan = '$id_laporan'";
			
			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	public function actionFindAllByIdPelaporAndDate($id_pelapor, $date){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$sql = "SELECT tb_laporan.id_laporan, tb_laporan.id_pelapor, tb_pelapor.nama as nama_pelapor, tb_laporan.judul, tb_laporan.status, tb_laporan.lokasi, tb_laporan.lat, tb_laporan.lng, tb_laporan.ket, tb_laporan.foto, tb_kategori.judul as kategori, tb_laporan.created_at, tb_laporan.updated_at
					FROM tb_laporan INNER JOIN tb_pelapor, tb_kategori WHERE tb_laporan.id_pelapor = tb_pelapor.id_pelapor AND tb_laporan.id_kategori = tb_kategori.id_kategori AND tb_laporan.id_pelapor = '$id_pelapor' AND DATE_FORMAT(tb_laporan.created_at, '%Y-%m-%d') = '$date' ORDER BY id_laporan DESC";
			
			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}

	/**
	 * Polisi merubah status laporan menjadi selesai
	 */

	 public function actionUpdateStatusSelesai(){
		 Yii::$app->response->format = Response::FORMAT_JSON;

		 $response = null;
		 if (Yii::$app->request->isPost){
			 $data = Yii::$app->request->post();

			 $id_laporan = $data['id_laporan'];
			 $status = Laporan::SELESAI;

			 $laporan = Laporan::find()->where(['id_laporan' => $id_laporan])->one();
			 $laporan->status = $status;

			 
			 if ($laporan->update(false)){
				 $response['code'] = 200;
				 $response['message'] = "Laporan ".$laporan->judul."sudah ".$laporan->status;
			 } else {
				$response['code'] = 500;
				$response['message'] = "Gagal mengupdate status laporan";
			 }

			//  var_dump($laporan);
			//  exit();
		 }

		 return $response;
	 }

	 /**
	 * Polisi merubah status laporan menjadi ditolak
	 */

	public function actionUpdateStatusDitolak(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;
		if (Yii::$app->request->isPost){
			$data = Yii::$app->request->post();

			$id_laporan = $data['id_laporan'];
			$status = Laporan::DITOLAK;

			$laporan = Laporan::find()->where(['id_laporan' => $id_laporan])->one();
			$laporan->status = $status;

			
			if ($laporan->update(false)){
				$response['code'] = 200;
				$response['message'] = "Laporan ".$laporan->judul."sudah ".$laporan->status;
			} else {
			   $response['code'] = 500;
			   $response['message'] = "Gagal mengupdate status laporan";
			}

		   //  var_dump($laporan);
		   //  exit();
		}

		return $response;
	}

	/**
	 * Polisi merubah status laporan menjadi diterima
	 */

	public function actionUpdateStatusDiterima(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;
		if (Yii::$app->request->isPost){
			$data = Yii::$app->request->post();

			$id_laporan = $data['id_laporan'];
			$status = Laporan::DITERIMA;

			$laporan = Laporan::find()->where(['id_laporan' => $id_laporan])->one();
			$laporan->status = $status;

			
			if ($laporan->update(false)){
				$response['code'] = 200;
				$response['message'] = "Laporan ".$laporan->judul."sudah ".$laporan->status;
			} else {
			   $response['code'] = 500;
			   $response['message'] = "Gagal mengupdate status laporan";
			}

		   //  var_dump($laporan);
		   //  exit();
		}

		return $response;
	}

	public function actionFindAllTerbaruNotDitolak(){
		Yii::$app->response->format = Response::FORMAT_JSON;

		$response = null;

		if (Yii::$app->request->isGet){
			
			$sql = "SELECT tb_laporan.id_laporan, tb_laporan.id_pelapor, tb_pelapor.nama as nama_pelapor, tb_laporan.judul, tb_laporan.lokasi, tb_laporan.lat, tb_laporan.lng, tb_laporan.ket, tb_laporan.foto, tb_kategori.judul as kategori, tb_laporan.status, tb_laporan.created_at, tb_laporan.updated_at
					FROM tb_laporan INNER JOIN tb_pelapor, tb_kategori WHERE tb_laporan.id_pelapor = tb_pelapor.id_pelapor AND tb_laporan.id_kategori = tb_kategori.id_kategori AND tb_laporan.status != 'Ditolak' ORDER BY id_laporan DESC";
			
			$response['master'] = Yii::$app->db->createCommand($sql)->queryAll();
		}

		return $response;
	}	
	

}