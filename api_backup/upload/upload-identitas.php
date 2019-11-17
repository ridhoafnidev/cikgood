 <?php

include 'dbConfig.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {

 $DefaultId 	= 0;

 $guru_id 				= $_POST['guru_id'];
 $nomor_ktp 			= $_POST['nomor_ktp'];
 $photo_ktp 			= $_POST['photo_ktp'];
 $npwp 					= $_POST['npwp'];
 $photo_npwp 			= $_POST['photo_npwp'];
 $nama_bank 			= $_POST['nama_bank'];
 $nomor_rekening 		= $_POST['nomor_rekening'];
 $nama_pemilik_rekening	= $_POST['nama_pemilik_rekening'];
 
 // $ImageName = $_POST['image_tag'];

 $GetOldIdSQL ="SELECT id_identitas FROM guru_identitas ORDER BY id_identitas ASC";
 
 $Query = mysqli_query($conn,$GetOldIdSQL);
 
 while($row = mysqli_fetch_array($Query)){
 
 $DefaultId = $nomor_ktp;
 $DefaultNama= $npwp;
 }
 
 $ImagePathKtp = "../../backend/web/upload/images/guru/identitas/$DefaultId.jpg";
 $ImagePathNpwp = "../../backend/web/upload/images/guru/identitas/$DefaultNama.jpg";
 
 $ServerURLKtp = "$DefaultId.jpg";
 $ServerURLNpwp = "$DefaultNama.jpg";

  // $UpdateSQL = "UPDATE guru_profil SET nama = '$nama', photo_profile = '$ServerURL', email = '$email', no_hp ='$no_hp' , password = '$password', tgl_lahir = '$tgl_lahir', jk = '$jk', provinsi_ktp = '$provinsi_ktp', kota_ktp = '$kota_ktp', kecamatan_ktp = '$kecamatan_ktp', alamat_ktp = '$alamat_ktp', provinsi_domisili = '$provinsi_domisili', kota_domisili = '$kota_domisili', kecamatan_domisili = '$kecamatan_domisili', alamat_domisili = '$alamat_domisili', biodata = '$biodata', status = 'Belum Terverifikasi' WHERE id_guru ='$id_guru' ";
 
 $InsertSQL = "insert into guru_identitas (guru_id, nomor_ktp, photo_ktp, npwp, photo_npwp, nama_bank, nomor_rekening, nama_pemilik_rekening) values ('$guru_id', '$nomor_ktp', '$ServerURLKtp', '$npwp', '$ServerURLNpwp', '$nama_bank', '$nomor_rekening', '$nama_pemilik_rekening')";

 if(mysqli_query($conn, $InsertSQL)){

 file_put_contents($ImagePathKtp,base64_decode($photo_ktp));
 file_put_contents($ImagePathNpwp,base64_decode($photo_npwp));

 echo "Berhasil disimpan...";
 }
 
 mysqli_close($conn);
 }else{
 echo "Please Try Again";
 
 }

?>