<?php

namespace Tots\Templates\Http\Controllers\Pages;

use Tots\Templates\Models\TotsPage;
use Illuminate\Http\Request;

class RemoveByIdController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id)
    {
        $item = TotsPage::where('id', $id)->first();
        if($item === null) {
            throw new \Exception('Item not exist');
        }
        $item->delete();
        return ['deletes' => $id];
    }
}