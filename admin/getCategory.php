<?php 
    include_once("../config.php");
    if($_REQUEST['cat_id']){
        $select_sub_category ="select subcategory from ekart_subcategory where cat_id='".$_REQUEST['cat_id']."'";
        $resultset = mysqli_query($conn,$select_sub_category) or die("database error:". mysqli_error($conn));
        $data =array();
        while( $rows = mysqli_fetch_assoc($resultset)) {
            $data=$rows;
        }
        echo json_encode($data);
    }else{
        echo 0;
    }
?>