<?php

namespace Tots\Templates\Http\Middlewares;

use Closure;
use Tots\Templates\Models\TotsTemplate;

class TemplateBySlugMiddleware
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
        $templateId = $request->input('template_id') ?? $request->input('id');
        if($templateId <= 0){
            throw new \Exception('The template id is required');
        }

        $templateSlug = $request->input('slug');
        if($templateSlug == ''){
            throw new \Exception('The template slug is required');
        }

        $account = TotsTemplate::where('id', $templateId)->where('slug', $templateSlug)->first();
        if($account === null){
            throw new \Exception('The template not exist');
        }

        return $next($request->merge([TotsTemplate::class => $account]));
    }
}
