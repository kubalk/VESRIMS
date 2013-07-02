<?php
require_once '../db/UserDB.php';
session_start();
$UserDB = new UserDB();
if(isset($_POST['logout']) || !$UserDB->getAdmin())
    $UserDB->logout();
?>
