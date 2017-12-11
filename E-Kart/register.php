<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Register</title>
</head>
<body>
<?php 
    include "config.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $firstname=$_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $username= $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $submit=$_POST['submit'];
        if(!empty($submit)) {
            foreach($_POST as $key=>$value) {
                if(empty($_POST[$key])) {
                $error_message = "All Fields are required";
                break;
                }
            }
            if(!isset($error_message)) {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_message = "Invalid Email Address";
                 }
            }
            if($password != $cpassword){ 
                $error_message = 'Passwords should be same<br>'; 
                }
            if($gender=="Choose"){
                $error_message ="Please select gender";
            }
            if(isset($username) && isset($email)){
                $checkUser_query="SELECT * FROM ekart_users WHERE username='$username' AND email='$email'";
                $result=mysqli_query($conn,$checkUser_query);
                if(mysqli_num_rows($result)> 0){
                    $error_message = "User Name  is already exist";
                }
            }
            
            if(!isset($error_message)){
                $insertUser_query= "INSERT INTO ekart_users (first_name, last_name, username, password, email, gender) VALUES ('$firstname','$lastname','$username','$password','$email','$gender')";
                if(mysqli_query($conn,$insertUser_query)){
                    $success_message="Successfully Registered please...! <a href='login.php'>Login</a>";
                }
                else{
                    $error_message="Error in inserting";
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
  <p><br/></p>
        <div class="container">
            <div class="row">
            <div class="col-md-4">
            </div>  
            <div class="col-md-4">
                <div class="panel panel-default">
                <div class="panel-body">
                <div class="card ">
                        <div class="card-header text-center" style="background-color: #e3f2fd;" >
                            <h4>Sign up</h4>
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
                    <form method="post" action="">
                    <div class="form-group">
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstname" class="col-form-label">First Name:</label>
                                    <input type="text" class="form-control" name="firstname" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname" class="col-form-label">Last Name:</label>
                                    <input type="text" class="form-control" name="lastname" />
                                </div>
                            </div>
                            <div>
                                <lable for="username" class="col-form-label">User Name:</lable>
                                <input type="text" class="form-control" name="username"  />
                            </div>
                            <div>
                                <lable for="email" class="col-form-label">Email:</lable>
                                <input type="text" class="form-control" name="email" />
                            </div>  
                            <div>
                            <div class="form-group">
                            <label for="sel1">Gender:</label>
                            <select class="form-control" name="gender">
                            <option value="Choose">Choose</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Transgender">Transgender</option>
                            </select>
                        </div> 
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password" class="col-form-label"> Password:</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password" class="col-form-label">Confirm Password:</label>
                                    <input type="password" class="form-control" name="cpassword"/>
                                </div>
                            </div>
                                <div class="form-group col-md-4">
                                    <input type="submit" name="submit" value="Sign in" class="btn btn-primary"/>
                                </div>
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