<nav x-data="{ open: false }" class="bg-blue-700 border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <a href="{{route('dashboard')}}" class="flex flex-shrink-0 items-center">
                          <img class="block h-14 w-auto lg:hidden" src="https://imagizer.imageshack.com/v2/821x411q70/924/uqoivC.png" alt="Your Company">
                          <img class="hidden h-14 w-auto lg:block" src="https://imagizer.imageshack.com/v2/821x411q70/924/uqoivC.png" alt="Your Company">
                        </a>
            
                        <div class="hidden sm:ml-6 sm:block mt-2">
                          <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            @can('ACCESO A PACIENTES')
                            <a href="{{route('paciente.pacients.index')}}" class="text-white hover:bg-blue-950 hover:text-white block rounded-md px-3 py-2 text-base font-sans font-bold ">PACIENTES</a>
                            @endcan
                            <a href="#" class="text-white hover:bg-blue-950 hover:text-white block rounded-md px-3 py-2 text-base font-sans font-bold">ANAMNESIS</a>
                            <a href="#" class="text-white hover:bg-blue-950 hover:text-white block rounded-md px-3 py-2 text-base font-sans font-bold">HISTORIAL CLÍNICO</a>
                            <a href="#" class="text-white hover:bg-blue-950 hover:text-white block rounded-md px-3 py-2 text-base font-sans font-bold">REPORTES EPIDEMIOLÓGICOS</a>
                          </div>
                        </div>
            
                      </div>    
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>

                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('PERFIL') }}
                        </x-dropdown-link>
                        @can('ACCESO A PACIENTES')
                        <x-dropdown-link :href="route('admin.home')">
                            {{ __('ADMINISTRACIÓN') }}
                        </x-dropdown-link>
                        @endcan
                        <x-dropdown-link :href="route('register')">
                            {{ __('REGISTRAR') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('CERRAR SESION') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
   
                      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                      <a href="#" class="text-white hover:bg-blue-950 hover:text-white block rounded-md px-3 py-2 text-base font-sans font-bold ">PACIENTES</a>
                      <a href="#" class="text-white hover:bg-blue-950 hover:text-white block rounded-md px-3 py-2 text-base font-sans font-bold">ANAMNESIS</a>
                      <a href="#" class="text-white hover:bg-blue-950 hover:text-white block rounded-md px-3 py-2 text-base font-sans font-bold">HISTORIAL CLÍNICO</a>
                      <a href="#" class="text-white hover:bg-blue-950 hover:text-white block rounded-md px-3 py-2 text-base font-sans font-bold">REPORTES EPIDEMIOLÓGICOS</a>
               
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('PERFIL') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.home')">
                    {{ __('ADMINISTRACIÓN') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('CERRAR SESIÓN') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
