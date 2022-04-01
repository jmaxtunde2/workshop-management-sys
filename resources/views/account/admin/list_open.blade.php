<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{$data['title']}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex flex-col mt-8">
            <div class="inline-flex ml-5">
                <span
                    class="content-end px-2 font-semibold leading-5 text-left text-green-800 bg-red-100 rounded-full">
                    <a href="{{route('admin.create_workshop')}}" class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-red-100 rounded-full"> Add New Workshop </a>
                                        
                </span> &nbsp;&nbsp;
                <span
                    class="content-end px-2 font-semibold leading-5 text-left text-green-800 bg-red-100 rounded-full">
                    <a href="{{route('admin.create_openday')}}" class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-red-100 rounded-full"> Create Workshop Open Day </a>
                                        
                </span>
               
            </div> <br/>

            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Filter by workshop name...">

            
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full" id="myTable">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Workshop</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Open Day</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Open Time</th>
        
                                   
                                </tr>
                            </thead>

                            <tbody class="bg-white">
                            @forelse($opens as $u)
                                <tr>
                               
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-500">{{$u->workshop->names}}</div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-500">{{$u->day}}</div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-500">{{$u->time_from}} - {{$u->time_to}}</div>
                                    </td>

                                    <td></td>
                                   
                                  
                                </tr>
                                @empty
                                                                            <td colspan="7" style="color:red;" class="text-center text-red">No Data.</td>
                                                                        @endforelse
                                                           </tbody>
                        </table>
                        <br/>
                        {!! $opens->render() !!}
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
