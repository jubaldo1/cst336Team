<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
     <title>Phancy Phoods: Shopping Cart</title>
    </head>
    <body>
        <?php 
            echo '<a href="index.php">Phancy Phoods</a>';
        
            // getting the info and displaying it here:
            /*if (isset($_POST['recipeName']))
            {
                //$_SESSION['recipes'] = $_POST['recipeName'];
                echo $_SESSION['recipes'];
            }
            else
            {
                echo '<br>' . 'Nothing.';
            }*/
        ?>
        
        <?php
            if (isset($_SESSION['recipes'])) {
            echo "<strong>Your cart:</strong><ol>";
            foreach (unserialize($_SESSION['recipes']) as $p) {
                echo "<li>".$p."</li>";
            }
            echo "</ol>";
            }
        ?>
    </body>
</html>