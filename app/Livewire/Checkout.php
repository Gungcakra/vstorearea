<?php

namespace App\Livewire;

use App\Models\Game;
use App\Models\Transaction;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.user')]
class Checkout extends Component
{
    public $gameId, $email, $payment, $totalPrice;
    public function mount($id = null)
    {
        $this->gameId = $id;
    }

    public function setPayment($payment)
    {
        $this->payment = $payment;
    }

    public function buy()
    {
        try {
            $game = Game::findOrFail($this->gameId);
            $this->totalPrice = $game->price;

            // Validate email and payment method
            $this->validate([
            'email' => 'required|email',
            'payment' => 'required|string',
            ]);

            // Create transaction logic here
            Transaction::create([
            'game_id' => $this->gameId,
            'email' => $this->email,
            'price' => $this->totalPrice,
            'payment_method' => $this->payment,
            'payment_status' => 'pending',
            ]);

            $this->dispatch('success', 'Transaction successful!');
            return redirect()->route('home');
        } catch (\Exception $e) {
            $this->dispatch('error', 'Transaction failed: ' . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.pages.user.checkout.index',[
            'game'=> Game::where('id', $this->gameId)->firstOrFail()
        ]);
    }
}
