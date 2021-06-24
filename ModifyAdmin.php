<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Modify Admin</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">Darsh Turakhia</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
	      	<li class="nav-item">
	        	<a class="nav-link" href="IssueBook.html">Issue</a>
	      	</li>
	      	<li class="nav-item">
		        <a class="nav-link" href="ReturnBook.html">Deposit</a>
	      	</li>
	      	<li class="nav-item">
		        <a class="nav-link" href="Administrator.html">Admin</a>
	      	</li>
		</ul>
	</div>
	</nav>
	<br>
	<center>
<?php
	$id = $_POST['id'];
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	//database connection
	$conn = new mysqli('localhost','root','','library');
	if($conn->connect_error)
	{
		die('Connection Failed : '+$conn->connection_error);
	}
	else
	{
		$query = $conn->prepare("UPDATE admin SET name = '?', username = '?', password = '?' WHERE id = ?");
		$query->bind_param("sssi",$name,$username,$password,$id);
		if(!($query->fetch()))
		{
			echo "Record Updated !!!! ";
		}
		else
		{
			echo "Error While Updating";
		}
		$query->close();
		$conn->close();
	}
?>
</center>
</body>
</html>