<?php

namespace Tots\Templates\Http\Controllers\Components;

use Tots\Templates\Models\TotsComponent;
use Illuminate\Http\Request;
use Tots\Core\Helpers\StringHelper;

class CreateController extends \Laravel\Lumen\Routing\Controller
{
    public function handle(Request $request)
    {
        // Process validations
        $this->validate($request, [
            'template_id' => 'required',
            'title' => 'required|min:3',
            'type' => 'required',
        ]);
        // Create new model
        $item = new TotsComponent();
        $item->template_id = $request->input('template_id');
        $item->title = $request->input('title');
        $item->slug = StringHelper::createSlug($item->title);;
        $item->type = $request->input('type');
        $item->status = $request->input('status');
        $item->data = $request->input('data');
        $item->html = $request->input('html');
        $item->css = $request->input('css');
        $item->js = $request->input('js');
        // Save new model
        $item->save();
        // Return data
        return $item;
    }
}