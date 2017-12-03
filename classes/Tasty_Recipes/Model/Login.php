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

    public function loginUser($userToLogin, &$status)
    {
        if(empty($userToLogin->getUsername()) || empty($userToLogin->getPassword()))
        {
            $status = 'empty';
        }
        elseif(mysqli_num_rows($this->userDatabaseHandler->checkUsername($userToLogin->getUsername())) < 1)
        {
            $status = 'wrong';
        }
        elseif(!(password_verify ($userToLogin->getPassword(), $this->userDatabaseHandler->getPassword($userToLogin->getUsername()))))
        {
            $status = 'wrong';
        }
        else
        {
            $this->userDatabaseHandler->loginUser($userToLogin);
            $status = 'success';
        }
    }
}
