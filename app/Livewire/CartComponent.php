<?php

namespace App\Livewire;

use Livewire\Component;
// use Livewire\Attributes\Session;
use Illuminate\Support\Facades\Session;


class CartComponent extends Component
{
    // #[Session(key: 'cart')]
    public $cart = [];
    public $quantities = [];

    public function mount()
    {
        $this->cart = Session::get('cart', []);
        foreach ($this->cart as $id => $details) {
            $this->quantities[$id] = $details['quantity'];
        }
    }

    public function increment($id)
    {
        $this->quantities[$id]++;
        $this->updateCartSession($id);
    }

    public function decrement($id)
    {
        if ($this->quantities[$id] > 1) {
            $this->quantities[$id]--;
        } else {
            unset($this->cart[$id]);
            Session::put('cart', $this->cart);  // Remove product from session if quantity reaches 0
        }
        $this->updateCartSession($id);
    }

    public function updateCartSession($id)
    {
        if (isset($this->cart[$id])) {
            $this->cart[$id]['quantity'] = $this->quantities[$id];
            Session::put('cart', $this->cart);
        }
    }

    public function render()
    {
        return view('livewire.cart-component', ['cart' => $this->cart]);
    }
}
