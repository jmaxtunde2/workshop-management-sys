<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{$data['title']}}
        </h2>
    </x-slot>

    <x-auth-card>
                            <x-slot name="logo">
                                <a href="/">
                                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                                </a>
                            </x-slot>

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            @if(session()->has('success'))
                                <div class="text-green-600">
                                    {{ session()->get('success') }}
                                </div>
                            @endif

                            <br/>

                    <form method="POST" action="{{ route('admin.store_workshop') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-label for="name" :value="__('Names')" />

                            <x-input id="names" class="block mt-1 w-full" type="text" name="names" :value="old('names')" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                           
                        @if(session()->has('success'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('admin.create_openday') }}">
                                {{ __('Add Open Days') }}
                            </a>
                        @else
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('admin.list_openday') }}">
                                {{ __('List Workshop Open Days') }}
                            </a>
                        @endif
                            <x-button class="ml-3">
                                {{ __('Save') }}
                            </x-button>
                            
                        </div>
                    </form>
                    </x-auth-card>
</x-app-layout>
