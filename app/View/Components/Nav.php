<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Melbedran\RolePermession\Support\AbilityManager;


class Nav extends Component
{
    public $items;
    /**
     * Create a new component instance.
     */
    public function __construct(AbilityManager $abilities)
    {
        $user = Auth::guard('admin')->user();
        //
        $this->items = $abilities->filterNav(
            config('nav',[]),
            $user
        );
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav',[
            'items' => $this->items
        ]);
    }
}
