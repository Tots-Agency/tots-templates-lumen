<?php

namespace Tots\Templates\Http\Middlewares;

use Closure;
use Tots\Templates\Models\TotsPage;

class PageBySlugMiddleware
{
    /**
     * Obtiene la cuenta
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $pageId = $request->input('page_id') ?? $request->route('page_id') ?? $request->input('id');
        if($pageId <= 0){
            throw new \Exception('The page id is required');
        }

        $pageSlug = $request->input('slug') ?? $request->route('slug');
        if($pageSlug == ''){
            throw new \Exception('The page slug is required');
        }

        $page = TotsPage::where('id', $pageId)->where('slug', $pageSlug)->first();
        if($page === null){
            throw new \Exception('The page not exist');
        }

        return $next($request->merge([TotsPage::class => $page]));
    }
}
