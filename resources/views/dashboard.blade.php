    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="container mt-5">
            <h3>Ejemplo de Bootstrap en Laravel</h3>
            <p>Este es un ejemplo básico de cómo usar Bootstrap en una aplicación Laravel.</p>
            
            <!-- Botón de Bootstrap -->
            <button type="button" class="btn btn-primary">Botón de Bootstrap</button>
        </div>
    </x-app-layout>
