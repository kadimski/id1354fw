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
            <h2>Välkommen till Tasty Recipes <?php if(isset($_SESSION['id'])) { echo $_SESSION['usr'];} ?>!</h2>

            <p>På denna sida kommer du hitta många olika smakrika recepet<br> 
            Klicka på en maträtt i menyn ovan för att besöka dess recept<br>
            Om du vill se månadens rätter kan du hitta dessa i kalendern ovan<br>
            <?php
                if(isset($_SESSION['id']))
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