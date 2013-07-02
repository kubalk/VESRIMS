<?php
require_once 'includes/header.php';
require_once 'db/UserDB.php';
session_start();
if(isset($_POST["submit"]))
{
	$UserDB = new UserDB();
	$loggedin = $UserDB->login($_POST["user"], $_POST["password"]);
	if($loggedin)
		$UserDB->returnHome();
	else
		$errorMessage = 'Invalid username/password combination.';
}
else if(isset($_SESSION['UserID']))
{
	$UserDB = new UserDB();
	if($UserDB->getAdmin())
		header('Location: http://test.vista.com/pages/index.php');
	else
	{
		session_destroy();
		$errorMessage = 'Invalid username/password combination.';
	}
}

?>
<style>
	body{background: #FFFFFF}
</style>
<div>
<h2 style='text-align: center;'>Administrative Center Login</h2><?php if(isset($errorMessage)){echo '<h3 style=\'text-align:center;\'>',$errorMessage,'</h3>';} ?><br />
	<form id='login' action="index.php" method="POST">            
	    <b style='color: #333;'>Username:</b><br /><input id="user" name="user" type="text" class='text'><br /><br/>
		<b style='color: #333;'>Password:</b><input id="password" name="password" type="password" class='text'><br />
		<img src='/images/shield.png' /><img class='button' src='/images/login.png' style='width: 222px; margin: 20px 0px -5px 6px' onclick='submitForm();'/>
		<input type='submit' value='submit' id='submitBtn' name='submit' style='display: none;' />
    </form>
</div>
</body>
</html>
