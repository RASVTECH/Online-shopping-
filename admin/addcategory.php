<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
<?php
            include "../config.php";
            // echo "<div> <h1> Outside <h1> </div>";
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $cat_name=$_POST['cat_name'];
                $cat_id=$_POST['cat_id'];
                $submit=$_POST['submit'];
                if(empty($cat_name)) {
                        $error_message = "Please add the category name";
                    }
                    if(isset($cat_name)&&isset($cat_id)){
                        $checkUser_query="SELECT * FROM ekart_category WHERE cat_name='$cat_name' AND cat_id='$cat_id'";
                        $result =mysqli_query($conn,$checkUser_query);                        
                        if(mysqli_num_rows($result) > 0){
                            $error_message = "Category Name,Category id  is already excist ";
                        }
                    }
                if(!isset($error_message)){
                    $insert_query= "INSERT INTO ekart_category (cat_id,cat_name) VALUES ('$cat_id','$cat_name')";
                    $result =mysqli_query($conn,$insert_query); 
                    if ($result === TRUE) {
                        $success_message= "Category name inserted successfully";
                    } else {
                        $error_message= "Error: " . $sql . "<br>" . $conn->error;
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
            <a class="nav-link badge-light " href="logout.php">logout</a>
            </nav>
            <br>
            <br>
    <div class="container">
            <div class="row">
            <div class="col-md-4">
            </div>  
            <div class="col-md-4">
                <div class="panel panel-default">
                <div class="panel-body">
                <div class="card ">
                        <div class="card-header text-center" style="background-color: #e3f2fd;" >
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            <h4>Add category</h4>
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
                        <div>
                            <lable for="cat_name" class="col-form-label">Category id :</lable>
                            <input type="text" class="form-control" name="cat_id"  />
                        </div>
                        <div>
                            <lable for="cat_name" class="col-form-label">Category Name :</lable>
                            <input type="text" class="form-control" name="cat_name"  />
                        </div>
                    </div>
                        <!-- <div class="form-check">
                        <lable for="addcategory" class="col-form-label">Status :</lable>
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" value="Active">
                          Active
                        </label>
                      </div> -->
                      <div class="form-row">
                      <div class="form-group col-md-4">
                          <input type="submit" value="Submit" name="submit"class="btn btn-primary"/>
                      </div>
                    </form>
                    </div>
                </div>
                <div>
            </div>
            </div>
        </div>

<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>