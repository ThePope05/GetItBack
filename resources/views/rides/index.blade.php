<x-app-layout>
    <x-slot name="header">
        {{ __('Your Rides') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            @php
            $classes = [
            'completed' => 'bg-green-500',
            'in_progress' => 'bg-yellow-500',
            'canceled' => 'bg-red-500',
            'pending' => 'bg-orange-500',
            'accepted' => 'bg-purple-500',
            ];
            @endphp

            @foreach ($rides as $ride)
            <div class="bg-slate-800 overflow-hidden shadow-xl sm:rounded-lg my-4 py-6 px-12">
                <h3 class="font-semibold text-lg text-purple-600 leading-tight">
                    {{ $ride->origin_address->street . " " . $ride->origin_address->house_number }} to {{ $ride->destination_address->street . " " . $ride->destination_address->house_number }}
                </h3>
                <div class="flex flex-row items-center space-x-4">
                    @if (auth()->user()->role->name === 'admin')
                    <livewire:change-ride-state :ride="$ride" :classes="$classes" />
                    @else
                    <span class="text-gray-600 text-sm mt-4 relative {{ $classes[$ride->status] }} text-center text-white py- px-2 rounded-full inline-block group/state">
                        {{ ucfirst($ride->status) }}
                    </span>
                    @endif
                    <p class="text-gray-400 text-sm mt-4">
                        Distance: {{ $ride->distance }} km
                    </p>
                    <p class="text-gray-400 text-sm mt-4">
                        @if ($ride->status === 'completed')
                        Completed at: {{ $ride->completed_time }}
                        @else
                        Requested at: {{ $ride->created_at }}
                        @endif
                    </p>
                    @if (auth()->user()->role->name === 'admin')
                    <p class="text-gray-400 text-sm mt-4">
                        Requested by: {{ $ride->user->name }}
                    </p>
                    @endif
                    @if ($ride->user == auth()->user() || auth()->user()->role->name === 'admin')
                    <form action="{{ route('rides.destroy', $ride) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-400 transition-colors mt-4">
                            Delete
                        </button>
                    </form>
                    @endif
                </div>
            </div>
            @endforeach
            <div class="bg-slate-800 overflow-hidden shadow-xl sm:rounded-lg my-4 py-6 px-12">
                <a href="{{ route('rides.create') }}" class="font-semibold text-center w-full text-xl text-purple-600 hover:text-purple-500 transition-colors block">
                    Create a new ride
                </a>
            </div>
        </div>
    </div>
</x-app-layout>