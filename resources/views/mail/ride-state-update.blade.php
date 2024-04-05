<x-mail-layout>
    <x-slot name="header">
        Hey {{ $ride->user()->name }}! an update on your ride!
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <div class="bg-slate-800 overflow-hidden shadow-xl sm:rounded-lg my-4 py-6 px-12">
                <h3 class="font-semibold text-lg text-purple-600 leading-tight flex w-full text-center">
                    The ride {{ $ride->origin_address->street . " " . $ride->origin_address->house_number }} to {{ $ride->destination_address->street . " " . $ride->destination_address->house_number }}
                </h3>
                <div class=" text-gray-200 py-8">
                    Is now: {{ ucfirst($ride->status) }}.
                </div>
                <div class="text-gray-500 text-sm mt-4">
                    For more details, <a href="{{ route('rides.index') }}" class="text-purple-600">click here</a>.
                </div>
            </div>
        </div>
    </div>
</x-mail-layout>