<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class uploaderVertical extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $maxSize;
    public $imageSize;
    public $typeFile;
    public $buttonColor;
    public $buttonHeight;
    public $previewColor;
    public $previewHeight;
    public $cardWidth;
    // public $card_direction;
    public $elementCount;
    public function __construct($name, $typeFile, $maxSize, $imageSize, $buttonColor, $previewColor, $previewHeight, $cardWidth, $buttonHeight, $elementCount)
    {
        $this->maxSize = $maxSize;
        $this->imageSize = $imageSize;
        $this->typeFile = $typeFile;
        $this->name = $name;
        $this->buttonColor = $buttonColor;
        $this->previewColor = $previewColor;
        $this->previewHeight = $previewHeight;
        $this->cardWidth = $cardWidth;
        $this->buttonHeight = $buttonHeight;
        // $this->card_direction = $card_direction;
        $this->elementCount = $elementCount;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.uploaderVertical');
    }
}
