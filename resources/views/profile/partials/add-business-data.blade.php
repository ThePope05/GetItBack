<section>
    <header>
        <h2 class="text-lg font-black text-purple-600 text-center">
            {{ (Auth::user()->business()->first() !== null) ? 'Update business information' : 'Add business information' }}
        </h2>
    </header>

    <form method="post" action="{{ route((Auth::user()->business()->first() !== null) ? 'updateBusiness' : 'addBusiness') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="business_name" :value="__('Business Name')" />
            <x-text-input id="business_name" name="business_name" type="text" class="mt-1 block w-full" :value="old('business_name')" required autofocus autocomplete="business_name" value="{{ (Auth::user()->business()->first() !== null) ? Auth::user()->business()->first()->business_name : '' }}" />
            <x-input-error class="mt-2" :messages="$errors->get('business_name')" />
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
    <hr class="my-6 border-gray-700">

    <livewire:add-address />
</section>