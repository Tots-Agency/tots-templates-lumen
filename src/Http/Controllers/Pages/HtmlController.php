<?php

namespace Tots\Templates\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Tots\Templates\Models\TotsPage;

class HtmlController extends \Laravel\Lumen\Routing\Controller
{
    public function handle(Request $request)
    {
        // Get Page
        $page = $request->input(TotsPage::class);
        // Return HTML
        return Blade::render($page->component->html, ['test' => 'First variable']);
    }
}