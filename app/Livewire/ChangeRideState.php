<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ride;

class ChangeRideState extends Component
{
    public Ride $ride;
    public array $classes;

    public function render()
    {
        return view('livewire.change-ride-state');
    }

    public function setState(string $state)
    {
        $this->ride->update(['status' => $state]);
    }
}
