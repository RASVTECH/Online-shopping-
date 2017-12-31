// $(document).ready(function(){
//     $('#category').change(function(){
//         var id = $(this).find(":selected").val();
//         console.log("ID", id);
//         var dataString = 'cat_id='+id;
//         $.ajax({
//             url : '/rasv/Online-shopping-/admin/addproducts.php',
//             data : dataString,
//             success : function(categoryData){
//                 console.log(categoryData);
//             }
//         });
//     });
// });

function fetch_select(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data.php',
 data: {
  cat_id:val
 },
 success: function (response) {
  document.getElementById("subCategory").innerHTML=response; 
 }
 });
}