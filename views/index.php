<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tasty Recipes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="reset.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='https://fonts.googleapis.com/css?family=Atma' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Alef' rel='stylesheet'>
    </head>
    <body>
        <h1 class="logo"><a href="index.php">Tasty Recipes</a></h1>
    
        <nav>
            <ul class="meny">
                <li><a href="index.php">Hem</a></li>
                <li><a href="Meatballs_recipe/meatballs_recipe.php">Köttbullar</a></li>
                <li><a href="Pancakes_recipe/pancakes_recipe.php">Pannkakor</a></li>
                <li><a href="Calendar/calendar.php">Kalender</a></li>
                <?php
                    if (isset($_SESSION['id'])) 
                    {
                        echo '<li><a href="Includes/logout.php">Logga ut '.$_SESSION['usr'].'</a></li>';
                    } 
                    else 
                    {
                        echo '<li><a href="Login/login.php">Logga in</a></li>';
                        echo '<li><a href="Signup/signup.php">Registrera dig</a></li>';
                    }
                ?>
            </ul>
        </nav>
        
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