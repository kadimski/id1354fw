<?php

namespace Tasty_Recipes\View;

use Id1354fw\View\AbstractRequestHandler;

/**
 *  Visar index.php
 */
class show_index extends AbstractRequestHandler
{
    protected function doExecute()
    {
        return 'index';
    }
}