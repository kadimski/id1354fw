<!DOCTYPE html>
<html>
    <head>
        <title>Tasty Recipes - Köttbullar</title>
        <?php include_once 'resources/includes/css.html';?>
    </head>
    <body>
        <?php
            include_once 'resources/includes/logo_and_meny.php';
        ?> 
        
        <div class="background">
            <h2>Köttbullar</h2>
                <p>Hemgjorda köttbullar slår det mesta. Här är ett bra grundrecept som du gärna kan servera med gräddsås, potatismos och lingonsylt, men stuvade makaroner är såklart en höjdare också!</p>
        
                <img id="meatballsPicture" alt="Köttbullar" src="../../resources/pictures/meatballs.jpg">
        
            <h3>Ingredienser(4 portioner, 15 min):</h3>
                <ul>
                    <li>500 g köttfärs</li>
                    <li>½ dl ströbröd</li>
                    <li>1 dl matlagningsgrädde 15%</li>
                    <li>2 msk finhackad lök</li>
                    <li>1 ägg</li>
                    <li>1 tsk salt</li>
                    <li>1 krm svartpeppar</li>
                    <li>2 msk smör-&rapsolja</li>
                </ul>
        
            <h3>Gör så här:</h3>
            <ol>
                <li>Blanda ströbröd och grädde.</li>
                <li>Låt svälla 10 min.</li>  
                <li>Lägg i färs, lök, ägg, salt och peppar. Rör till en jämn smet.</li>
                <li>Forma smeten till jämna bullar. Stek dem i smör-&rapsolja på medelvärme 3-5 min.</li>
            </ol>
        
            <h3>Kommentarer:</h3>
                <p>Stina: Väldigt goda köttbullar!</p>
                
            <?php
                use Tasty_Recipes\Util\Constants;
                $recipe = 'meatballs';
                
                foreach($comments as $comment)
                {
                    echo '<form method="POST" action="Delete_comment"><p>' . $comment['username'] . ': ' . $comment['message'] .
                    '<input type = "hidden" name = "username" value = "'.$this->session->get(Constants::LOGGED_IN_USER).'" >'.
                    '<input type="hidden" name="commentid" value="' . $comment['commentid'] . '">'.
                    '<input type="hidden" name="recipe" value="' . $recipe . '">';
                    
                    if ($this->session->get(Constants::LOGGED_IN_USER) != null && $comment['username'] == $this->session->get(Constants::LOGGED_IN_USER))
                    {
                        echo '<input type="submit" name="delete" value="Ta bort kommentar">' . '</p></form>';
                    } 
                    else
                    {
                        echo '' . '</p></form>';
                    }
                }
                
                if($this->session->get(Constants::LOGGED_IN_USER) != null)
                {
                    echo '<h3>Kommentera:</h3>
                            <form method="POST" action="Comment_form">
                                <input type="hidden" name="username" value="'.$this->session->get(Constants::LOGGED_IN_USER).'">
                                <textarea rows="4" cols="70" name="comment"></textarea><br>
                                <input type="hidden" name="recipe" value="'.$recipe.'">
                                <input type="submit" name="sendComment" value="Skicka kommentar">
                            </form>';
                }
            ?>
        </div>
    </body>
</html>