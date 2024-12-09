<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    @if(session('success'))
        <div class="alert alert-success alert-dismissible text-center text-green-200" role="alert">

           {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <strong></strong> {{ session('error') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
                        @csrf

                        <x-input-label for="" :value="__('ism familiya')" />
                        <x-text-input id="" name="user" type="text" class="mt-1 block w-full" autocomplete="" />

                        <x-input-label for="" :value="__('NOMI')" />
                        <x-text-input id="" name="name" type="text" class="mt-1 block w-full" autocomplete="" />

                        <x-input-label for="" :value="__('Masalliqlar')" />
                        <x-text-input id="" name="ingredients" type="text" class="mt-1 block w-full" autocomplete="" />

                        <x-input-label for="" :value="__('Tayyorlanish yo`riqnomasi')" />
                        <x-text-input id="" name="instructions" type="text" class="mt-1 block w-full" autocomplete="" />

                        <x-input-label for="" :value="__('Rasm')" />
                        <x-text-input id="" name="image" type="file" class="mt-1 block w-full" autocomplete="" />

                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
