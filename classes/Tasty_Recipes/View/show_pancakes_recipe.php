<?php

namespace Tasty_Recipes\View;

use Id1354fw\View\AbstractRequestHandler;

/**
 * Visar pancakes.php
 */
class show_pancakes_recipe extends AbstractRequestHandler
{ 
    protected function doExecute()
    {
        return 'pancakes_recipe';
    }
}