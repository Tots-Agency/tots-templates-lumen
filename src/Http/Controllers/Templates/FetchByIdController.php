<?php

namespace Tots\Templates\Http\Controllers\Templates;

use Tots\Templates\Models\TotsTemplate;
use Illuminate\Http\Request;

class FetchByIdController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id, Request $request)
    {
        $item = TotsTemplate::where('id', $id)->first();
        if($item === null) {
            throw new \Exception('Item not exist');
        }
        return $item;
    }
}