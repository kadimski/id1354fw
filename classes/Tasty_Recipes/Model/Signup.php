<?php

namespace Tasty_Recipes\Model;

use Tasty_Recipes\Integration\UserDatabaseHandler;

/**
 * Description of Signup
 */
class Signup
{
    private $userDatabaseHandler;
    
    public function __construct()
    {
        $this->userDatabaseHandler = new UserDatabaseHandler();
    }
    
    public function registerUser($userToSignup, &$status)
    {
        if(empty($userToSignup->getUsername()) || empty($userToSignup->getPassword()))
        {
            $status = 'empty';
        }
        elseif (mysqli_num_rows($this->userDatabaseHandler->checkUsernameTaken($userToSignup->getUsername())) > 0)
        {
            $status = 'usernametaken';
        }
        else
        {
            $this->userDatabaseHandler->registerUser($userToSignup);
            $status = 'success';
        }    
    }
}