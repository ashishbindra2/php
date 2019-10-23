<?php 

	require_once('insert.php');
class Action
{
	
	function __construct()
	{
		switch ($_POST['submit']) {
			case 'submit':
				$objBook = new Book;
				$objBook->setName($_POST['name']);
				$objBook->setType($_POST['email']);
				$objBook->setPages($_POST['subject']);
				$objBook->setPrice($_POST['message']);
				$objBook->setAuthor($_POST['area']);
				$objBook->setCreatedDate(date('Y-m-d H:i:s'));
				if ($objBook->insert()) {
					header('location:index.php?insert=1');
				}else{
					header('location:index.php?insert=0');
				}
				break;
			
			default:
				header('location:index.php');
				break;
		}
	}
}
if (isset($_POST['submit'])) {
	# code...
	$objAct = new Action;
}
 ?>