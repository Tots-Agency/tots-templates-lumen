<?php

namespace Tots\Templates\Http\Controllers\Components;

use Tots\Templates\Models\TotsComponent;
use Illuminate\Http\Request;

class RemoveByIdController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id)
    {
        $item = TotsComponent::where('id', $id)->first();
        if($item === null) {
            throw new \Exception('Item not exist');
        }
        $item->delete();
        return ['deletes' => $id];
    }
}