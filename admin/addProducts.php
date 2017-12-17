<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/popper.min.js"></script> -->
    <title>Document</title>
</head>
<body>

<label for="category">Category</label>
<select id="category">
    <option value=""  selected="selected">Select Category</option>
    <?php 
        include "../config.php";
        $select_category_query="select category_id,category_name from ekart_category";
        $resultset = mysqli_query($conn, $select_category_query) or die("database error:". mysqli_error($conn));
        while( $rows = mysqli_fetch_assoc($resultset) ) {?>
        <option value="<?php echo $rows['category_id']; ?>"><?php echo $rows['category_name']; ?></option>
    <?php } ?>
</select><br/>

<label for="Subcategory">Sub Category</label> 
<select>
    <option id="subcategory" value="">Sub Category</option>  
<?php 
    if($_REQUEST['cat_id']){
        $select_sub_category ="select subcategory from ekart_subcategory where cat_id='".$_REQUEST['cat_id']."'";
        $resultset = mysqli_query($conn,$select_sub_category) or die("database error:". mysqli_error($conn));
        $data =array();
        while( $rows = mysqli_fetch_assoc($resultset)) { 
            echo "value ". $rows['subcategory']; ?>
            <option id="subcategory" value="<?php echo $rows['subcategory']; ?>"><?php echo $rows['subcategory']; ?></option>  
        <?php }} 
    else{
        echo "No Request";
    } ?>
</select>


<script type="text/javascript" src="../js/jquery-3.2.1.js"></script> 
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/getData.js"></script>
</body>
</html>