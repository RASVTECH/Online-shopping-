<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Add Products</title>
</head>
<body>

<label for="category">Category</label>
<select onchange="fetch_select(this.value);">
    <option >Select Category</option>
    <?php 
        include "../config.php";
        $select_category_query="select category_id,category_name from ekart_category";
        $resultset = mysqli_query($conn, $select_category_query) or die("database error:". mysqli_error($conn));
        while( $rows = mysqli_fetch_assoc($resultset) ) {?>
        <option value="<?php echo $rows['category_id']; ?>"><?php echo $rows['category_name']; ?></option>
    <?php } ?>
</select>
<label for="Subcategory">Sub Category</label> 
<select id="subCategory">
 <option value="">Sub Category </option>
</select>


<script type="text/javascript" src="../js/jquery-3.2.1.js"></script> 
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/getData.js"></script>
</body>
</html>