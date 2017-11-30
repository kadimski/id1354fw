<?php

namespace Tasty_Recipes\View;

use Id1354fw\View\AbstractRequestHandler;
use Tasty_Recipes\Util\Constants;

/**
 * Description of signup_form
 */
class Signup_form extends AbstractRequestHandler
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
    
    public function setRegister($register)
    {
        
    }

    protected function doExecute()
    {
        $controller = $this->session->get(Constants::CONTROLLER_KEY_NAME);
        
        $status = ' ';
        $controller->signup($this->username, $this->password, $status);
        
        if($status == 'success')
        {
            $this->session->set(Constants::CONTROLLER_KEY_NAME, $controller);
            $this->addVariable('status', $status);
            return 'login';
        }
        elseif($status == 'empty' || $status == 'usernametaken')
        {
            $this->session->set(Constants::CONTROLLER_KEY_NAME, $controller);
            $this->addVariable('status', $status);
            return 'signup';
        }
    }
}
