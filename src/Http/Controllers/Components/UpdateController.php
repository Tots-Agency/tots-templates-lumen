<?php

namespace Tots\Templates\Http\Controllers\Components;


use Illuminate\Http\Request;
use Tots\Core\Helpers\StringHelper;
use Tots\Templates\Models\TotsComponent;

class UpdateController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id, Request $request)
    {
        $item = TotsComponent::where('id', $id)->first();
        if($item === null) {
            throw new \Exception('Item not exist');
        }
        // Process validations
        $this->validate($request, [
            'template_id' => 'required',
            'title' => 'required|min:3',
            'type' => 'required',
        ]);
        // Update values
        $item->template_id = $request->input('template_id');
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