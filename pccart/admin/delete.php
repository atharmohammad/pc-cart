<?php

include_once('connection.php');

$id = $_GET['pid'];

$sql = "DELETE FROM person WHERE person_id = {$id}";
$result = mysqli_query($conn,$sql) or die("unsucessful");

header("Location: http://localhost/pc-cart/pccart/admin/admin-table.php");

mysqli_close($conn);

?>