<section>
    <header>
        <h2 class="text-lg font-black text-purple-600 text-center">
            {{ (Auth::user()->business()->first() !== null) ? 'Update business information' : 'Add business information' }}
        </h2>

        <p class="mt-2 text-sm text-gray-600 text-center">
            {{ (isset($status) ? $status : '') }}
        </p>
    </header>

    <form method="post" action="{{ route((Auth::user()->business()->first() !== null) ? 'updateBusinessData' : 'addBusinessData') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="business_name" :value="__('Business Name')" />
            <x-text-input id="business_name" name="business_name" type="text" class="mt-1 block w-full" :value="old('business_name')" required autofocus autocomplete="business_name" value="{{ (Auth::user()->business()->first() !== null) ? Auth::user()->business()->first()->business_name : '' }}" />
            <x-input-error class="mt-2" :messages="$errors->get('business_name')" />
        </div>

        <div>
            <x-input-label for="street" :value="__('Street')" />
            <x-text-input id="street" name="street" type="text" class="mt-1 block w-full" :value="old('street')" required autofocus autocomplete="street" value="{{ (Auth::user()->business()->first() !== null) ? Auth::user()->business()->first()->street : '' }}" />
            <x-input-error class="mt-2" :messages="$errors->get('street')" />
        </div>

        <div>
            <x-input-label for="house_number" :value="__('House Number')" />
            <x-text-input id="house_number" name="house_number" type="text" class="mt-1 block w-full" :value="old('house_number')" required autofocus autocomplete="house_number" value="{{ (Auth::user()->business()->first() !== null) ? Auth::user()->business()->first()->house_number : '' }}" />
            <x-input-error class="mt-2" :messages="$errors->get('house_number')" />

        </div>

        <div>
            <x-input-label for="postal_code" :value="__('Postal Code')" />
            <x-text-input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full" :value="old('postal_code')" required autofocus autocomplete="postal_code" value="{{ (Auth::user()->business()->first() !== null) ? Auth::user()->business()->first()->postal_code : '' }}" />
            <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
        </div>

        <div>
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city')" required autofocus autocomplete="city" value="{{ (Auth::user()->business()->first() !== null) ? Auth::user()->business()->first()->city : '' }}" />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>

        <div>
            <x-input-label for="country" :value="__('Country')" />
            <x-text-input id="country" name="country" type="text" class="mt-1 block w-full" :value="old('country')" required autofocus autocomplete="country" value="{{ (Auth::user()->business()->first() !== null) ? Auth::user()->business()->first()->country : '' }}" />
            <x-input-error class="mt-2" :messages="$errors->get('country')" />
        </div>

        <div>
            <x-input-label for="phone_number" :value="__('Phone Number')" />
            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old('phone_number')" required autofocus autocomplete="phone_number" value="{{ (Auth::user()->business()->first() !== null) ? Auth::user()->business()->first()->phone_number : '' }}" />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
        </div>

        <div>
            <x-input-label for="kvk_number" :value="__('KVK Number')" />
            <x-text-input id="kvk_number" name="kvk_number" type="text" class="mt-1 block w-full" :value="old('kvk_number')" required autofocus autocomplete="kvk_number" value="{{ (Auth::user()->business()->first() !== null) ? Auth::user()->business()->first()->kvk_number : '' }}" />
            <x-input-error class="mt-2" :messages="$errors->get('kvk_number')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>