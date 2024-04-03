@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-600 bg-slate-700 focus:border-purple-600 focus:ring-purple-600 text-gray-400 rounded-md shadow-sm']) !!}>