<?php

namespace App\View\Components\Petugas;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
        $this;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.petugas.header');
    }
}
