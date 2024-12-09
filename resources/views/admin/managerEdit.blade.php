<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update') }}
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

                    <form method="POST" action="{{ route('manager.update',$user->id) }}">
                        @csrf
                        @method('PUT')

                        <x-input-label for="" :value="__('ism familiya')"/>
                        <x-text-input id="" name="name" type="text" value="{{$user->name}}" class="mt-1 block w-full" autocomplete=""/>


                        <x-input-label for="" :value="__('email')"/>
                        <x-text-input id="" name="email" type="email"  value="{{$user->email}}"  class="mt-1 block w-full" autocomplete=""/>

                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>

                        <x-input-label for="" :value="__('parol')"/>
                        <x-text-input id="" name="password" type="password" value="{{$user->password}}" class="mt-1 block w-full" autocomplete=""/>

                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
