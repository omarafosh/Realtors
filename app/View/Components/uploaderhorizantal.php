<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class uploaderhorizantal extends Component
{
    /**
     * Create a new component instance.
     */
    public $names;
    public $name;
    public $maxSize;
    public $imageSize;
    public $typeFile;
    public $buttonColor;
    public $buttonHeight;
    public $previewColor;
    public $previewHeight;
    public $cardGap;
    public $elementCount;


    public function __construct($name, $typeFile, $maxSize, $imageSize, $buttonColor, $previewColor, $previewHeight, $buttonHeight, $elementCount, $cardGap, $names)
    {
        $this->$names = $names;
        $this->maxSize = $maxSize;
        $this->imageSize = $imageSize;
        $this->typeFile = $typeFile;
        $this->name = $name;
        $this->buttonColor = $buttonColor;
        $this->previewColor = $previewColor;
        $this->previewHeight = $previewHeight;
        $this->buttonHeight = $buttonHeight;
        $this->cardGap = $cardGap;
        $this->elementCount = $elementCount;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.uploaderhorizantal');
    }
}
