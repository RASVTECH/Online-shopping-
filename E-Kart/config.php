<?php
$conn = mysqli_connect("localhost","root","password","e-kart");
if(mysqli_connect_errno()){
    echo  "Failed to connect DB :" .mysqli_connect_error();
}
?>