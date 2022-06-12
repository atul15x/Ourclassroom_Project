<?php
	session_start();
	include "database.php";
	if (!isset($_SESSION['username'])) {
		header("location:index.html");
	}

	$id = $_SESSION['userid'];

	$profile = "select * from info";
	$profile_query = mysqli_query($con,$profile);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ourclassroom</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
	<link href="https://fonts.font.im/css?family=Dancing+Script" rel="stylesheet">
	<style type="text/css">

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
      <li class="nav-item ">
        <a class="nav-link" href="home.php">Profile<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="student.php">All Student</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="groupchat.php">Group Chat</a>
      </li>
    </ul>
    <form class="form-inline mt-2 mt-md-0">
      <a class="btn btn-outline-success my-2 my-sm-0" href="logout.php" type="submit">Logout</a>
    </form>
  </div>
</nav>

<main role="main" class="container">
  <div class="jumbotron">
    <h1 style="font-family: 'Dancing Script', cursive;">All Student..</h1>
    <hr>
    <div class="table-responsive">
    <table class="table table-borderless table-dark table-lg
    ">
	  <thead>
	    <tr>
	    	<th >ID</th>
		     <th >Name</th>
		     <th >Email</th>
		     <th >City</th>
		     <th >Department</th>
		     <th >Mobile</th>
	    </tr>
	  </thead>
	  <?php  
	  	while ($profile_result = mysqli_fetch_assoc($profile_query)) {
	  		?>
	  			<tbody>
				    <tr>
				      <td><?php echo $profile_result['ID'];  ?></td>
				      <td><?php echo $profile_result['name'];  ?></td>
				      <td><?php echo $profile_result['email'];  ?></td>
				      <td><?php echo $profile_result['city'];  ?></td>
				      <td><?php echo $profile_result['department'];  ?></td>
				      <td><?php echo $profile_result['mobile'];  ?></td>
				    </tr>
				</tbody>
	  		<?php
	  	}
	  ?>
	</table>
	</div>
  </div>
</main>

<script type="text/javascript" src="js/offcanvas.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
</body>
</html>