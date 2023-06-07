<?php

namespace Tots\Templates\Services;

use Illuminate\Http\Request;
use Tots\Templates\Models\TotsComponent;
use Tots\Templates\Models\TotsFunction;
use Tots\Templates\Views\TotsCustomViewComponent;
use voku\helper\HtmlDomParser;

class TotsFunctionService
{
    protected TotsFunction $function;
    protected $parentParams;

    public function __construct($function, $parentParams)
    {
        $this->function = $function;
        $this->parentParams = $parentParams;
    }

    public function createElofilter($table, $joins = [], $wheres = [])
    {
        // Create query
        $elofilter = \Tots\EloFilter\Query::run($table, new Request());
        // Add Joins
        $elofilter->getQueryRequest()->setJoins($joins);
        // Process Wheres
        $elofilter->getQueryRequest()->setWheresByFactory($wheres);
        // Execute query
        return $elofilter->execute();
    }

    public function execute() 
    {
        if($this->function->type == TotsFunction::TYPE_LAST_ROWS_IN_DATABASE){
            // Create filter
            $filter = $this->createElofilter($this->function->data['table'], $this->function->data['joins'], $this->function->data['wheres']);
            return [$this->function->slug => $filter->toArray()['data']];
        }

        return [];
    }
}