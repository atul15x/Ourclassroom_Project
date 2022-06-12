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

  if (isset($_POST['cbtn'])) {
      $comment = $_POST['comment'];
      $username = $_SESSION['username'];


      $insertcomment = "insert into comment (username,comments) values ('$username','$comment')";

      $insertcomment_query = mysqli_query($con,$insertcomment);

      if($insertcomment_query)
      {
        ?>
          <script type="text/javascript">alert("Comment Post Succesfull")</script>
        <?php
        header("refresh:1;url=groupchat.php");
      }
      else 
      {
        ?>
          <script type="text/javascript">alert("Comment Post Failed")</script>
        <?php
      }
  }



?>



<!DOCTYPE html>
<html>
<head>
  <title>Ourclassroom</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
  <link href="https://fonts.font.im/css?family=Dancing+Script" rel="stylesheet">
  <link href="https://fonts.font.im/css?family=Lobster" rel="stylesheet">
  <style type="text/css">
    .usercmtname{
      width: 200px;
      font-family: 'Dancing Script', cursive;
      font-weight: bold;

    }
    .usercmt {
      color: red;
      font-family: 'Lobster',cursive;
    }
    .cmt
    {
      border: 1px solid black;
      width: 80%;
      padding: 20px;
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
      <li class="nav-item ">
        <a class="nav-link" href="home.php">Profile<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="student.php">All Student</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="group_chat.php" tabindex="-1" aria-disabled="true">Group Chat</a>
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
    <?php 
          include "database.php";

          $cmtquery = "select * from comment";

          $cmtquery_show = mysqli_query($con,$cmtquery);

          while ($cmtarry = mysqli_fetch_assoc($cmtquery_show)) {
            
            ?>
            <label class="usercmtname"><?php echo $cmtarry['username'] ;  ?></label>
            <label class="usercmt"><?php echo $cmtarry['comments'] ;  ?></label>
            <br>
            <?php

          }
         ?>
         <br><br>
    <div class="cmt">
          <h5>Comment HERE</h5>
            <div class="post">
              <form method="POST" action="">
                <textarea cols="40"  name="comment" placeholder=" Write Somthing..."></textarea><br>
                <button type="submit" name="cbtn" class="btn btn-success pbtn">Comment</button>
              </form>
            </div>
    </div> 
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
</body>
</html>