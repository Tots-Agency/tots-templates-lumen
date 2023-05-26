<?php

namespace Tots\Templates\Http\Controllers\Templates;

use Illuminate\Http\Request;
use Tots\Templates\Models\TotsTemplate;

class FetchController extends \Laravel\Lumen\Routing\Controller
{
    public function handle(Request $request)
    {
        return $request->input(TotsTemplate::class);
    }
}