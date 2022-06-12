<?php
	session_start();

	include "database.php";

	if (isset($_POST['lbtn'])) {
		
		$email = $_POST['lemail'];

		$password = $_POST['lpassword'];

		$checkmail = "select * from info where email='$email' ";

        $cheackmailquery = mysqli_query($con,$checkmail);

        $result = mysqli_num_rows($cheackmailquery);

        if($result)
        {	
        	$bdarry = mysqli_fetch_assoc($cheackmailquery);
        	$bdpass = $bdarry['password'];
         	$pass_decode = password_verify($password,$bdpass);

        	if ($pass_decode) {
        		$_SESSION['userid'] = $bdarry['ID'];
        		$_SESSION['username'] = $bdarry['name'];
        		$_SESSION['useremail'] = $bdarry['email'];
        		$_SESSION['usercity'] = $bdarry['city'];
        		$_SESSION['userdepartment'] = $bdarry['department'];
        		$_SESSION['usermobile'] = $bdarry['mobile'];
        		?>
        			<script type="text/javascript">alert("Login Successful")</script>
        		<?php  
        		header("refresh:1;url=home.php");
        	}
        	else
        	{
        		?>
        			<script type="text/javascript">alert("Password is Worng")</script>
        		<?php  
        		header("refresh:1;url=index.html");
        	}
        }
        else
        {
        	?>
        		<script type="text/javascript">alert("Email is invalid")</script>
        	<?php 
        }
	}


?>