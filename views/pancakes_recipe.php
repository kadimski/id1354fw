<!DOCTYPE html>
<html>
    <head>
        <title>Tasty recipes - Pannkakor</title>
        <?php include_once 'resources/includes/css.html';?>
    </head>
    <body>
        <?php
            include_once 'resources/includes/logo_and_meny.php';
        ?> 
        
        <div class="background">
            <h2>Pannkakor</h2>
                <p>En klar vardagsfavorit! Här är ett enkelt grundrecept på tunna pannkakor, bara att steka och servera med sylt, grädde, glass eller kvarg.</p>
                
            <img id="pancakesPicture" alt="Pannkakor" src="../../resources/pictures/pancakes.jpg">
            
            <h3>Ingredienser(8 stycken, 15 min):</h3>
                <ul>
                    <li>3 dl vetemjöl</li>
                    <li>6 dl mjölk</li>
                    <li>3 ägg</li>
                    <li>½ tsk salt</li>
                    <li>2 msk smör</li>
                </ul>
        
            <h3>Gör så här:</h3>
                <ol>
                    <li>Vispa ut mjölet i hälften av mjölken till en slät smet.</li>
                    <li>Vispa i resterande mjölk, ägg och salt.</li>
                    <li>Låt smeten svälla ca 10 min.</li>
                    <li>Smält smör i en stekpanna och häll ner i smeten. Grädda tunna pannkakor.</li>
                </ol>
        
            <h3>Kommentarer:</h3>
                <p>Stina: Väldigt goda pannkakor!</p>
                
            <?php
                use Tasty_Recipes\Util\Constants;
                $recipe = 'pancakes';
                
                foreach($comments as $comment)
                {
                    echo '<form method="POST" action="Delete_comment"><p>' . $comment['username'] . ': ' . $comment['message'] .
                    '<input type = "hidden" name = "username" value = "' . $this->session->get(Constants::LOGGED_IN_USER) . '" >' .
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