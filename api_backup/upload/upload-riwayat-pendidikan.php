 <?php

include 'dbConfig.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {

 $DefaultId 	= 0;

 $guru_id 				= $_POST['guru_id'];
 $gelar 				= $_POST['gelar'];
 $jenis_institusi 		= $_POST['jenis_institusi'];
 $nama_institusi 		= $_POST['nama_institusi'];
 $jurusan 				= $_POST['jurusan'];
 $tahun_masuk 			= $_POST['tahun_masuk'];
 $tahun_selesai 		= $_POST['tahun_selesai'];
 $ImageData 			= $_POST['photo_ijazah'];
 
 // $ImageName = $_POST['image_tag'];

 $GetOldIdSQL ="SELECT id_riwayat_pendidikan FROM guru_riwayat_pendidikan ORDER BY id_riwayat_pendidikan ASC";
 
 $Query = mysqli_query($conn,$GetOldIdSQL);
 
 while($row = mysqli_fetch_array($Query)){
 
 $DefaultId = $row['id_riwayat_pendidikan'];
 }
 
 $ImagePath = "../../backend/web/upload/images/guru/ijazah/$DefaultId.jpg";
 
 $ServerURL = "$DefaultId.jpg";

  // $UpdateSQL = "UPDATE guru_profil SET nama = '$nama', photo_profile = '$ServerURL', email = '$email', no_hp ='$no_hp' , password = '$password', tgl_lahir = '$tgl_lahir', jk = '$jk', provinsi_ktp = '$provinsi_ktp', kota_ktp = '$kota_ktp', kecamatan_ktp = '$kecamatan_ktp', alamat_ktp = '$alamat_ktp', provinsi_domisili = '$provinsi_domisili', kota_domisili = '$kota_domisili', kecamatan_domisili = '$kecamatan_domisili', alamat_domisili = '$alamat_domisili', biodata = '$biodata', status = 'Belum Terverifikasi' WHERE id_guru ='$id_guru' ";
 
 $InsertSQL = "insert into guru_riwayat_pendidikan (guru_id, gelar, jenis_institusi, nama_institusi, jurusan, tahun_masuk, tahun_selesai, photo_ijazah) values ('$guru_id', '$gelar', '$jenis_institusi', '$nama_institusi', '$jurusan', '$tahun_masuk', '$tahun_selesai', '$ServerURL')";

 if(mysqli_query($conn, $InsertSQL)){

 file_put_contents($ImagePath,base64_decode($ImageData));

 echo "Your Image Has Been Uploaded.";
 }
 
 mysqli_close($conn);
 }else{
 echo "Please Try Again";
 
 }

?>