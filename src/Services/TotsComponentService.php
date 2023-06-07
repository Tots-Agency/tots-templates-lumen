<?php

namespace Tots\Templates\Services;

use Illuminate\Support\Facades\Blade;
use Tots\Templates\Models\TotsComponent;
use Tots\Templates\Models\TotsFunction;
use Tots\Templates\Views\TotsCustomViewComponent;
use voku\helper\HtmlDomParser;

class TotsComponentService
{
    protected $globalParams = [];

    public function renderHtml(TotsComponent $component)
    {
        // Get all include components
        $components = $this->fetchAllIncludesBytemplate($component->template_id);
        // Process all functions
        $params = $this->processFunctions($component, $components);
        // Process all components includes
        $html = $this->processComponents($component, $components);
        // Convert to Blade
        return Blade::render($html, array_merge($this->globalParams, $component->data, $params));
    }

    public function processFunctions(TotsComponent $component)
    {
        // Aca traer solo las funciones de ese componente
        //$functions = $component->functions;
        $functions = TotsFunction::all();
        $params = [];
        foreach ($functions as $function) {
            $params = array_merge($params, (new TotsFunctionService($function, $this->globalParams))->execute());
        }
        return $params;
    }

    public function processFunction($params, TotsComponent $component, $parentParams = [])
    {
        
    }

    public function processComponents(TotsComponent $component, $components)
    {
        $html = $component->html;
        foreach ($components as $comp) {
            $html = $this->processComponent($html, $comp, $component->data);
        }
        return $html;
    }

    public function processComponent($html, TotsComponent $component, $parentParams = [])
    {
        $htmlParsed = $html;

        $dom = HtmlDomParser::str_get_html($html);
        foreach ($dom->find('x-' . $component->slug) as $tag) {
            $htmlParsed = str_replace($tag->outertext, (new TotsCustomViewComponent($component, $tag->getAllAttributes()))->render(), $htmlParsed);
        }

        return $htmlParsed;
    }

    public function fetchAllIncludes(TotsComponent $component, $slugs)
    {
        return TotsComponent::where('template_id', $component->template_id)->whereIn('slug', $slugs)->get();
    }

    public function fetchAllIncludesBytemplate($templateId)
    {
        return TotsComponent::where('template_id', $templateId)->get();
    }

    public function setGlobalParams($params)
    {
        $this->globalParams = $params;
    }
}