<x-guest-layout>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>

    <form method="POST" action="{{ route('rides.store') }}">
        @csrf
        @forelse($errors->all() as $whoops)
        {{ $whoops }}
        @empty
        NO ERRORS
        @endforelse


        <!-- Origin Address -->
        <div>
            <x-input-label for="origin_address" :value="__('Origin Address')" />
            <select id="origin_address" name="origin_address" required class="block w-full py-2 px-3 border border-purple-700 text-gray-400 bg-slate-700 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                @if (count($addresses) !== 0)
                @foreach ($addresses as $address)
                <option value="{{ $address->id }}">{{ $address->street . " " . $address->house_number }}</option>
                @endforeach
                @else
                <option value="" disabled>No addresses available</option>
                @endif
            </select>
            @error('origin_address')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Destination Address -->
        <div class="mt-4">
            <x-input-label for="destination_address" :value="__('Destination Address')" />
            <select id="destination_address" name="destination_address" required class="block w-full py-2 px-3 border border-purple-700 text-gray-400 bg-slate-700 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                @if (count($addresses) !== 0)
                @foreach ($addresses as $address)
                <option value="{{ $address->id }}">{{ $address->street . " " . $address->house_number }}</option>
                @endforeach
                @else
                <option value="" disabled>No addresses available</option>
                @endif
            </select>
            @error('destination_address')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Create Ride') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>