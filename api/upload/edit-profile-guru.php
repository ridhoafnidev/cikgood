 <?php

include 'dbConfig.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {

 $DefaultId 	= 0;

 $id 				= $_POST['id_guru'];
 $nama_guru 		= $_POST['nama_guru'];
 $photo_profile 	= $_POST['photo_profile'];
 $email 			= $_POST['email'];
 $no_hp 			= $_POST['no_hp'];
 $jk 				= $_POST['jk'];;
 $tgl_lahir 		= $_POST['tgl_lahir'];
 $provinsi_ktp 		= $_POST['provinsi_ktp'];
 $kota_ktp 		    = $_POST['kota_ktp'];
 $kecamatan_ktp 	= $_POST['kecamatan_ktp'];
 $alamat_ktp        = $_POST['alamat_ktp'];
 $provinsi_domisili = $_POST['provinsi_domisili'];
 $kota_domisili 	= $_POST['kota_domisili'];
 $kecamatan_domisili= $_POST['kecamatan_domisili'];
 $alamat_domisili   = $_POST['alamat_domisili'];
 $biodata           = $_POST['biodata'];
 $lat               = $_POST['lat'];
 $lng               = $_POST['lng'];
 
 // $ImageName = $_POST['image_tag'];

 $GetOldIdSQL ="SELECT id_guru FROM guru_profil ORDER BY id_guru ASC";
 
 $Query = mysqli_query($conn,$GetOldIdSQL);
 
 while($row = mysqli_fetch_array($Query)){
 
 $DefaultId = $row['id_guru'];
 
 }
 
 $ServerURL = "$id.jpg";
 
 $ImagePath = "../../backend/web/upload/images/guru/profile/$id.jpg";

 $UpdateSQL = "UPDATE guru_profil SET nama_guru = '$nama_guru', photo_profile = '$ServerURL', email = '$email', no_hp ='$no_hp', 
 tgl_lahir= '$tgl_lahir', jk = '$jk', provinsi_ktp = '$provinsi_ktp', kota_ktp = '$kota_ktp', kecamatan_ktp = '$kecamatan_ktp', 
 alamat_ktp = '$alamat_ktp', provinsi_domisili = '$provinsi_domisili', kota_domisili = '$kota_domisili', kecamatan_domisili = '$kecamatan_domisili', 
 alamat_domisili = '$alamat_domisili', biodata = '$biodata', lat = '$lat', lng = '$lng' WHERE id_guru ='$id' ";

//  $InsertSQL = "insert into guru_profil(nama_guru, photo_profile, email, no_hp ) values ('$nama_guru', '$ServerURL', '$email', '$no_hp')";

 
 if(mysqli_query($conn, $UpdateSQL)){

 file_put_contents($ImagePath,base64_decode($photo_profile));

 echo "Selamat ya.!";
 }else{
 	echo "Maaf ya.!";
 }
 
 mysqli_close($conn);
 }else{
 echo "Coba lagi ya.!";
 
 }

?>