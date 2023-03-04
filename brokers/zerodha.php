<?php

$action = $_REQUEST['action'];
$uid = $_REQUEST['uid']
$aid = $_REQUEST['aid']

if($action == 'login')
{
    echo "Zerodha Login Page ";
    echo "<p>";
    echo $uid;
}
else if($action == 'checkout')
{
    echo 'Zerodha Checkout page';
}
else 
{
    echo "Error";
}

?>