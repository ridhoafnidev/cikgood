<?php 
	require_once 'DbOperationGuru.php';
	require __DIR__ . '/pusher/vendor/autoload.php';
	$response = array(); 
 
	if($_SERVER['REQUEST_METHOD']=='POST'){
 
		$nama_guru  = $_POST['nama_guru'];
		$token      = $_POST['token'];
		$no_hp      = $_POST['no_hp'];
		$email      = $_POST['email'];
		$password   = $_POST['password'];

		$pwd = sha1($password);
 
		$db = new DbOperationGuru(); 
 
		$result = $db->registerDevice($nama_guru,$token,$no_hp,$email,$pwd);
 
		if($result == 0){
			
		// pusher
		  $options = array(
			'cluster' => 'ap1',
			'useTLS' => true
		  );
		  $pusher = new Pusher\Pusher(
			'f0ab7ef19b8acd56fa8a',
			'e52169b2c95dde244106',
			'699354',
			$options
		  );
		
		  $data['message'] = $nama_guru;
		  $pusher->trigger('push-channel', 'my-event', $data); 

			$response['error'] = false; 
			$response['message'] = 'Device registered successfully';
		}elseif($result == 2){
			$response['error'] = true; 
			$response['message'] = 'Device already registered';
		}else{
			$response['error'] = true;
			$response['message']='Device not registered';
		}
	}else{
		$response['error']=true;
		$response['message']='Invalid Request...';
	}
 
	echo json_encode($response);