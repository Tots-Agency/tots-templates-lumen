<?php

namespace Tots\Templates\Http\Controllers\Templates;

use Tots\Templates\Models\TotsTemplate;
use Illuminate\Http\Request;
use Tots\Core\Helpers\StringHelper;

class CreateController extends \Laravel\Lumen\Routing\Controller
{
    public function handle(Request $request)
    {
        // Process validations
        $this->validate($request, [
            'title' => 'required|min:3',
            'slug' => 'required|min:3',
            'type' => 'required',
        ]);
        // Create new model
        $item = new TotsTemplate();
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