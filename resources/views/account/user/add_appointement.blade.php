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

                    <form method="POST" action="{{ route('user.store_appointement') }}">
                        @csrf
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-1">
                        Appointement for {{$opens->workshop->names}} Workshop
            </h2><br/>
                        <!-- Email Address -->
                        <div>
                            <label for="name"> Workshop Name : {{$opens->workshop->names}} </label><br/>

                            <label for="name"> Open Day : {{$opens->day}} </label><br/>

                            <label for="name"> Open Time : {{$opens->time_from}} - {{$opens->time_to}} </label><br/><br/>
                            <small class="text-green-600">Note : 1,000 NGN per Hour</small><br/><br/>
                            <x-label for="name" :value="__('How many hours ? ')" />
                            
                            <x-input id="from" class="block mt-1 w-full" type="number" name="from" :value="old('from')" required autofocus />
                            <br/><x-label for="amount" :value="__('Amount To Pay')" />
                            <x-input id="amount_to_pay" class="block mt-1 w-full" type="number" readonly />
                            
                            <x-input id="openday_id" class="block mt-1 w-full" type="hidden" value="{{$opens->id}}" name="openday_id" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                           
                        @if(session()->has('success'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('user.list_appointement') }}">
                                {{ __('Appointed Workshop') }}
                            </a>
                        @else
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('user.dashboard') }}">
                                {{ __('List Workshop') }}
                            </a>
                        @endif
                            <x-button class="ml-3" id="save">
                                {{ __('Save') }}
                            </x-button>
                            
                        </div>
                    </form>
                    </x-auth-card>
</x-app-layout>
