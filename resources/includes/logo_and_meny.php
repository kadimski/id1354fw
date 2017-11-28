<?php
    session_start();
?>
    <h1 class="logo"><a href="show_index">Tasty Recipes</a></h1>

    <nav>
        <ul class="meny">
            <li><a href="show_index">Hem</a></li>
            <li><a href="show_meatballs_recipe">Köttbullar</a></li>
            <li><a href="show_pancakes_recipe">Pannkakor</a></li>
            <li><a href="show_calendar">Kalender</a></li>
            <?php
                if(isset($_SESSION['id']))
                {
                    echo '<li><a href="../Includes/logout.php">Logga ut '.$_SESSION['usr'].'</a></li>';
                }
                else
                {
                    echo '<li><a href="show_login">Logga in</a></li>';
                    echo '<li><a href="show_signup">Registrera dig</a></li>';
                }
            ?>
        </ul>
    </nav>