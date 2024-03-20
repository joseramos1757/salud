<div class=" container flex justify-between">
    <div class="mt-4">
        <span>Mostrar</span>
        <select wire:model.live='cant' class="ml-2 border border-gray-300 rounded px-2 py-1 w-32">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
    <div class="flex items-center justify-between">
        <div wire:loading wire:target='search' class="animate-spin text-blue-500 mr-2">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
        </div>
        <input type="text" wire:model.live='search' class="border border-gray-300 rounded px-2 py-1" placeholder="Buscar...">
    </div>
</div>
<div class="overflow-x-auto">
    <table class="table-auto mt-5 min-w-full divide-y divide-gray-200 ">
        <thead class="bg-blue-700 text-gray-50">
            <tr>
                {{$thead}}
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
                {{$slot}}
        </tbody>
    </table>
</div>