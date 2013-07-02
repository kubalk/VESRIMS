<?php
require_once 'db.php';

class UserDB
{
	private $conn = null;
	function __construct()
	{
		$VistaDB = new VistaDB();
		$this->conn = $VistaDB->getConnection();
	}
	public function getUsers()
	{
		try
		{
			$stmt = $this->conn->prepare('select * from users order by UActive desc, ULName asc, UFName asc');
			$stmt->execute();
			return $stmt->fetchAll();
		}
		catch(Exception $e)
		{return FALSE;}
	}

	public function login($username, $password)
	{
		try
		{
			$password = hash('sha256', $password);
			$stmt = $this->conn->prepare('select UserID from users where Username=:username and UPassword=:password and UActive=\'1\'');
			$stmt->bindValue(':username', $username);
			$stmt->bindValue(':password', $password);
			$stmt->execute();
			if($user = $stmt->fetch())
			{
				$_SESSION['UserID'] = $user['UserID'];
				return TRUE;
			}
			return FALSE;
		}
		catch(Exception $e)
		{
			return FALSE;
		}
	}

	public function logout()
	{
		session_destroy();
		$this->returnHome();
	}

	public function getAdmin()
	{
		if(!isset($_SESSION['UserID']))
			return FALSE;
		try
		{
			$stmt = $this->conn->prepare('select UserID from users where UserID=:UserID and UType=\'1\' and UActive=\'1\'');
			$stmt->bindValue(':UserID', $_SESSION['UserID']);
			$stmt->execute();
			if($stmt->rowCount() > 0)
				return TRUE;
			return FALSE;
		}
		catch(Exception $e)
		{
			return FALSE;
		}
	}

	public function addUser($fname, $lname, $roomnumber=null, $admin=false, $password='1234')
	{
		if(!$this->userExists($fname, $lname))
		{
			try
			{
				$username = $fname . substr($lname, 0, 1);
				$password = hash('sha256', $password);

				$stmt = $this->conn->prepare('insert into users (UFName, ULName, UType, UPassword, UActive, URoomNum, Username) VALUES(:fname,:lname,:type,:password,:active,:roomnumber,:username)');
				$stmt->bindValue(':fname', $fname);
				$stmt->bindValue(':lname', $lname);
				$stmt->bindValue(':roomnumber', $roomnumber);
				$stmt->bindValue(':type', $admin);
				$stmt->bindValue(':password', $password);
				$stmt->bindValue(':active', 1);
				$stmt->bindValue(':username', $username);
				$stmt->execute();
				if($stmt->rowCount() > 0)
					return TRUE;
				return FALSE;
			}
			catch(Exception $i)
			{
				return FALSE;
			}
		}
	}
	public function updateUserStatus($userID, $status)
	{
		try
		{
			$stmt = $this->conn->prepare('update users set UActive=:status where UserID=:userid');
			$stmt->bindValue(':status', $status);
			$stmt->bindValue(':userid', $userID);
			$stmt->execute();
			if($stmt->rowCount() > 0)
				return TRUE;
			return FALSE;
		}
		catch(Exception $e)
		{
			return FALSE;
		}
	}
     
	public function userExists($fname, $lname)
	{
		try
		{
			$stmt = $this->conn->prepare('select * from users where UFName=:fname and ULName=:lname');
			$stmt->bindValue(':fname', $fname);
			$stmt->bindValue(':lname', $lname);
			$stmt->execute();
			if($stmt->rowCount() < 1)
				return FALSE;
			RETURN TRUE;
		}
		catch(Exception $e)
		{
			return TRUE;
		}
	}

	public function returnHome()
	{
		header('Location: http://test.vista.com/');
	}
}

?>
