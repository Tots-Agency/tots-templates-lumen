<?php

namespace Tots\Templates\Http\Controllers\Pages;

use Tots\Templates\Models\TotsPage;
use Illuminate\Http\Request;

class FetchCurrentController extends \Laravel\Lumen\Routing\Controller
{
    public function handle($id, Request $request)
    {
        // Get Page
        $page = $request->input(TotsPage::class);
        // return page
        return $page->load(['component', 'template']);
    }
}