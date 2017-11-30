<?php

namespace Tasty_Recipes\View;

use Id1354fw\View\AbstractRequestHandler;
use Tasty_Recipes\Util\Constants;
use Tasty_Recipes\Controller\Controller;

/**
 * Description of Logout
 */
class Logout extends AbstractRequestHandler
{   
    protected function doExecute()
    {
        $this->session->invalidate();
        $this->session->restart();
        $this->session->set(Constants::CONTROLLER_KEY_NAME, new Controller());
        return 'index';
    }
}
