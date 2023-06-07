<?php

namespace Tots\Templates\Http\Controllers\Functions;

use Tots\Templates\Models\TotsFunction;
use Illuminate\Http\Request;

class RemoveByIdController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id)
    {
        $item = TotsFunction::where('id', $id)->first();
        if($item === null) {
            throw new \Exception('Item not exist');
        }
        $item->delete();
        return ['deletes' => $id];
    }
}