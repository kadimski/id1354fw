<?php

namespace Tasty_Recipes\View;

use Id1354fw\View\AbstractRequestHandler;
use Tasty_Recipes\Util\Constants;

/**
 * Visar pancakes.php
 */
class Show_pancakes_recipe extends AbstractRequestHandler
{ 
    protected function doExecute()
    {
        $recipe = 'pancakes';
        $controller = $this->session->get(Constants::CONTROLLER_KEY_NAME);
        $this->addVariable('comments', $controller->getComments($recipe));
        
        $controller = $this->session->set(Constants::CONTROLLER_KEY_NAME, $controller);
        
        return 'pancakes_recipe';
    }
}
