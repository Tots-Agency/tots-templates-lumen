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
            'title' => 'required|min:3',
            'type' => 'required',
        ]);
        // Update Values
        $controller = new UpdateCurrentController();
        return $controller->handle($id, $request->merge([TotsComponent::class => $item]));
    }
}