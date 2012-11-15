<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

ini_set('display_errors',1);
error_reporting(E_ALL);

//require_once 'includes/Winkelmand.php';
require_once 'includes/db.php';
session_start();
?>
<!doctype>

<html>
    <head>
        <title>
            GSM shop
        </title>
        <link href="css/style.css" rel="stylesheet" />
    </head>
    <body>

        <?php
        foreach ($items as $key => $value) {
            /*
              echo '<pre>';
              var_dump($items);
              echo '</pre>';
             * */
         ?>
            <div class ="item">
                <img src="http://placehold.it/150x100&text="<?= $value['titel']; ?>
                     <p><a href="basket.php?type=add&id=<?= $value['id']; ?>"Bestel <?= $value['titel']; ?></p>
            </div>


        <?php
        }
        ?>


    </body>
</html>