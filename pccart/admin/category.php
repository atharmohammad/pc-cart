<?php
session_start();
if (!isset($_SESSION['person_id']))
  header('Location: http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login-panel.php');

else if ($_SESSION['role'] == 0)
     header('Location: http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/dealer-home.php');

else if ($_SESSION['role'] != 1)
     die('404 Page not Found');

############# included connection.php
include_once ('connection.php');
$result = mysqli_query($conn,"SELECT * FROM category ORDER BY cat_id DESC");

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/style.css">
    <title></title>
  </head>
<body>


<?php
################ included navbar file ################################################
  include_once ('navbar.php');
  #getting data
  if (mysqli_num_rows($result) > 0) {
?>


    <table>
    <tr>
        <th>CategoryID</th>
        <th>Category</th>
        <th>Category image</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>


<?php
##########php code
while($row = mysqli_fetch_array($result)) {
 ?>


    <tr>

        <td><?php echo $row["cat_id"]; ?></td>
        <td><?php echo $row["cat_name"]; ?></td>
        <td ><img src="<?php echo $cat_image_location.$row['cat_img']; ?>" alt="" border="3" height="150" width="250;"></img></td>
        <td><a href='editcategory.php?cid=<?php echo $row["cat_id"]; ?>'><i class="fa fa-pencil-square-o" style="font-size:30px;color:black" aria-hidden="true"></i></a></td>
        <td><a href='#' ><i class="fa fa-trash" style="font-size:30px;color:orangered" aria-hidden="true"></i></a></td>
    </tr>




<?php
############### php code
}
?>
    </table>


<?php
############### php code
}
else
    echo "No result found";
?>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>