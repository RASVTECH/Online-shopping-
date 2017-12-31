<?php
if(isset($_POST['cat_id']))
{
 include "../config.php";
 $select_sub_category ="select subcategory from ekart_subcategory where cat_id='".$_POST['cat_id']."'";
 $resultset = mysqli_query($conn,$select_sub_category) or die("database error:". mysqli_error($conn));
 while( $rows = mysqli_fetch_assoc($resultset)) { 
    $option .= '<option value = "'.$rows['subcategory'].'">'.$rows['subcategory'].'</option>';    
    echo $option;
 }
 exit;
}

?>
