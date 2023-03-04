<?php

include_once("./kiteconnect.php");

$action = $_REQUEST['action'];
$uid = $_REQUEST['uid'];
$aid = $_REQUEST['aid'];

$api_key = "ivn336qicv3rclmy";
$secret = "kn2aro9wc0mtps1hy7uirilt9uvsykr0";
$authorization_url = "https://kite.trade/connect/login?v=3&api_key=".$api_key;
	// Initialise.
	$kite = new KiteConnect($api_key);
    //request_token=u0aa4TDmQQDcFd3NkQ9imppFvcYXRKuV&action=login&status=success
    
    if(isset($_REQUEST['request_token']))
    {
        $requestToken= $_REQUEST['request_token']; 
    	try {
    		$user = $kite->generateSession($requestToken, $secret);
    
    		echo "Authentication successful. \n"; 
    		//print_r($user);
    
    		$kite->setAccessToken($user->access_token);
            echo "<p>Access_Token: ".$user->access_token;
            
            //$query  = "update settings set token='".$user->access_token."' where id='1'";
            //mysqli_query($con,$query);
    	} catch(Exception $e) {
    		echo "Authentication failed: ".$e->getMessage();
    		throw $e;
    	}
	}
    else 
    {
        header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Location: " . $authorization_url);
    }

?>