
    <h1 class="logo"><a href="Show_index">Tasty Recipes</a></h1>

    <nav>
        <ul class="meny">
            <li><a href="Show_index">Hem</a></li>
            <li><a href="Show_meatballs_recipe">Köttbullar</a></li>
            <li><a href="Show_pancakes_recipe">Pannkakor</a></li>
            <li><a href="Show_calendar">Kalender</a></li>
            <?php
                use Tasty_Recipes\Util\Constants;
                
                if($this->session->get(Constants::LOGGED_IN_USER) != null)
                {
                    echo '<li><a href="Logout">Logga ut '.$this->session->get(Constants::LOGGED_IN_USER).'</a></li>';
                }
                else
                {
                    echo '<li><a href="Show_login">Logga in</a></li>';
                    echo '<li><a href="Show_signup">Registrera dig</a></li>';
                }
            ?>
        </ul>
    </nav>