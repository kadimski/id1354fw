<!DOCTYPE html>
<html>
    <head>
        <title>Tasty Recipes</title>
        <?php include_once 'resources/includes/css.html';?>
    </head>
    <body>
        <?php
            include_once 'resources/includes/logo_and_meny.php';
        ?>
        
        <div id="introduction">
            <h2>Välkommen till Tasty Recipes <?php use Tasty_Recipes\Util\Constants; if(($this->session->get(Constants::LOGGED_IN_USER)) != null) { echo $this->session->get(Constants::LOGGED_IN_USER);} ?>!</h2>

            <p>På denna sida kommer du hitta många olika smakrika recepet<br> 
            Klicka på en maträtt i menyn ovan för att besöka dess recept<br>
            Om du vill se månadens rätter kan du hitta dessa i kalendern ovan<br>
            <?php
                if(($this->session->get(Constants::LOGGED_IN_USER)) != null)
                {
                    echo 'För att logga ut, klicka på knappen ovan';
                }
                else
                {
                    echo 'För att logga in eller registrera dig, klicka på knapparna ovan';
                }
            ?>
            </p>
        </div>
    </body>
</html>