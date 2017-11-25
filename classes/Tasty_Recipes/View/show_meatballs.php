<?php

namespace Tasty_Recipes\View;

use Id1354fw\View\AbstractRequestHandler;

/**
 *  Visar meatballs_recipe.php
 */
class show_meatballs extends AbstractRequestHandler
{
    protected function doExecute()
    {
        return 'meatballs_recipe';
    }
}