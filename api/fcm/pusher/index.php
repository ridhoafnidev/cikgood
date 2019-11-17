<?php
  require __DIR__ . '/vendor/autoload.php';

  $response = array(); 
  
  if ($_SERVER['REQUEST_METHOD']=='POST'){

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
  
    $data['message'] = 'Ridho';
    $pusher->trigger('push-channel', 'my-event', $data);

  }else{
    $response['error']=true;
    $response['message']='Invalid Request';
  }
?>