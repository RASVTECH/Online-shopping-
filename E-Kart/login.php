<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
<?php
            include "config.php";
            // echo "<div> <h1> Outside <h1> </div>";
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $submit=$_POST['submit'];
                if(!empty($submit)) {
                    foreach($_POST as $key=>$value) {
                        if(empty($_POST[$key])) {
                        $error_message = "Please enter the username and password";
                        break;
                        }
                    }
                }
                if(!isset($error_message)){
                  if(isset($_POST['username']) && isset($_POST['password'])){
                    $username= $_POST['username'];
                    $password = $_POST['password'];
                    $selectUser_query="SELECT * FROM ekart_users WHERE username='$username' AND password='$password'";
                    $result=mysqli_query($conn,$selectUser_query);
                    if(mysqli_num_rows($result) > 0) {
                      while($row=mysqli_fetch_assoc($result)){
                        $user=$row['username'];
                        $name=$row['first_name'];
                        $pass=$row['password'];
                        $id=$row['id'];
                        $type=$row['type'];
                      }
                               if($username==$user && $password==$pass){
                      session_start();
                      $_SESSION['Firstname']=$name; 
                      $_SESSION['username']=$user;
                      $_SESSION['password']=$pass;
                      $_SESSION['id']=$id;
                      $_SESSION['type']=$type;
                      if($type=='Admin'){
                ?>
                    <script>window.location.href='admin/index.php'</script>
                <?php
                      }else{
                ?>
                <script>window.location.href='index.php'</script>
                <?php
                      }
                }else{
                    $error_message="user name and password is incorrect";
                }
                    }
                   else{
                      $error_message="no user";
                    }
              }
            }
          }
              ?>
<nav class="navbar navbar-expand-lg navbar navbar-light navbar-static-top"style="background-color: #e3f2fd;" >
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Profile</a>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    </nav>
<div class="container">
    <br>
    <br>
    <div class="row">
      <div class="col-md-4">
      </div>  
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-body">
              
           <div class="card ">
                <div class="card-header text-center" style="background-color: #e3f2fd;" >
                    <h4>Sign in</h4>
                </div>
             <div class="card-body text-left" >
             <?php if(!empty($success_message)) { ?>
                  <div class="alert alert-success" role="alert">
                  <?php if(isset($success_message)) echo $success_message; ?>
                  </div>
                <?php } ?>
		            <?php if(!empty($error_message)) { ?>
                  <div class="alert alert-danger" role="alert">
                  <?php if(isset($error_message)) echo $error_message; ?>
                  </div>
                <?php } ?>  
                <form method="post">
                  <div class="form-group">
                    <lable for="username">Username:</lable>
                      <input type="text" class="form-control" name="username"/>
                    </div>
                  <div class="form-group">
                    <lablefor="password">Password:</lable>
                      <input type="password" class="form-control" name="password"/>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="submit" value="Sign in" name="submit"class="btn btn-primary"/>
                    </div>
                    <div class="form-group col-md-4">
                    <a href="register.php"class="btn btn-primary"/>Sign up</a>
                    </div>
                    <a href="forgot.php" class="nav-link" > Forgot password?</a>
                </div>
                </form>
              </div>
          </div>
        <div>
      </div>
    </div>
  </div>


<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>