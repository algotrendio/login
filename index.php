<?php

$fulldomain = $_SERVER['SERVER_NAME'];
$matches = null; 
preg_match('/^[^.]+/', $fulldomain, $matches);
$subdomain = $matches[0];

echo $subdomain." Login Page";

?>