<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\View\Component;

class dataTable extends Component
{
    /**
     * Create a new component instance.
     */
    public  $columns;
    public  $dataValue;
    public function __construct($columns,$dataValue)
    {
        $this->columns = $columns;
        $this->dataValue =$dataValue;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data-table');
    }
}
