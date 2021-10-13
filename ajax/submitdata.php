<?php 
	include('connection.php');
	if(password_verify("hello", $_POST['token']))
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$roll=$_POST['roll'];
		//database
		//1->query prepare
		$query = $db->prepare('INSERT INTO user(fname,lname,roll) VALUES (?,?,?)');
		//2->query mein data bhejo
		$data=array($fname,$lname,$roll);
		//3->query execute kro
		$execute=$query->execute($data);
		//4->query success pe action
		if($execute)
		{
			echo 0;
		}
		else
		{
			echo 1;
		}


	}
	else
	{
		echo "attack";
	}
	






?>
