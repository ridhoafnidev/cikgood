 <?php

include 'dbConfig.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
 $DefaultId 	= 0;
 
 $pemesanan_id 			= $_POST['pemesanan_id'];
 $bukti_transfer 		= $_POST['bukti_transfer'];
 $jumlah_transfer 		= $_POST['jumlah_transfer'];
 $total 				= $_POST['total'];
 $tanggal_upload 		= $_POST['tanggal_upload'];
 
 // $ImageName = $_POST['image_tag'];

 $GetOldIdSQL ="SELECT id_pembayaran FROM tbl_pembayaran ORDER BY id_pembayaran ASC";
 
 $Query = mysqli_query($conn,$GetOldIdSQL);
 
 while($row = mysqli_fetch_array($Query)){
 
 $DefaultId = $row['id_pembayaran'];
 }
 
 $ImagePath = "../../backend/web/upload/images/pembayaran/$DefaultId.jpg";
 
 $ServerURL = "$DefaultId.jpg";

  // $UpdateSQL = "UPDATE guru_profil SET nama = '$nama', photo_profile = '$ServerURL', email = '$email', no_hp ='$no_hp' , password = '$password', tgl_lahir = '$tgl_lahir', jk = '$jk', provinsi_ktp = '$provinsi_ktp', kota_ktp = '$kota_ktp', kecamatan_ktp = '$kecamatan_ktp', alamat_ktp = '$alamat_ktp', provinsi_domisili = '$provinsi_domisili', kota_domisili = '$kota_domisili', kecamatan_domisili = '$kecamatan_domisili', alamat_domisili = '$alamat_domisili', biodata = '$biodata', status = 'Belum Terverifikasi' WHERE id_guru ='$id_guru' ";
 
 $InsertSQL = "insert into tbl_pembayaran (pemesanan_id, bukti_transfer, jumlah_transfer, total, tanggal_upload) values ('$pemesanan_id', '$ServerURL', '$jumlah_transfer', '$total', '$tanggal_upload')";
 
 // $InsertSQL = "insert into guru_profil (nama, photo_profile, email, no_hp, password, tgl_lahir, jk) values ('$nama', '$ServerURL', '$email', '$no_hp', '$password', '$tgl_lahir', '$jk')";

 if(mysqli_query($conn, $UpdateSQL)){

 file_put_contents($ImagePath,base64_decode($bukti_transfer));

 echo "Berhasil...";
 }
 
 mysqli_close($conn);
 }else{
 echo "Please Try Again";
 
 }

?>