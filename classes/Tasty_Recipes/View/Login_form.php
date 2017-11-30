<?php

namespace Tasty_Recipes\View;

use Id1354fw\View\AbstractRequestHandler;
use Tasty_Recipes\Util\Constants;

/**
 * Description of Login_form
 */
class Login_form extends AbstractRequestHandler
{
    private $username, $password;
            
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    public function setLogin($login)
    {
        
    }

    protected function doExecute()
    {
        $controller = $this->session->get(Constants::CONTROLLER_KEY_NAME);
        $status = ' ';
        $controller->login($this->username, $this->password, $status);
        
        if($status == 'success')
        {
            $this->session->set(Constants::CONTROLLER_KEY_NAME, $controller);
            return 'index';
        }
        elseif($status == 'empty' || $status == 'wrong')
        {
            $this->session->set(Constants::CONTROLLER_KEY_NAME, $controller);
            $this->addVariable('status', $status);
            return 'login';
        }
    }
}
