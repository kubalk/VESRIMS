<?php
require_once '../includes/auth.php';
$page;
function getPage()
{
	global $page;
	$page = $_GET["view"];
	$validPages = array('adduser', 'retireuser', 'manageuser', 'additem', 'retireitem', 'manageitem', 'eotEU', 'eoyEU', 'eotMR', 'eoyMR');
	if(!isset($page) || !in_array($page, $validPages))
		$page = 'adduser';
	$page .= '.php';
}
function addUser($UserDB)
{
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$admin = isset($_POST["admin"]) ? 1 : 0;
	$room = isset($_POST["roomnumber"]) ? $_POST["roomnumber"] : null;
	$password = isset($_POST["password"]) ? $_POST["password"] : '1234';
	if(isset($fname) && isset($lname))
		$UserDB->addUser($fname, $lname, $roomnumber, $admin, $password);
}
function addItem()
{
	require_once '../db/ItemDB.php';
	if(!empty($_POST["authFirst"]) && !empty($_POST["authLast"]) && !empty($_POST["publisher"]) && !empty($_POST["title"]) && !empty($_POST["ISBN1"]) && !empty($_POST["qty"]))
	{
		$ItemDB = new ItemDB();
		$authFirst = $_POST["authFirst"];
		$authLast = $_POST["authLast"];
		$publisher = $_POST["publisher"];
		$title = $_POST["title"];
		$isbn = $_POST["ISBN1"];
		$qty = $_POST["qty"];
		$active = true;
		$ItemDB->AddItem($title, $isbn, $qty, $active, $publisher, $authLast, $authFirst);
	}
}
function retireItem($itemID)
{
	require_once '../db/ItemDB.php';
	$ItemDB = new ItemDB();
	$ItemDB->retireItem($itemID);
}
function updateUserStatus($UserDB, $userID, $status)
{
	$UserDB->updateUserStatus($userID, $status);
}
getPage();
if(isset($_POST["adduser"]))
	addUser($UserDB);
else if(isset($_POST["additem"]))
	addItem();
else if(isset($_POST["retireItem"]))
	retireItem($_POST["retireItem"]);
else if(isset($_POST["userStatus"]))
	updateUserStatus($UserDB, $_POST["User"], $_POST["userStatus"]);

require_once '../includes/header.php';
require_once '../includes/navbar.php';
require_once $page;
require_once '../includes/footer.php';
