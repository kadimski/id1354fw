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
                $recipe = "pancakes";
                include_once '../Includes/comment_databasehandler.php';
                include_once '../Includes/delete_comment.php';
                include_once '../Includes/get_comments.php';
                
                if(isset($_SESSION['id']))
                {
                    echo '<h3>Kommentera:</h3>
                            <form method="POST" action="../Includes/set_comment.php">
                                <input type="hidden" name="username" value="'.$_SESSION['usr'].'">
                                <textarea rows="4" cols="70" name="comment"></textarea><br>
                                <input type="hidden" name="recipe" value="'.$recipe.'">
                                <input type="submit" name="send_comment" value="Skicka kommentar">
                            </form>';
                }
            ?>
        </div>    
    </body>
</html>