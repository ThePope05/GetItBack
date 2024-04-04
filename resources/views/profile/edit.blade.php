<x-app-layout>
    <x-slot name="header">
        {{ __('Profile') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="p-4 sm:p-8 bg-slate-800 shadow-xl sm:rounded-lg">
                @include('profile.partials.update-profile-information-form')
                <hr class="my-6 border-gray-700">
                @include('profile.partials.update-password-form')
                <hr class="my-6 border-gray-700">
                @include('profile.partials.danger-zone-form')
            </div>

            <div class="p-4 sm:p-8 bg-slate-800 shadow-xl sm:rounded-lg">
                @include('profile.partials.add-business-data')
            </div>
        </div>
    </div>
</x-app-layout>