<div class="container d-flex justify-content-between">
    <div class="mt-4">
        <span>Mostrar</span>
        <select wire:model.live='cant' class="ml-2 form-select">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
    <div class="d-flex align-items-center justify-content-between">
        <div wire:loading wire:target='search' class="spinner-border text-primary mr-2" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <input type="text" wire:model.live='search' class="form-control border" placeholder="Buscar...">
    </div>
</div>
<div class="table-responsive">
    <table class="table mt-5">
        <thead class="bg-blue-700">
            <tr>
                {{$thead}}
            </tr>
        </thead>
        <tbody class="bg-success">
            {{$slot}}
        </tbody>
    </table>
</div>
