<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <ul class="list-disc">
               <li><a href="{{route('client.index')}}">Clients</a></li>
               <li><a href="">Declarations</a></li>
               <li><a href="">Employers</a></li>
               <li><a href="">Secteurs</a></li>
               <li><a href="">Caisses</a></li>
               <li><a href="{{route('destination.index')}}">Provenance</a></li>
                <!-- ... -->
            </ul>

            </div>
        </div>
    </div>
</x-app-layout>
