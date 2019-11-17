 <?php

include 'dbConfig.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
 $DefaultId 	= 0;
 
 $id_guru 			= $_POST['id_guru'];
 $nama 				= $_POST['nama'];
 $ImageData 		= $_POST['photo_profile'];
 $email 			= $_POST['email'];
 $no_hp 			= $_POST['no_hp'];
 $pass 				= $_POST['password'];
 $password			= sha1($pass);
 $tgl_lahir 		= $_POST['tgl_lahir'];
 $jk 				= $_POST['jk'];
 $provinsi_ktp 		= $_POST['provinsi_ktp'];
 $kota_ktp 			= $_POST['kota_ktp'];
 $kecamatan_ktp 	= $_POST['kecamatan_ktp'];
 $alamat_ktp 		= $_POST['alamat_ktp'];
 $provinsi_domisili = $_POST['provinsi_domisili'];
 $kota_domisili 	= $_POST['kota_domisili'];
 $kecamatan_domisili= $_POST['kecamatan_domisili'];
 $alamat_domisili 	= $_POST['alamat_domisili'];
 $biodata 			= $_POST['biodata'];

 
 // $ImageName = $_POST['image_tag'];

 $GetOldIdSQL ="SELECT id_guru FROM guru_profil ORDER BY id_guru ASC";
 
 $Query = mysqli_query($conn,$GetOldIdSQL);
 
 while($row = mysqli_fetch_array($Query)){
 
 $DefaultId = $row['id_guru'];
 }
 
 $ImagePath = "../../backend/web/upload/images/guru/profil/$DefaultId.jpg";
 
 $ServerURL = "$DefaultId.jpg";

  $UpdateSQL = "UPDATE guru_profil SET nama = '$nama', photo_profile = '$ServerURL', email = '$email', no_hp ='$no_hp' , password = '$password', tgl_lahir = '$tgl_lahir', jk = '$jk', provinsi_ktp = '$provinsi_ktp', kota_ktp = '$kota_ktp', kecamatan_ktp = '$kecamatan_ktp', alamat_ktp = '$alamat_ktp', provinsi_domisili = '$provinsi_domisili', kota_domisili = '$kota_domisili', kecamatan_domisili = '$kecamatan_domisili', alamat_domisili = '$alamat_domisili', biodata = '$biodata', status = 'Belum Terverifikasi' WHERE id_guru ='$id_guru' ";
 
 // $InsertSQL = "insert into guru_profil (nama, photo_profile, email, no_hp, password, tgl_lahir, jk, provinsi_ktp, kota_ktp, kecamatan_ktp, alamat_ktp, provinsi_domisili, kota_domisili, kecamatan_domisili, alamat_domisili, biodata, status) values ('$nama', '$ServerURL', '$email', '$no_hp', '$password', '$tgl_lahir', '$jk', '$provinsi_ktp','$kota_ktp','$kecamatan_ktp', '$alamat_ktp', '$provinsi_domisili', '$kota_domisili', '$kecamatan_domisili', '$alamat_domisili', '$biodata', 'Belum Terverifikasi')";
 
 // $InsertSQL = "insert into guru_profil (nama, photo_profile, email, no_hp, password, tgl_lahir, jk) values ('$nama', '$ServerURL', '$email', '$no_hp', '$password', '$tgl_lahir', '$jk')";

 if(mysqli_query($conn, $UpdateSQL)){

 file_put_contents($ImagePath,base64_decode($ImageData));

 echo "Your Image Has Been Uploaded.";
 }
 
 mysqli_close($conn);
 }else{
 echo "Please Try Again";
 
 }

?>