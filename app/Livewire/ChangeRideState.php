<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ride;
use App\Mail\RideStateUpdate;
use Illuminate\Support\Facades\Mail;

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

        Mail::to($this->ride->user)->send(new RideStateUpdate($this->ride));
    }
}
