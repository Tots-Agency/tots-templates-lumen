<?php

namespace Tots\Templates\Http\Controllers\Functions;

use Illuminate\Http\Request;
use Tots\Templates\Models\TotsFunction;

class CreateController extends \Laravel\Lumen\Routing\Controller
{
    public function handle(Request $request)
    {
        // Process validations
        $this->validate($request, [
            'title' => 'required|min:3',
                            'slug' => 'required|min:3',
                            'type' => 'required|min:3',
                            'status' => 'required|min:3',
                            'data' => 'required|min:3',
                
        ]);
        // Create new model
        $item = new TotsFunction();
        $item->title = $request->input('title');
                        $item->slug = $request->input('slug');
                        $item->type = $request->input('type');
                        $item->status = $request->input('status');
                        $item->data = $request->input('data');
                
        // Save new model
        $item->save();
        // Return data
        return $item;
    }
}