<?php

namespace Tasty_Recipes\Model;

use Tasty_Recipes\Integration\UserDatabaseHandler;

/**
 * Description of Login
 */
class Login
{
    private $userDatabaseHandler;

    public function __construct()
    {
        $this->userDatabaseHandler = new UserDatabaseHandler();
    }

    public function loginUser($username, $password, &$status)
    {
        if(empty($username) || empty($password))
        {
            $status = 'empty';
        }
        elseif($this->userDatabaseHandler->checkUsername($username) < 1)
        {
            $status = 'wrong';
        }
        elseif(!($this->userDatabaseHandler->checkPassword($username, $password)))
        {
            $status = 'wrong';
        }
        else
        {
            $this->userDatabaseHandler->loginUser($username, $password);
            $status = 'success';
        }
    }
}
