<?php

namespace Tots\Templates\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Tots\Templates\Models\TotsPage;

class CreateController extends \Laravel\Lumen\Routing\Controller
{
    public function handle(Request $request)
    {
        // Process validations
        $this->validate($request, [
            'template_id' => 'required|min:3',
                            'component_id' => 'required|min:3',
                            'title' => 'required|min:3',
                            'slug' => 'required|min:3',
                            'type' => 'required|min:3',
                            'status' => 'required|min:3',
                            'data' => 'required|min:3',
                
        ]);
        // Create new model
        $item = new TotsPage();
        $item->template_id = $request->input('template_id');
                        $item->component_id = $request->input('component_id');
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