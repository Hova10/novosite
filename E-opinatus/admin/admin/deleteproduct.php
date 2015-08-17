<?php
    include('../connect.php');
        if($_GET['id']) {
            $id=$_GET['id'];
            $sql = "delete from products where id='$id'";
            mysql_query( $sql);
        }
?>