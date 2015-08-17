<?php
	include('../connect.php');
        $roomid = $_POST['roomid'];
        $type=$_POST['type'];
        $cat=$_POST['category_id'];
        $rate=$_POST['rate'];
        $description=$_POST['description'];
        mysql_query("UPDATE products SET name='$type', category_id='$cat', description='$description', price='$rate' WHERE id='$roomid'");
    header("location: index.php");
?>


