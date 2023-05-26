<?php

namespace Tots\Templates\Http\Controllers\Templates;

use Tots\Templates\Models\TotsTemplate;
use Illuminate\Http\Request;

class ListController extends \Laravel\Lumen\Routing\Controller
{
    public function handle(Request $request)
    {
        // Create query
        $elofilter = \Tots\EloFilter\Query::run(TotsTemplate::class, $request);
        // Custom filters
        //$elofilter->getQueryRequest()->addWhere('id', 2);
        // Execute query
        return $elofilter->execute();
    }
}