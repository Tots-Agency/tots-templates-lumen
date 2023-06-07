<?php

namespace Tots\Templates\Http\Controllers\Functions;

use Tots\Templates\Models\TotsFunction;
use Illuminate\Http\Request;

class FetchByIdController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id, Request $request)
    {
        $item = TotsFunction::where('id', $id)->first();
        if($item === null) {
            throw new \Exception('Item not exist');
        }
        return $item;
    }
}