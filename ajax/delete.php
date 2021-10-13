<?php 

	include('connection.php');
	if(password_verify("delete", $_POST['token']))
	{
		$id=$_POST['id'];
		$query=$db->prepare('DELETE FROM user WHERE uid=?');
		$data=array($id);
		$execute=$query->execute($data);
		if($execute)
		{
			echo 0;
		}
	}

?>