<?php
$conn = mysqli_connect("localhost","root","","e-kart");
if(mysqli_connect_errno()){
    echo  "Failed to connect DB :" .mysqli_connect_error();
}
?>