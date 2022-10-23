<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Setting;
use Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class NavigationComponent extends Component
{
    protected $listeners = [
        'cart.updated' => '$refresh',
        'productRemoved' => '$refresh',
        'productAdded' => '$refresh',
    ];

    public function render(): Factory|View|Application
    {
        $totalItems = Cart::getTotalQuantity();
        $categories = Category::all();
        $settings = Setting::first()->get();

        return view('livewire.navigation-component', compact('categories', 'totalItems', 'settings'));
    }
}
