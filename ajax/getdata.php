<?php 
include('connection.php');
if(password_verify("getdata",$_POST['token']))
{
		


	$query = $db->prepare('SELECT * FROM user');
	$data=array();
	$execute=$query->execute($data);
	?>
	<table class="table table-bordered table-responsive">

		<tr>
			
			<td>UID</td>
			<td>FNAME</td>
			<td>LNAME</td>
			<td>ROLL</td>
			<td>DELETE</td>
		</tr>
		<?php
		while($datarow=$query->fetch())
		{
		?>
			<tr>
				<td><?php echo $datarow['uid'];?></td>
				<td><?php echo $datarow['fname'];?></td>
				<td><?php echo $datarow['lname'];?></td>
				<td><?php echo $datarow['roll'];?></td>
				<td><button class="btn btn-danger" onclick="deleterow(<?php echo $datarow['uid']?>)">DELETE</button></td>
			</tr>
		<?php


		}

		?>

	</table>
	<?php
}
?>