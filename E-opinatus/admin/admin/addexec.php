<?php
include('../connect.php');

	if (!isset($_FILES['image']['tmp_name'])) {
	   echo "";
	}else{
        $file=$_FILES['image']['tmp_name'];
        $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name= addslashes($_FILES['image']['name']);
        $image_size= getimagesize($_FILES['image']['tmp_name']);

        if ($image_size==FALSE) {
            echo "That's not an image!";		
        }else{
            move_uploaded_file($_FILES["image"]["tmp_name"],"../../resources/images/" . $_FILES["image"]["name"]);	
                $location=$_FILES["image"]["name"];
                $type=$_POST['type'];
                $cat=$_POST['category_id'];
                $rate=$_POST['rate'];
                $description=$_POST['description'];
                $update=mysql_query("INSERT INTO products (name, category_id, price, description, image) VALUES('$type','$cat','$rate','$description','$location')");
        header("location: index.php");
                exit();

            }
	}
?>
