<?php

namespace Tots\Templates\Http\Controllers\Components;


use Illuminate\Http\Request;
use Tots\Core\Helpers\StringHelper;
use Tots\Templates\Models\TotsComponent;

class UpdateCurrentController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id, Request $request)
    {
        // Process validations
        $this->validate($request, [
            'title' => 'required|min:3',
            'type' => 'required',
        ]);
        // Get Current Component
        $item = $request->input(TotsComponent::class);
        // Update values
        $item->title = $request->input('title');
        $item->slug = StringHelper::createSlug($item->title);
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