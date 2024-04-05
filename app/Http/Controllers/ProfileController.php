<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Address;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

use App\Models\Business;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // $user = $request->user();

        // $origin = urlencode($user->addresses()->first()->street . ' ' . $user->addresses()->first()->house_number . ' ' . $user->addresses()->first()->postal_code . ' ' . $user->addresses()->first()->city . ' ' . $user->addresses()->first()->country);

        // $response = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json?origin=' . $origin . '&destinations=Amsterdam&key=' . env('GOOGLE_MAPS_API_KEY') . '&units=metric');

        // $data = $response->json();

        return view('profile.edit', [
            'user' => $request->user(),
            // 'data' => $data,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Add business data to the user's profile.
     */
    public function addBusiness(Request $request): RedirectResponse
    {
        $request->validate([
            'business_name' => ['required', 'string', 'max:255'],
            'kvk_number' => ['required', 'string', 'max:255'],
        ]);

        $business = new Business($request->all());
        $business->user()->associate($request->user());
        $business->save();

        return Redirect::route('profile.edit')->with('status', 'business-data-added');
    }

    public function destroyBusiness(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        $user->business()->delete();

        return Redirect::route('profile.edit')->with('status', 'business-data-deleted');
    }

    public function updateBusiness(Request $request): RedirectResponse
    {
        $request->validate([
            'business_name' => ['required', 'string', 'max:255'],
            'kvk_number' => ['required', 'string', 'max:255'],
        ]);

        $business = $request->user()->business()->first();
        $business->fill($request->all());
        $business->save();

        return Redirect::route('profile.edit')->with('status', 'business-data-updated');
    }

    public function addAddress(Request $request): RedirectResponse
    {
        $request->validate([
            'street' => ['required', 'string', 'max:255'],
            'house_number' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
        ]);

        $address = new Address($request->all());
        $address->user()->associate($request->user());
        $address->save();

        return Redirect::route('profile.edit')->with('status', 'address-added');
    }

    public function destroyAddress(Address $address): RedirectResponse
    {
        $address->delete();

        return Redirect::route('profile.edit')->with('status', 'address-deleted');
    }

    public function updateAddress(Request $request, Address $address): RedirectResponse
    {
        $request->validate([
            'street' => ['required', 'string', 'max:255'],
            'house_number' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
        ]);

        $address->fill($request->all());
        $address->save();

        return Redirect::route('profile.edit')->with('status', 'address-updated');
    }
}
