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
    
    public function registerUser($username, $password, &$status)
    {
        if(empty($username) || empty($password))
        {
            $status = 'empty';
        }
        elseif ($this->userDatabaseHandler->checkUsernameTaken($username) > 0)
        {
            $status = 'usernametaken';
        }
        else
        {
            $this->userDatabaseHandler->registerUser($username, $password);
            $status = 'success';
        }    
    }
}