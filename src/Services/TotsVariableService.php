<?php

namespace Tots\Templates\Services;

use Tots\Templates\Models\TotsComponent;
use Tots\Templates\Views\TotsCustomViewComponent;
use voku\helper\HtmlDomParser;

class TotsVariableService
{
    protected $params;
    protected $parentParams;

    public function __construct($params, $parentParams)
    {
        $this->params = $params;
        $this->parentParams = $parentParams;
    }

    protected function processVariable($key, $value, $var)
    {
        $variableName = str_replace('$', '', $var);
        // Verify if array variable or object attribute
        if(strpos($variableName, '[') !== false){
            
        }
    }

    protected function eachAllVariables($key, $value, $variables)
    {
        foreach($variables as $variable){
            $this->processVariable($key, $value, $variable);
        }
    }

    protected function processParam($key, $value)
    {
        $variables = $this->findAllVariables($value);
        $this->eachAllVariables($key, $value, $variables);
    }

    protected function eachAllParams()
    {
        foreach($this->params as $key => $value){
            $this->processParam($key, $value);
        }
    }

    public function process()
    {
       $this->eachAllParams();
    }

    public function findAllVariables($text)
    {
        $pattern = '/\$[a-zA-Z_][a-zA-Z0-9_]*/';
        preg_match_all($pattern, $text, $matches);
        return $matches[0];
    }

    public function findAllArrayVariables($text)
    {
        preg_match_all("/\[(.*?)\]/", $text, $matches);
        return $matches[1];
    }
}