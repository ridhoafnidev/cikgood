 <?php

include 'dbConfig.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
 $DefaultId 	= 0;
 
 $ImageData = $_POST['image_data'];
 
 $ImageName = $_POST['image_tag'];

 $GetOldIdSQL ="SELECT id FROM ImageUpload ORDER BY id ASC";
 
 $Query = mysqli_query($conn,$GetOldIdSQL);
 
 while($row = mysqli_fetch_array($Query)){
 
 $DefaultId = $row['id'];
 }
 
 // $ImagePath = "images/$DefaultId.png";
 
 // $ServerURL = "http://androidblog.esy.es/$ImagePath";

 $ImagePath = "../../backend/web/upload/images/guru/$DefaultId.jpg";
 
 $ServerURL = "$DefaultId.jpg";
 
 $InsertSQL = "insert into ImageUpload (image_data,image_tag) values ('$ServerURL','$ImageName')";
 
 if(mysqli_query($conn, $InsertSQL)){

 file_put_contents($ImagePath,base64_decode($ImageData));

 echo "Your Image Has Been Uploaded.";
 }
 
 mysqli_close($conn);
 }else{
 echo "Please Try Again";
 }

?>