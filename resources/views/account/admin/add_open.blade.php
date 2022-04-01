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
                    <form method="POST" action="{{ route('admin.store_openday') }}">
                        @csrf

                        <!-- Workshop -->
                        <div>
                            <x-label for="name" :value="__('Select Workshop')" />

                            <select class="w-full border bg-white rounded px-3 py-2 outline-none" name="workshop_id">
                                @foreach($workshops as $w)
                                <option class="py-1" value="{{$w->id}}">{{$w->names}}</option>
                                @endforeach
                            </select>          
                        </div><br/>

                        <!-- day -->
                        <div>
                            <x-label for="name" :value="__('Select Open Day')" />

                            <select class="w-full border bg-white rounded px-3 py-2 outline-none" name="day">
                                <option class="py-1" value="Monday">Monday</option>
                                <option class="py-1" value="Tuesday">Tuesday</option>
                                <option class="py-1" value="Wednesday">Wednesday</option>
                                <option class="py-1" value="Thursday">Thursday</option>
                                <option class="py-1" value="Friday">Friday</option>
                                <option class="py-1" value="Saturday">Saturday</option>
                                <option class="py-1" value="Sunday">Sunday</option>
                            </select>          
                        </div><br/>

                        <!-- Open Time -->
                        <div>
                            <x-label for="name" :value="__('Select Open Time')" />
                            <select class="w-full border bg-white rounded px-3 py-2 outline-none" name="time_from">
                                <option class="py-1" value="12am">12am</option>
                                <option class="py-1" value="1am">1am</option>
                                <option class="py-1" value="2am">2am</option>
                                <option class="py-1" value="3am">3am</option>
                                <option class="py-1" value="4am">4am</option>
                                <option class="py-1" value="5am">5am</option>
                                <option class="py-1" value="6am">6am</option>
                                <option class="py-1" value="7am">7am</option>
                                <option class="py-1" value="8am">8am</option>
                                <option class="py-1" value="9am">9am</option>
                                <option class="py-1" value="10am">10am</option>
                                <option class="py-1" value="11am">11am</option>
                                <option class="py-1" value="12am">12pm</option>
                                <option class="py-1" value="1pm">1pm</option>
                                <option class="py-1" value="2pm">2pm</option>
                                <option class="py-1" value="3pm">3pm</option>
                                <option class="py-1" value="4pm">4pm</option>
                                <option class="py-1" value="5pm">5pm</option>
                                <option class="py-1" value="6pm">6pm</option>
                                <option class="py-1" value="7pm">7pm</option>
                                <option class="py-1" value="8pm">8pm</option>
                                <option class="py-1" value="9pm">9pm</option>
                                <option class="py-1" value="10pm">10pm</option>
                                <option class="py-1" value="11pm">11pm</option>
                            </select>          
                        </div><br/>

                         <!-- Open Time -->
                         <div>
                            <x-label for="name" :value="__('Select Closing Time')" />
                            <select class="w-full border bg-white rounded px-3 py-2 outline-none" name="time_to">
                            <option class="py-1" value="12am">12pm</option>
                                <option class="py-1" value="1pm">1pm</option>
                                <option class="py-1" value="2pm">2pm</option>
                                <option class="py-1" value="3pm">3pm</option>
                                <option class="py-1" value="4pm">4pm</option>
                                <option class="py-1" value="5pm">5pm</option>
                                <option class="py-1" value="6pm">6pm</option>
                                <option class="py-1" value="7pm">7pm</option>
                                <option class="py-1" value="8pm">8pm</option>
                                <option class="py-1" value="9pm">9pm</option>
                                <option class="py-1" value="10pm">10pm</option>
                                <option class="py-1" value="11pm">11pm</option>    
                            <option class="py-1" value="12am">12am</option>
                                <option class="py-1" value="1am">1am</option>
                                <option class="py-1" value="2am">2am</option>
                                <option class="py-1" value="3am">3am</option>
                                <option class="py-1" value="4am">4am</option>
                                <option class="py-1" value="5am">5am</option>
                                <option class="py-1" value="6am">6am</option>
                                <option class="py-1" value="7am">7am</option>
                                <option class="py-1" value="8am">8am</option>
                                <option class="py-1" value="9am">9am</option>
                                <option class="py-1" value="10am">10am</option>
                                <option class="py-1" value="11am">11am</option>
                               
                            </select>          
                        </div>


                        <div class="flex items-center justify-end mt-4">
                           
                        @if(session()->has('success'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('admin.list_openday') }}">
                                {{ __('List Workshop Open Days') }}
                            </a>
                        @else
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('admin.create_workshop') }}">
                                {{ __('Add New Workshop') }}
                            </a>
                        @endif

                            <x-button class="ml-3">
                                {{ __('Save') }}
                            </x-button>
                            
                        </div>
                    </form>
                    </x-auth-card>
</x-app-layout>
