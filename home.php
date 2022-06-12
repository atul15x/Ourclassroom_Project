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



 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Ourclassroom</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
	<link href="https://fonts.font.im/css?family=Lobster" rel="stylesheet">
	<link href="https://fonts.font.im/css?family=Dancing+Script" rel="stylesheet">
	<link href="https://fonts.font.im/css?family=Teko" rel="stylesheet">
	<style type="text/css">
		.profile_fonts{
			font-family: 'Teko', sans-serif;
			font-size: 22px;
		}
		body{
			background-image: url(./img/Bg.jpg);
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
        <a class="nav-link" href="">Profile<span class="sr-only">(current)</span></a>
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
  <div class="jumbotron" style="background: aliceblue;border: 2px solid black;">
    <h1 style="font-family: 'Dancing Script', cursive;">HI!!...<?php echo $profile_result['name']; ?></h1>
    <hr>
    <table class="table table-borderless table-lg">
	  <thead>
	    <tr>
	      <th class="profile_fonts">Name</th>
	      <th><?php echo $profile_result['name']; ?></th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <th class="profile_fonts">Email</th>
	      <th><?php echo $profile_result['email']; ?></th>
	    </tr>
	    <tr>
	      <th class="profile_fonts">City</th>
	      <th><?php echo $profile_result['city']; ?></th>
	    </tr>
	    <tr>
	      <th class="profile_fonts">Department</th>
	      <th><?php echo $profile_result['department']; ?></th>
	    </tr>
	    <tr>
	      <th class="profile_fonts">Mobile</th>
	      <th><?php echo $profile_result['mobile']; ?></th>
	    </tr>
	  </tbody>
	</table>
    <a class="btn btn-primary" style="font-family: 'Lobster';" href="update.php" >Edit</a>
  </div>
</main>

<script type="text/javascript" src="js/offcanvas.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
</body>
</html>