<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'San Matias') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <!-- Agrega esto en el head de tu HTML -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">



</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-200">
        @include('sweetalert::alert')

        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            <!-- mensajes para el guardado -->
            @livewire('messages')
            {{ $slot }}
        </main>
    </div>
    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    {{-- SIRVE PARA OCULTAR EL MODAL DESPUES DE ACEPTAR --}}
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('close-modal', (idModal) => {
                $('#' + idModal).modal('hide');
            })
        })
    </script>
    {{-- para abrir el modal --}}
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('open-modal', (idModal) => {
                $('#' + idModal).modal('show');
            })
        })
    </script>
    {{-- sweet alert para eliminar --}}
    <script>
     document.addEventListener('livewire:init', () => {
            Livewire.on('delete', (e) => {

              // alert(e.id+'-'+e.eventName)

                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "Esta accion no se pude revertir!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar esto!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {

                      Livewire.dispatch(e.eventName,{id: e.id})

                    }
                })
            })
        })
    </script>
</body>

</html>
