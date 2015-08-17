<?php 
define('SITE_PATH', 'http://brunofeijao.com/E-opinatus/');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Login</title>
        <link rel="stylesheet" href="main.css" media="screen">
    </head>
    <body>
        <div class="title-wrapper">
            <h2>Admin Login Form</h2>
        </div>

            <form method="post" action="login.php" name="contact-form" id="contact-form">	
                <div id="main">
                    <div class="one_third">
                        <label>Username:</label>
                        <p><input type="text" name="user" id="name" size="30" /></p>
                    </div>
                    <div class="one_third">
                        <label>Password:</label>
                        <p><input type="password" name="password" id="email" size="30" /></p>
                    </div>
                    <div class="one_third_last">
                    <label>&nbsp;</label>
                        <input  class="contact_button button" type="submit" name="submit" id="submit" value="Login" />
                    </div>
                </div>
            </form>
        <a href="<?php echo SITE_PATH; ?>"><input  class="contact_button button" type="submit" name="submit" id="submit" value="Back to Shop" /></a>
    </body>
</html>