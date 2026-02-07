<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InfoBox extends Component
{
    public $title;
    public $number;
    public $color;

    /**
     * Create a new component instance.
     *
     * @param string $title
     * @param mixed $number
     * @param string $color
     */
    public function __construct($title, $number, $color = 'info')
    {
        $this->title = $title;
        $this->number = $number;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.info-box');
    }
}
