<?php
$iphone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$android = stripos($_SERVER['HTTP_USER_AGENT'],"android");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<?php 
    if($iphone || $android)
    { 
        echo "<link rel='stylesheet' type='text/css' href='/css/mobile.css' />";
    }
    else {
        echo "<link rel='stylesheet' type='text/css' href='/css/style.css' />";
    }
?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<script type='text/javascript' src='/js/admin.js'></script>
    <meta name = "viewport" content="width=device-width, initial-scale=1.0">
    <meta name = "format-detection" content = "telephone=no">
    <title>Vista Elementary Reading Inventory Management System</title>
</head>
<body>
    <div id='header'>
        <img src='/images/logo.png' class='logo'/>
        <span class='title'>VISTA ELEMENTARY</span>
        <span class='subtitle'>Reading Inventory Management System</span>
    </div>
