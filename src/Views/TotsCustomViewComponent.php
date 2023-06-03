<?php

namespace Tots\Templates\Views;

use Illuminate\Support\Facades\Blade;
use Illuminate\View\Component;
use Tots\Templates\Models\TotsComponent;

class TotsCustomViewComponent extends Component
{
    protected TotsComponent $component;
    protected $params = [];

    /**
     * Create the component instance.
     */
    public function __construct(TotsComponent $comp, $params)
    {
        $this->component = $comp;
        $this->params = $params;
    }

    public function render()
    {
        // Return only HTML process blade in service.
        return $this->component->html;
        //$html = '<h1>Prueba de primera vista</h1><p>Resultado: {{ customFunction(5, 10) }}</p>';
        //return Blade::render($this->component->html, ['name' => 'Julian Bashir', 'customFunction' => 'myCustomFunction']);
    }

    public function myCustomFunction($param1, $param2)
    {
        // Lógica de la función
        // Puedes realizar cualquier procesamiento necesario
        return $param1 + $param2;
    }
}