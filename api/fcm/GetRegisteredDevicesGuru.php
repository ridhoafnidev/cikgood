<?php 
	require_once 'DbOperationGuru.php';
 
	$db = new DbOperationGuru(); 
	
	$devices = $db->getAllDevices();
 
	$response = array(); 
 
	$response['error'] = false; 
	$response['murid'] = array(); 
 
	while($device = $devices->fetch_assoc()){
		$temp = array();
		$temp['id']=$device['id'];
		$temp['nama']=$device['nama'];
		$temp['token']=$device['token'];		
		$temp['email']=$device['email'];
		$temp['password']=$device['password'];
		array_push($response['murid'],$temp);
	}
 
	echo json_encode($response);