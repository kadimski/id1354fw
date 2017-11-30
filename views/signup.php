<!DOCTYPE html>
<html>
    <head>
        <title>Tasty recipes - Registration</title>
        <?php include_once 'resources/includes/css.html';?>
    </head>
    <body>
        <?php
            include_once 'resources/includes/logo_and_meny.php';
        ?>
              
        <div class="background">
            <h1>Registrera dig:</h1>
            <form action="Signup_form" method="POST">
                Användarnamn:<input type="text" name="username" placeholder="Användarnamn" required>
                <?php
                    if (isset($status) && $status == 'empty') 
                    {
                        echo 'Fyll i användarnamn och lösenord';
                    }
                    elseif (isset($status) && $status == 'usernametaken')
                    {
                        echo 'Användarnamnet är taget';
                    }
                ?><br>
                Lösenord:<input type="password" name="password" placeholder="Lösenord" required><br>
                <input type="submit" name="register" value="Registrera dig">
            </form>     
        </div>
    </body>
</html>