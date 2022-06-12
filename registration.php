<?php
    
    session_start();

    include "database.php";
    
    if(isset($_POST['sbtn']))
    {   

        $name = mysqli_real_escape_string($con,$_POST['name']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
        $city = mysqli_real_escape_string($con,$_POST['city']);
        $department = mysqli_real_escape_string($con,$_POST['department']);
        $mobile = mysqli_real_escape_string($con,$_POST['mobile']);

        $pass = password_hash($password,PASSWORD_BCRYPT);
        $cpass =password_hash($cpassword,PASSWORD_BCRYPT);

        $checkmail = "select * from info where email='$email' ";

        $cheackmailquery = mysqli_query($con,$checkmail);

        $result = mysqli_num_rows($cheackmailquery);

         if($result > 0)
        {
            ?>
                <script type="text/javascript">alert("You Are Alredy Registed")</script>
            <?php
            header("refresh:1;url=index.html");
        }
        else
        {
            if ($password === $cpassword) {
                $insertdata = "insert into info (name,email,password,cpassword,city,department,mobile) values('$name','$email','$pass','$cpass','$city','$department','$mobile')";

                    $insertdata_query = mysqli_query($con,$insertdata);

                    ?>
                        <script type="text/javascript">alert("Sign Up Successfully")</script>
                    <?php
                    header("refresh:1;url=index.html");
            }
            else 
            {
                ?>
                    <script type="text/javascript">alert("Password is Not Match")</script>
                 <?php
                  header("refresh:1;url=index.html");
            }
        }
    }

 ?>