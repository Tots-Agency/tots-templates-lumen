<?php

namespace Tots\Templates\Http\Controllers\Pages;

use Tots\Templates\Models\TotsPage;
use Illuminate\Http\Request;

class FetchByIdController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id, Request $request)
    {
        $item = TotsPage::where('id', $id)->first();
        if($item === null) {
            throw new \Exception('Item not exist');
        }
        return $item;
    }
}