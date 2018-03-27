<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
     <title>Phancy Phoods: Shopping Cart</title>
    </head>
    <body>
        <?php 
            // getting the info and displaying it here:
            if (isset($_POST['recipeName']))
            {
                $_SESSION['recipe'] = $_POST['recipeName'];
            }
            else
            {
                echo 'Nothing.';
            }
        ?>
    </body>
</html>