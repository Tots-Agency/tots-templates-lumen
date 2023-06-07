<?php

namespace Tots\Templates\Http\Controllers\Functions;

use Tots\Templates\Models\TotsFunction;
use Illuminate\Http\Request;

class UpdateController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id, Request $request)
    {
        $item = TotsFunction::where('id', $id)->first();
        if($item === null) {
            throw new \Exception('Item not exist');
        }
        // Process validations
        $this->validate($request, [
            'title' => 'required|min:3',
                            'slug' => 'required|min:3',
                            'type' => 'required|min:3',
                            'status' => 'required|min:3',
                            'data' => 'required|min:3',
                
        ]);
        // Update values
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