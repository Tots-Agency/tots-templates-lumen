<?php

namespace Tots\Templates\Services;

use Tots\Templates\Models\TotsComponent;
use Tots\Templates\Views\TotsCustomViewComponent;
use voku\helper\HtmlDomParser;

class TotsComponentService
{
    public function renderHtml(TotsComponent $component)
    {
        // Get all include components
        $components = $this->fetchAllIncludesBytemplate($component->template_id);
        // Process all components includes
        return $this->processComponents($component, $components);
    }

    public function processComponents(TotsComponent $component, $components)
    {
        $html = $component->html;
        foreach ($components as $comp) {
            $html = $this->processComponent($html, $comp);
        }
        return $html;
    }

    public function processComponent($html, TotsComponent $component)
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

}