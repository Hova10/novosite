<?php
	include('../connect.php');
        $id=$_GET['id'];
        $result = mysql_query("SELECT * FROM products where id='$id'");
            while($row = mysql_fetch_array($result)) {
                $image=$row['image'];
            }
?>
<img src="../../resources/images/<?php echo $image ?>">
    <form action="editpicexec.php" method="post" enctype="multipart/form-data"><br>
        <input type="hidden" name="roomid" value="<?php echo $id=$_GET['id']; ?>">Select Image<br>
        <input type="file" name="image"><br>
        <input type="submit" value="Upload">
    </form>