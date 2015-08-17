<?php
	require_once('../auth.php');
?>

<!DOCTYPE html>
<html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>E-Admin</title>
            <meta name="description" content="E-Opinatus, Online Store">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="css/style.css">
            <script src="argiepolicarpio.js"></script>
            <script src="js/application.js"></script>	
            <link href="src/facebox.css" media="screen" rel="stylesheet">
            <script src="js/jquery-1.10.2.min.js"></script>
            <script src="src/facebox.js"></script>
            <script>
            jQuery(document).ready(function($) {
                $('a[rel*=facebox]').facebox({
                    loadingImage : 'src/loading.gif',
                    closeImage   : 'src/closelabel.png'
                })
            });
            </script>
        </head>

    <body>
    
        <div class="container_16" id="wrapper">	      
            <div style="position:relative;">
            
            <div class="grid_8" id="logo">
                <?php
                    mysql_connect("localhost","root","pass");
                    mysql_select_db("tutshop");
                    $query = mysql_query("select * from user");
                    while($row=mysql_fetch_array($query)){
                    $name = $row['username'];
                ?>
                <?php echo "Welcome " ."<font color='#86bde8'>".$name ."</font>" ;?>
                <?php } ?>
            </div>
            <div class="grid_8">
        
                <div id="user_tools"><span><a href="../">Logout</a></span></div>
            </div>
            
            <div class="grid_16" id="header">
                <div id="menu">
                    <ul class="group" id="menu_group_main">
                        <li><a href="index.php"><span class="outer"><span class="inner dashboard">Product Management</span></span></a></li>       
                    </ul>
                </div>
            </div>


        
            <div class="grid_16" id="content"> 
                <div class="grid_9">
                    <h1 class="dashboard">Products</h1>
                </div>
            <div class="clear"></div>
            <div id="portlets">
                <div class="clear"></div>
                <div class="portlet">
                    <div class="portlet-header fixed"><img src="images/icons/user.gif" width="16" height="16" alt="user" /> 
                    <label for="filter">Search</label> <input type="text" name="filter" value="" id="filter" />
                    <a rel="facebox" href="addproduct.php">Add Product</a>
                    </div>
                    <div class="portlet-content nopadding">
                        <form action="" method="post">

                            <table cellpadding="1" cellspacing="1" id="resultTable">
                                <thead>
                                    <tr>
                                        <th  style="border-left: 1px solid #C1DAD7"> Name </th>
                                        <th> Category </th>
                                        <th> Rate </th>
                                        <th> Description </th>
                                        <th> Image </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include('../connect.php');
                                        $result = mysql_query("SELECT * FROM products order by id DESC");
                                        while($row = mysql_fetch_array($result))
                                            {
                                                echo '<tr class="record">';
                                                echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['name'].'</td>';
                                                echo '<td><div align="left">'.$row['category_id'].'</div></td>';
                                                echo '<td><div align="left">'.$row['price'].'</div></td>';
                                                echo '<td><div align="left">'.$row['description'].'</div></td>';
                                                echo '<td><a rel="facebox" href="editproductimage.php?id='.$row['id'].'"><img src="../../resources/images/'.$row['image'].'" width="100" height="100"></a></td>';
                                                echo '<td><div align="center"><a rel="facebox" class="edit_inline" href="editproductetails.php?id='.$row['id'].'">Edit</a> | <a href="#" id="'.$row['id'].'" class="delbutton delete_inline" title="Click To Delete">Delete</a></div></td>';
                                                echo '</tr>';
                                            }
                                        ?> 
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>  
            </div>
            <div class="clear"></div>   
            </div>
        <div class="clear"> </div>

            </div>
        </div>

        <div class="container_16" id="footer">Website Administration by <a href="#top">Bruno Feijão</a></div>
        <script>
            $(function() {
                $(".delbutton").click(function(){
                    // Guarda o link numa variável chamada element
                    var element = $(this);
                    // Procura o id do link que foi clicado
                    var del_id = element.attr("id");
                    // Constrói o URL para enviar
                    var info = 'id=' + del_id;
                        if(confirm("Are you sure you want to delete this update? There is NO going back once you delete!")) {
                            $.ajax({
                                type: "GET",
                                url: "deleteproduct.php",
                                data: info,
                                success: function(){

                                }
                            });
                            $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
                            .animate({ opacity: "hide" }, "slow");
                        }
                        return false;
                });
            });
        </script>
    </body>
</html>
