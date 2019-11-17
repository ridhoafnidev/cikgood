 <?php

include 'dbConfig.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {

 $DefaultId 	= 0;

 $id 				= $_POST['id'];
 $nama 				= $_POST['nama'];
 $photo 		    = $_POST['photo'];
 $email 			= $_POST['email'];
 $no_hp 			= $_POST['no_hp'];
 $jk 				= $_POST['jk'];;
 $nisn 			    = $_POST['nisn'];
 $kelas 			= $_POST['kelas'];
 $nama_sekolah 		= $_POST['nama_sekolah'];
 
 // $ImageName = $_POST['image_tag'];

 $GetOldIdSQL ="SELECT id FROM murid ORDER BY id ASC";
 
 $Query = mysqli_query($conn,$GetOldIdSQL);
 
 while($row = mysqli_fetch_array($Query)){
 
 $DefaultId = $row['id'];
 }
 
 $ImagePath = "http://arslyn.com/cikgood/backend/web/upload/images/murid/profile/$DefaultId.jpg";
 
 $ServerURL = "$DefaultId.jpg";

 $UpdateSQL = "UPDATE murid SET nama = '$nama', no_hp = '$no_hp', jk = '$jk', nisn ='$nisn', kelas= '$kelas', nama_sekolah = '$nama_sekolah', photo = '$photo' WHERE id ='$id' ";
 

//  $InsertSQL = "insert into murid (nama, no_hp, email, password, alamat, lat, lng, jk, nisn, kelas, nama_sekolah, photo) values ('$nama', '$no_hp', '$email', '$password', '$alamat', '$lat', '$lng', '$jk', '$nisn', '$kelas', '$nama_sekolah', '$ServerURL')";

 if(mysqli_query($conn, $UpdateSQL)){

 file_put_contents($ImagePath,base64_decode($photo));

 echo "Berhasil disimpan...";
 }else{
 	echo "Gagal menyimpan...";
 }
 
 mysqli_close($conn);
 }else{
 echo "Please Try Again";
 
 }

?>