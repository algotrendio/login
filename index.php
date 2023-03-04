<?php
require 'vendor/autoload.php'; // include Composer's autoloader

$fulldomain = $_SERVER['SERVER_NAME'];
$matches = null; 
preg_match('/^[^.]+/', $fulldomain, $matches);
$subdomain = $matches[0];

include_once('./brokers/'.$subdomain.'.php');

?>