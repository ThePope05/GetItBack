<div class="mt-6 space-y-6">
    <header>
        <h2 class="text-lg font-black text-purple-600 text-center">
            {{ ($address['id'] == 'new') ? 'Add address information' : 'Update address information' }}
        </h2>
        <p class="text-sm text-green-600 text-center">
            @if (session('status'))
            {{ session('status') }}
            @endif
        </p>
    </header>

    <select name="address_id" id="address_id" wire:model="address.id" wire:change="addressForm($event.target.value)" class="block w-full py-2 px-3 border border-purple-700 text-gray-400 bg-slate-700 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
        @foreach ($allAddresses as $loopAddress)
        <option value="{{ $loopAddress->id }}" {{ ($loopAddress->id == $address['id']) ? 'selected' : '' }}>{{ $loopAddress->street . " " . $loopAddress->house_number }}</option>
        @endforeach
        <option value="new" {{ ('new' == $address['id']) ? 'selected' : '' }}>{{ __('New Address') }}</option>
    </select>

    <div>
        <x-input-label for="street" :value="__('Street')" />
        <x-text-input id="street" name="street" type="text" class="mt-1 block w-full" wire:model="address.street" required autofocus autocomplete="street" />
        <x-input-error class="mt-2" :messages="$errors->get('street')" />
    </div>

    <div>
        <x-input-label for="house_number" :value="__('House Number')" />
        <x-text-input id="house_number" name="house_number" type="text" class="mt-1 block w-full" wire:model="address.house_number" required autofocus autocomplete="house_number" />
        <x-input-error class="mt-2" :messages="$errors->get('house_number')" />

    </div>

    <div>
        <x-input-label for="postal_code" :value="__('Postal Code')" />
        <x-text-input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full" wire:model="address.postal_code" required autofocus autocomplete="postal_code" />
        <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
    </div>

    <div>
        <x-input-label for="city" :value="__('City')" />
        <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" wire:model="address.city" required autofocus autocomplete="city" />
        <x-input-error class="mt-2" :messages="$errors->get('city')" />
    </div>

    <div>
        <x-input-label for="country" :value="__('Country')" />
        <x-text-input id="country" name="country" type="text" class="mt-1 block w-full" wire:model="address.country" required autofocus autocomplete="country" />
        <x-input-error class="mt-2" :messages="$errors->get('country')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button wire:click="doAction">{{ __('Save') }}</x-primary-button>

        @if (session('status') === 'password-updated')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
        @endif
    </div>
</div>