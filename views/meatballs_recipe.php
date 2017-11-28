<!DOCTYPE html>
<html>
    <head>
        <title>Tasty Recipes - Köttbullar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../resources/css/reset.css">
        <link rel="stylesheet" type="text/css" href="../../resources/css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Atma' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Alef' rel='stylesheet'>
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
                $recipe = "meatballs";
                include_once '../Includes/comment_databasehandler.php';
                include_once '../Includes/get_comments.php';
                include_once '../Includes/delete_comment.php';
                
                
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
