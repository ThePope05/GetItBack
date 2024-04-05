<?php

namespace App\Livewire;

use App\Models\Address;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AddAddress extends Component
{
    public $address = [
        'id' => '',
        'street' => '',
        'house_number' => '',
        'postal_code' => '',
        'city' => '',
        'country' => '',
    ];

    public $allAddresses;

    public function mount()
    {
        $this->allAddresses = Auth::user()->addresses;

        if (count($this->allAddresses) === 0) {
            $this->addressForm('new');
        } else {
            $this->addressForm($this->allAddresses[0]->id);
        }
    }

    public function render()
    {
        $this->allAddresses = Auth::user()->addresses;

        return view('livewire.add-address');
    }

    public function save()
    {
        $this->validate([
            'address.street' => 'required',
            'address.house_number' => 'required',
            'address.postal_code' => 'required',
            'address.city' => 'required',
            'address.country' => 'required',
        ]);

        $newAddress = Address::create([
            'user_id' => Auth::id(),
            'street' => $this->address['street'],
            'house_number' => $this->address['house_number'],
            'postal_code' => $this->address['postal_code'],
            'city' => $this->address['city'],
            'country' => $this->address['country'],
        ]);

        $this->addressForm($newAddress->id);

        session()->flash('status', 'address-added');
    }

    public function update()
    {
        $this->validate([
            'address.street' => 'required',
            'address.house_number' => 'required',
            'address.postal_code' => 'required',
            'address.city' => 'required',
            'address.country' => 'required',
        ]);

        Address::find($this->address['id'])->update([
            'street' => $this->address['street'],
            'house_number' => $this->address['house_number'],
            'postal_code' => $this->address['postal_code'],
            'city' => $this->address['city'],
            'country' => $this->address['country'],
        ]);

        session()->flash('status', 'address-updated');
    }

    public function doAction()
    {
        if ($this->address['id'] === 'new' || $this->address['id'] === null || $this->address['id'] === '') {
            $this->save();
        } else {
            $this->update();
        }
    }

    public function addressForm($id)
    {
        if ($id === 'new') {
            $this->address = [
                'id' => 'new',
                'street' => '',
                'house_number' => '',
                'postal_code' => '',
                'city' => '',
                'country' => '',
            ];
        } else {
            $address = Address::find($id);
            $this->address = [
                'id' => $address->id,
                'street' => $address->street,
                'house_number' => $address->house_number,
                'postal_code' => $address->postal_code,
                'city' => $address->city,
                'country' => $address->country,
            ];
        }
    }
}
