<?php
include_once("kiteconnect.php");

$mongo = new MongoDB\Client("mongodb://web2:windows2020@128.199.16.163:27017/mqapp2");
$db = $mongo->mqapp2;

//$action = $_REQUEST['action'];
$uid = $_REQUEST['uid'];
$aid = $_REQUEST['aid'];

$api_key =   "br1rb0jwdbfik1ll"; //$_REQUEST['key'] ; // 
$secret =$_REQUEST['secret'];   // "25q1ydathzvttwlyab4jk4yh0pg8qisa";
  
$authorization_url = "https://kite.trade/connect/login?v=3&api_key=".$api_key.'&redirect_params='.urlencode('aid='.$aid);
	 
$kite = new KiteConnect($api_key);

if(isset($_REQUEST['request_token']))
{
    $requestToken= $_REQUEST['request_token']; 
    try {
        $user = $kite->generateSession($requestToken, $secret);

        echo "Authentication successful. \n"; 
        
        $kite->setAccessToken($user->access_token);
        echo "<p>Access_Token: ".$user->access_token;

        //$db->trading_accounts->updateOne(['_id' => new \MongoDB\BSON\ObjectID($aid)], ['$set' => ['token' => $user->access_token]]);  
       
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