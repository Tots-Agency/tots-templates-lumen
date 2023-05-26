<?php

namespace Tots\Templates\Http\Controllers\Templates;

use Tots\Templates\Models\TotsTemplate;
use Illuminate\Http\Request;
use Tots\Core\Helpers\StringHelper;

class UpdateController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id, Request $request)
    {
        $item = TotsTemplate::where('id', $id)->first();
        if($item === null) {
            throw new \Exception('Item not exist');
        }
        // Process validations
        $this->validate($request, [
            'title' => 'required|min:3',
            'slug' => 'required|min:3',
            'type' => 'required',
        ]);
        // Update values
        $item->title = $request->input('title');
        $item->slug = StringHelper::createSlug($item->title);
        $item->type = $request->input('type');
        $item->status = $request->input('status');
        $item->css_global = $request->input('css_global');
        $item->js_global = $request->input('js_global');
                
        // Save new model
        $item->save();
        // Return data
        return $item;
    }
}