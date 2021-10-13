 <!DOCTYPE html>
<html>
<head>
	<meta lang="en">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/newcss/newstyle.css">
	<link rel="stylesheet" type="text/css" href="css/newcss/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/newcss/normalize.min.css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<div class="col-sm-12">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<form>
				<div>
					<label>NAME:<span style="color:red;">*</span></label>
					<input type="text" id="firstname" name="firstname" placeholder="Enter your first name" class="form-control" required>
				</div>
				<div class="">
					<label>LAST NAME:<span style="color:red;">*</span></label>
					<input type="text" id="lastname" name="lastname" placeholder="Enter your last name" class="form-control" required>
				</div>
				<div class="">
					<label>Roll No:<span style="color:red;">*</span></label>
					<input type="text" id="rollno" name="rollno" placeholder="Enter your Roll no" class="form-control" required>
				</div>
				<div class="">
					<input type="submit" id="submit" name="submit" onclick="submitdata();">
		
	</form>

		</div>
		<div class="col-sm-4"></div>
	</div>
	<div class="col-sm-12">
		<div class="datalist" id="datalist" style="float: left;width: 100%;"></div>
	</div>
	
</body>

<script type="text/javascript">
	function submitdata()
	{
		var fname = document.getElementById('firstname').value;
		var lname = document.getElementById('lastname').value;
		var roll = document.getElementById('rollno').value;
		var token ="<?php echo password_hash("hello", PASSWORD_DEFAULT);?>";

		$.ajax({

				type: "POST",
				url: "ajax/submitdata.php",
				data: {fname:fname,lname:lname,roll:roll,token:token},
				success: function(data){
					if(data == 0)
					{
						alert('data inserted successfully');
						window.location="learn.php";
					}
					else if(data == 1)
					{
						alert('data not inserted');
					}
					else
					{
						alert(data);
					}
				}



		});
		
	}
	getdata();
	function getdata()
	{
		var token ="<?php echo password_hash("getdata", PASSWORD_DEFAULT)?>";
		$.ajax({

				type: "POST",
				url: "ajax/getdata.php",
				data: {token:token},
				success: function(data){
					$('#datalist').html(data);
				}



		});
	}
	function deleterow(id)
	{
		
		var token ="<?php echo password_hash("delete", PASSWORD_DEFAULT)?>";
		$.ajax({

				type: "POST",
				url: "ajax/delete.php",
				data: {token:token,id:id},
				success: function(data){
					if(data == 0)
					{
						alert('deleted');
						window.location="learn.php";
					}
				}



		});

	}
	



</script>
<script type="text/javascript">
	$('form').submit(function(e){

		e.preventDefault();
	});
</script>


</html>






