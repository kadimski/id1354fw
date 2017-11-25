<?php

namespace Tasty_Recipes\View;

use Id1354fw\View\AbstractRequestHandler;

/**
 * Visar calendar.php
**/
class show_calendar extends AbstractRequestHandler
{ 
    protected function doExecute()
    {
        return 'calendar';
    }
}