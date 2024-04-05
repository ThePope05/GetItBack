<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ride;

class RideController extends Controller
{
    public function index()
    {
        if (auth()->user()->role->name === 'admin') {
            $rides = Ride::all();
        } else {
            $rides = auth()->user()->rides;
        }
        return view('rides.index', compact('rides'));
    }

    public function create()
    {
        $addresses = auth()->user()->addresses;
        return view('rides.create', compact('addresses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'origin_address' => 'required|exists:addresses,id',
            'destination_address' => 'required|exists:addresses,id',
        ]);

        auth()->user()->rides()->create([
            'origin_id' => $request->origin_address,
            'destination_id' => $request->destination_address,
            'distance' => mt_rand(1, 100),
        ]);

        return redirect()->route('rides.index')->with('status', 'Ride created successfully');
    }

    public function destroy(Ride $ride)
    {
        $ride->delete();
        return redirect()->route('rides.index')->with('status', 'Ride deleted successfully');
    }
}
