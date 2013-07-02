<?php
require_once 'db.php';

class ItemDB
{
	private $conn = null;
	function __construct()
	{
		$VistaDB = new VistaDB();
		$this->conn = $VistaDB->getConnection();
	}
	public function getActive()
	{
		try
		{
			$stmt = $this->conn->prepare('select ItemID, IBookTitle, IISBN, IQty, ALName, AFName from item join authoritem on item.ItemID = authoritem.Item_ItemID join author on author.AuthorID = authoritem.Author_AuthorID where item.IActive=\'1\' order by IBookTitle asc');
			$stmt->execute();
			if($stmt->rowCount() > 0)
				return $stmt->fetchAll();
			return FALSE;
		}
		catch(Exception $e)
		{
			return FALSE;
		}
	}

	public function addItem($booktitle, $isbn, $qty, $active, $publisher, $authorLast, $authorFirst)
	{
		try
		{
			$authorID = $this->getAuthor($authorLast, $authorFirst);
			if(!$authorID)
				$authorID = $this->addAuthor($authorLast, $authorFirst);
			$publisherID = $this->getPublisher($publisher);
			if(!$publisherID)
				$publisherID = $this->addPublisher($publisher);
			$item = $this->getItem($isbn);
			if($item === FALSE)
			{
				$stmt = $this->conn->prepare('insert into item (IBookTitle, IISBN, IQty, IActive, Publisher_PublisherID) VALUES (:booktitle, :isbn, :qty, :active, :publisherID)');
				$stmt->execute(array(':booktitle'=>$booktitle, ':isbn'=>$isbn, ':qty'=>$qty, ':active'=>$active, ':publisherID'=>$publisherID));
			}
			else
			{
				$stmt = $this->conn->prepare('update item set IQty=:qty where ItemID=:itemID');
				$stmt->execute(array(':qty'=>$item['IQty'] + $qty, ':itemID'=>$item['ItemID']));
			}
			if($stmt->rowCount() > 0)
				return TRUE;
			return FALSE;
		}
		catch(Exception $e)
		{
			print $e;
			return FALSE;
		}
	}

	private function getItem($isbn)
	{
		try
		{
			$stmt = $this->conn->prepare('select * from item where IISBN=:isbn');
			$stmt->execute(array(':isbn'=>$isbn));
			if($stmt->rowCount() > 0)
			{
				$retval = $stmt->fetch();
				return $retval;
			}
			return FALSE;
		}
		catch(Exception $e)
		{
			return FALSE;
		}
	}

	private function addPublisher($publisher)
	{
		try
		{
			$stmt = $this->conn->prepare('INSERT INTO publisher	(PName)	VALUES (:publisher)');
			$stmt->execute(array(':publisher'=>$publisher));
			if($stmt->rowCount() > 0)
				return $this->conn->lastInsertID();
			return FALSE;
		}
		catch(Exception $e)
		{
			return FALSE;
		}
	}

	private function addAuthor($lname, $fname)
	{
		try
		{
			$stmt = $this->conn->prepare('INSERT INTO author (ALName, AFName) VALUES (:lname,:fname)');
			$stmt->execute(array(':lname'=>$lname, ':fname'=>$fname));
			if($stmt->rowCount() > 0)
				return $this->conn->lastInsertID();	
			return FALSE;
		}
		catch(Exception $e)
		{
			return FALSE;
		}
	}

	private function getAuthor($lname, $fname)
	{
		try
		{
			$stmt = $this->conn->prepare('select AuthorID from author where ALNAME=:lname and AFName=:fname');
			$stmt->execute(array(':lname'=>$lname, ':fname'=>$fname));
			if($stmt->rowCount() > 0)
			{
				$retval = $stmt->fetch();
				return $retval['AuthorID'];
			}
			return FALSE;
		}
		catch(Exception $e)
		{
			return FALSE;
		}
	}
	
	public function retireItem($itemID)
	{
		try
		{
			$stmt = $this->conn->prepare('select IQty from item where ItemID=:itemid');
			$stmt->execute(array(':itemid'=> $itemID));
			if($result = $stmt->fetch())
			{
				$qty = $result['IQty'];
				if($qty > 0)
				{
					$stmt2 = $this->conn->prepare('update item set IQty=:itemqty where ItemID=:itemid');
					$stmt2->execute(array(':itemqty'=>$qty -1,':itemid'=>$itemID));
					return true;
				}
			}
			return FALSE;
		}
		catch(Exception $e)
		{
			return FALSE;
		}
	}

	public function getAuthorOfItem()
	{
	}

	private function getPublisher($publisher)
	{
		try 
		{   
			$stmt = $this->conn->prepare('select PublisherID from publisher where PName=:publisher');
			$stmt->execute(array(':publisher'=>$publisher));
			if($stmt->rowCount() > 0)
			{
				$retval = $stmt->fetch();
				return $retval['PublisherID'];
			}
			return FALSE;
		}   
		catch(Exception $e) 
		{   
			return FALSE;
		}   
	}
}

?>
