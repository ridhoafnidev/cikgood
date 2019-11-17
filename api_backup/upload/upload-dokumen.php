 <?php

include 'dbConfig.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {

 $DefaultId 	= 0;

 $guru_id 				= $_POST['guru_id'];
 $jenis_dokumen 		= $_POST['jenis_dokumen'];
 $nama_dokumen 			= $_POST['nama_dokumen'];
 $tahun					= $_POST['tahun'];
 $ImageData 			= $_POST['photo_dokumen'];
 
 // $ImageName = $_POST['image_tag'];

 $GetOldIdSQL ="SELECT id_dokumen FROM guru_dokumen ORDER BY id_dokumen ASC";
 
 $Query = mysqli_query($conn,$GetOldIdSQL);
 
 while($row = mysqli_fetch_array($Query)){
 
 $DefaultId = $row['id_dokumen'];
 }
 
 $ImagePath = "../../backend/web/upload/images/guru/dokumen/$DefaultId.jpg";
 
 $ServerURL = "$DefaultId.jpg";

  // $UpdateSQL = "UPDATE guru_profil SET nama = '$nama', photo_profile = '$ServerURL', email = '$email', no_hp ='$no_hp' , password = '$password', tgl_lahir = '$tgl_lahir', jk = '$jk', provinsi_ktp = '$provinsi_ktp', kota_ktp = '$kota_ktp', kecamatan_ktp = '$kecamatan_ktp', alamat_ktp = '$alamat_ktp', provinsi_domisili = '$provinsi_domisili', kota_domisili = '$kota_domisili', kecamatan_domisili = '$kecamatan_domisili', alamat_domisili = '$alamat_domisili', biodata = '$biodata', status = 'Belum Terverifikasi' WHERE id_guru ='$id_guru' ";
 
 $InsertSQL = "insert into guru_dokumen (guru_id, jenis_dokumen, nama_dokumen, tahun, photo_dokumen) values ('$guru_id', '$jenis_dokumen', '$nama_dokumen', '$tahun', '$ServerURL')";

 if(mysqli_query($conn, $InsertSQL)){

 file_put_contents($ImagePath,base64_decode($ImageData));

 echo "Berhasil disimpan...";
 }else{
 	echo "Gagal menyimpan...";
 }
 
 mysqli_close($conn);
 }else{
 echo "Please Try Again";
 
 }

?>