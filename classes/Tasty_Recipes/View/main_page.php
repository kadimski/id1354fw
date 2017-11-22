<?php

namespace Tasty_Recipes\View;

use Id1354fw\View\AbstractRequestHandler;

/**
 * Visar index.php för hemsidan
 */
class main_page extends AbstractRequestHandler
{
    protected function doExecute()
    {
        return 'index';
    }
}