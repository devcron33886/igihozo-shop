<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TrendingProductComponent extends Component
{
    public $product;

    public $quantity;

    public function mount(Product $product)
    {
        $this->quantity = 1;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.trending-product-component',
            ['added' => Cart::get($this->product->id)]);
    }

    public function addToCart()
    {
        $product = $this->product;
        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'quantity' => $this->quantity,
            'price' => $product->price,
        ]);

        $cartItem->associate($product);
        $this->emit('cart.updated');
        session()->flash('success', $product->name.' Successfully added to cart');
    }

    public function remove()
    {
        Cart::remove($this->product->id);
        $this->emit('productRemoved');

        session()->flash('success', $this->product->name.' Successfully removed to cart');
    }
}
