<?php 
		
	session_start();
	if (!isset($_SESSION['username'])) {
		header("location:index.html");
	}

	include "database.php";

	$id = $_SESSION['userid'];

	$profile = "select * from info where id = $id";
	$profile_query =mysqli_query($con,$profile);

	$profile_result = mysqli_fetch_assoc($profile_query);

	if (isset($_POST['update_submit'])) {
		$id   		=$_SESSION['userid'];
		$updatename = $_POST['upname'];
		$updateemail=$_POST['upemail'];
		$updatecity=$_POST['upcity'];
		$updatedepartment=$_POST['updepartment'];
		$updatemobile=$_POST['upmobile'];

		$update = "update info set name = '$updatename',email = '$updateemail',city = '$updatecity',department = '$updatedepartment',mobile = '$updatemobile' where ID=$id ";

		$update_query = mysqli_query($con,$update);

		if ($update_query) {
			?>

				<script type="text/javascript">alert("Update Succesfully");</script>

			<?php

			header("refresh:1;url=home.php");
		}
		else
		{
			?>

				<script type="text/javascript">alert("Update Failed");</script>

			<?php
		}

	}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Ourclassroom</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
	<link href="https://fonts.font.im/css?family=Lobster" rel="stylesheet">
	<link href="https://fonts.font.im/css?family=Dancing+Script" rel="stylesheet">
	<style type="text/css">
		.profile_fonts{
			font-family: 'Teko', sans-serif;
			font-size: 22px;
		}
	</style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="#" style="font-family: 'Lobster', cursive;text-shadow: -4px -1px 4px rgba(150, 150, 150, 1);">Ourclassroom.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Profile<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="student.php">All Student</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="groupchat.php" tabindex="-1" aria-disabled="true">Group Chat</a>
      </li>
    </ul>
    <form class="form-inline mt-2 mt-md-0">
      <a class="btn btn-outline-success my-2 my-sm-0" href="logout.php" type="submit">Logout</a>
    </form>
  </div>
</nav>

<main role="main" class="container">
  <div class="jumbotron">
    <h1 style="font-family: 'Dancing Script', cursive;">HI!!...<?php echo $profile_result['name']; ?></h1>
    <hr>
    <table class="table table-borderless table-lg">
  		<form action="" method="POST">
			  <thead>
			    <tr>
			      <th class="profile_fonts">Name</th>
			      <th><input class="form-control" type="name" name="upname" value="<?php echo $profile_result['name']; ?>"></th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th class="profile_fonts">Email</th>
			      <th><input class="form-control" type="name" name="upemail" value="<?php echo $profile_result['email']; ?>"></th>
			    </tr>
			    <tr>
			      <th class="profile_fonts">City</th>
			      <th><input class="form-control" type="name" name="upcity" value="<?php echo $profile_result['city']; ?>"></th>
			    </tr>
			    <tr>
			      <th class="profile_fonts">Department</th>
			      <th>
			      	<div class="form-group col-md-12">
	                    <select id="inputState" class="form-control" name="updepartment">
	                         <option selected><?php echo $profile_result['department']; ?></option>
	                        <option value="Computer" >Computer</option>
	                           <option value="Electrical">Electrical</option>
	                           <option value="Internatonal Business">Internatonal Business</option>
	                           <option value="Hotel Manegment">Hotel Manegment</option>
	                     </select>
	                </div>
			      </th>
			    </tr>
			    <tr>
			      <th class="profile_fonts">Mobile</th>
			      <th><input class="form-control" type="name" name="upmobile" value="<?php echo $profile_result['mobile']; ?>"></th>
			    </tr>
			  </tbody>
			</table>
		    <button class="btn btn-primary" name="update_submit" style="font-family: 'Lobster';"  type="submit" href="" >Update</button>
		</form>
  </div>
</main>

<script type="text/javascript" src="js/offcanvas.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
</body>
</html>