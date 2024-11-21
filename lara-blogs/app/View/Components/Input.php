<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public string $name;
    public bool $show;
    public $default;
    public string $type;
    public string $label;
    /**
     * Create a new component instance.
     */
    public function __construct($name,$default=null,$show=true,$type="text",$label="")
    {
        $this->name=$name;
        $this->default=$default;
        $this->show=$show;
        $this->type=$type;
        $this->label=$label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
