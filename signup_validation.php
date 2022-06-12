<?php
	session_start();

	include "database.php";

	if (isset($_POST['signup_submit'])) {
		
		$name = mysqli_real_escape_string($con,$_POST['sname']);
		$password = mysqli_real_escape_string($con,$_POST['spassword']);	


		$cheackname = "select * from info where name ='$name'";

		$cheacknamequery = mysqli_query($con,$cheackname);

		$result = mysqli_num_rows($cheacknamequery);

		if ($result == 1 ) {
			
			?>
				<script type="text/javascript">alert("You Name Already Have In Our Database")</script>
			<?php
			header("refresh:1;url=signuppage.php");
		}

		else 
		{
			$insertdata = "insert into info (name,password) values ('$name','$password') ";

			$insertdataquery = mysqli_query($con,$insertdata);

			?>
				<script type="text/javascript">alert("Complete Signup.")</script>
			<?php
		}

		header("refresh:1;url=index.php");
	}





 ?>