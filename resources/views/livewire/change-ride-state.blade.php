<span class="text-gray-600 text-sm mt-4 relative {{ $classes[$ride->status] }} text-center text-white py- px-2 rounded-full inline-block group/state">
    {{ ucfirst($ride->status) }}
    <ul class="hidden group-hover/state:flex text-nowrap text-left absolute top-full left-0 bg-slate-800 text-white text-sm overflow-hidden rounded-full w-max">
        <li class="py- px-2 bg-orange-500 hover:text-white transition-colors"><a wire:click="setState('pending')" class="pointer">Pending</a></li>
        <li class="py- px-2 bg-purple-500 hover:text-white transition-colors"><a wire:click="setState('accepted')" class="pointer">Accepted</a></li>
        <li class="py- px-2 bg-yellow-500 hover:text-white transition-colors"><a wire:click="setState('in_progress')" class="pointer">In Progress</a></li>
        <li class="py- px-2 bg-green-500 hover:text-white transition-colors"><a wire:click="setState('completed')" class="pointer">Completed</a></li>
        <li class="py- px-2 bg-red-500 hover:text-white transition-colors"><a wire:click="setState('canceled')" class="pointer">Canceled</a></li>
    </ul>
</span>