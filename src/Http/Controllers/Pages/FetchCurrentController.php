<?php

namespace Tots\Templates\Http\Controllers\Pages;

use Tots\Templates\Models\TotsPage;
use Illuminate\Http\Request;
use Tots\Templates\Services\TotsComponentService;

class FetchCurrentController extends \Laravel\Lumen\Routing\Controller
{
    public function handle(Request $request)
    {
        // Get Page
        $page = $request->input(TotsPage::class);
        // Convert To Array
        $data = $page->load(['component', 'template'])->toArray();
        // Init Service
        $service = new TotsComponentService();
        if($page->data != null){
            $service->setGlobalParams($page->data);
        }
        // Process HTML
        $data['component']['html'] = $service->renderHtml($page->component);
        // Return Data
        return $data;
    }
}