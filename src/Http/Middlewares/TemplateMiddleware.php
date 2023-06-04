<?php

namespace Tots\Templates\Http\Middlewares;

use Closure;
use Tots\Templates\Models\TotsTemplate;

class TemplateMiddleware
{
    /**
     * Obtiene el template
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $templateId = $request->input('template_id') ?? $request->route('template_id') ?? $request->input('id');
        if($templateId <= 0){
            throw new \Exception('The template id is required');
        }

        $template = TotsTemplate::where('id', $templateId)->first();
        if($template === null){
            throw new \Exception('The template not exist');
        }

        return $next($request->merge([TotsTemplate::class => $template]));
    }
}
