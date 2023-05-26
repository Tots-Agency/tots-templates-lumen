<?php

namespace Tots\Templates\Http\Controllers\Pages;

use Tots\Templates\Models\TotsPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateBulkController extends \Laravel\Lumen\Routing\Controller
{
    public function handle(Request $request)
    {
        // Get all params
        $items = $request->input('tots_template_pages');
        // Init Transactions
        DB::beginTransaction();
        // Data
        $data = [];
        try {
            // Each item
            foreach($items as $item){
                $controller = new UpdateController();
                $data[] = $controller->handle($item->id, new Request($item));
            }
            // Commit transactions
            DB::commit();
        } catch (\Throwable $th) {
            // Cancel transaction
            DB::rollBack();
            // Return error
            throw $th;
        }        

        return ['tots_template_pages' => $data];
    }
}