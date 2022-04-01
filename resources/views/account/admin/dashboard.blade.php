<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Welcome {{Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex flex-col mt-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-5">
                    List of Users
            </h2>
            
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Name</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Email</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Action</th>
                                   
                                </tr>
                            </thead>

                            <tbody class="bg-white">
                            @forelse($users as $u)
                                <tr>
                               
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                <img class="w-10 h-10 rounded-full" src="https://image.freepik.com/free-vector/illustration-user-avatar-icon_53876-5907.jpg"
                                                    alt="admin dashboard ui">
                                            </div>

                                            <div class="ml-4">
                                                <div class="text-sm font-medium leading-5 text-gray-900">
                                                    {{$u->name}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-500">{{$u->email}}</div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        @if($u->status == 1)
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active
                                        </span>
                                        @else
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-red-100 rounded-full">Inactive
                                        </span>
                                        @endif
                                    </td>

                                    <td
                                        class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                        @if($u->status == 1)
                                        <a href="{{route('admin.block',['email' => $u->email])}}" class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-red-100 rounded-full"> Block User </a>
                                        @else
                                        <a href="{{route('admin.activate',['email' => $u->email])}}" class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"> Activate User </a>
                                        @endif
                                        
                                        
                                    </td>
                                   
                                  
                                </tr>
                                @empty
                                                                            <td colspan="7" style="color:red;" class="text-center text-red">No Data.</td>
                                                                        @endforelse
                                                           </tbody>
                        </table>
                        <br/>
                        {!! $users->render() !!}
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
