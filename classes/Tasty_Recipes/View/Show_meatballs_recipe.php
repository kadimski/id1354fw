<?php

namespace Tasty_Recipes\View;

use Id1354fw\View\AbstractRequestHandler;
use Tasty_Recipes\Util\Constants;

/**
 *  Visar meatballs_recipe.php
 */
class Show_meatballs_recipe extends AbstractRequestHandler
{
    protected function doExecute()
    {
        $recipe = 'meatballs';
        $controller = $this->session->get(Constants::CONTROLLER_KEY_NAME);
        $controller->getComments($recipe);
        
        return 'meatballs_recipe';
    }
}