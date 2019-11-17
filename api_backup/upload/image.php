<?php

include 'dbConfig.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
 $DefaultId = 0;
  
 $ImageData = $_POST['image_data'];

 $ImageData2 = $_POST['image_data2'];
 
 $ImageName = $_POST['image_tag'];

 $GetOldIdSQL ="SELECT id FROM ImageUpload ORDER BY id ASC";
 
 $Query = mysqli_query($conn,$GetOldIdSQL);
 
 while($row = mysqli_fetch_array($Query)){

 $DefaultId = $row['id'];

 $name = $ImageName;

 $date = date('Y-m-d');

 $DefaultNama= $ImageName."-".$date;
 }
 
 $ImagePath = "../../backend/web/upload/images/guru/identitas/$DefaultId.jpg";
 $ImagePath2 = "../../backend/web/upload/images/guru/identitas/$DefaultNama.jpg";
 
 $ServerURL = "$DefaultId.jpg";

 $ServerURL2 = "$DefaultNama.jpg";
 
 $InsertSQL = "insert into ImageUpload (image_data, image_data2, image_tag) values ('$ServerURL','$ServerURL2','$ImageName')";
 
 if(mysqli_query($conn, $InsertSQL)){

 file_put_contents($ImagePath,base64_decode($ImageData));
 file_put_contents($ImagePath2,base64_decode($ImageData2));

 echo "Your Image Has Been Uploaded.";
 }
 
 mysqli_close($conn);
 }else{
 echo "Please Try Again";
 }

?>