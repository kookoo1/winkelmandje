<?php
require_once 'includes/Winkelmand.php';
require_once 'includes/db.php';

session_start();




if ($_GET['type'] === 'add') {

    if (!isset($_SESSION['winkelmand'])) {
        $_SESSION['winkelmand'] = new Winkelmand();
    }


    $gsm = array();
    foreach ($items as $item) {

        if ((int) $item['id'] === (int)$_GET['id']) {
            $gsm = $item;
            break; // stop hier, we hebben ons toestel gevonden
        }
    }



    $_SESSION['winkelmand']->toevoegenAanMand($gsm);
}
?>

<html>
    <head>
        <title>
            Basket
        </title>
    </head>
    <body>

        <?php
        $totaalAantal = 0;
        $totaalPrijs = 0;

        $basket = '<ul>';

        foreach ($_SESSION['winkelmand']->mandWeergeven() as $product) {
            $totaalAantal += $product['aantal'];
            $totaalPrijs += ($product['aantal'] * $product['prijs'] );

            $basket .= '<li>Product : ' . $product['titel'] . '- aantal' .
                    $product['aantal'] . ' -prijs: ' . $product['prijs'] . '&euro;</li>';
        }

        $basket .='</ul>';

        echo '<hr />Totale prijs voor : ' . $totaalAantal . ' stuk(s) is ' . $totaalPrijs . "&euro;";
        echo $basket;
        ?>
        
        <?php
        
            if (isset($_POST['email'])) {
//                if(mail($_POST['email'], $subject, $description)) {
                if(mail($_POST['email'], 'Bestelling', 'Description')) {
                    unset($_SESSION['winkelmand']);
                }
                echo 'Bestelling werd geplaatst!';
                
                header('refresh: 5; url=/shop');
            }
        
        ?>
        
        
        <form method="post" action="#">
            
            <input type="text" name="email" />
            <input type="submit" value="Bestellen" />
        </form>
        
        
    </body>


</html>