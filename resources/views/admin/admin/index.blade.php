@extends('admin.layouts.app')

@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <h1 class="text-lg font-bold text-gray-900">
                    Admins
                </h1>
                <a href="{{ route('admin.admin.create') }}"
                   class="px-8 py-2 bg-gray-800 text-white text-sm font-medium rounded hover:bg-gray-600 hover:no-underline cursor-pointer">
                    Add
                </a>
            </div>
        </div>


    </header>

    <div class="container">
        <div class="flex flex-col mt-8">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow-sm overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="pl-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Phone
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Data
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($users as $admin)
                                <tr>
                                    <td class="w-auto pl-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        #{{ $admin->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $admin->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $admin->phone }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        @if($admin->is_admin)
                                            Admin
                                        @else
                                            Client
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $admin->created_at }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end">
                                        <a href="{{ route('admin.admin.edit', ['id' => $admin->id]) }}"
                                           class="ml-1.5 hover:text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                                <path fill-rule="evenodd"
                                                      d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </a>
                                        @if(\Illuminate\Support\Facades\Auth::id() != $admin->id)
                                        <button type="button" onclick="deleteModal({{ $admin->id }})"
                                                class="ml-1.5 text-red-600 hover:text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                <div
                                    class="min-w-screen px-2 hidden h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"
                                    id="{{ $admin->id }}">
                                    <div class="absolute bg-gray-600 bg-opacity-60 opacity-80 inset-0 z-0"></div>
                                    <div
                                        class="w-full  max-w-lg p-2 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                                        <!--content-->
                                        <div class="">
                                            <!--body-->
                                            <div class="text-center p-5 flex-auto justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto"
                                                     fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="w-16 h-16 flex items-center text-red-500 mx-auto"
                                                     viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                                <h2 class="text-xl font-bold py-4 ">Are you sure?</h2>
                                                <p class="text-sm text-gray-500 px-8 ">Do you really want to delete
                                                    <span class="font-bold text-gray-600">
                                                        {{ $admin->name }}
                                                    </span>
                                                    ?
                                                    <br>
                                                    This process cannot be undone</p>
                                            </div>
                                            <!--modal footer-->
                                            <div class="flex justify-around">
                                                <button
                                                    type="button"
                                                    onclick="deleteCencel({{ $admin->id }})"
                                                    class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                                                    Cancel
                                                </button>
                                                <form action="{{ route('admin.admin.destroy', ['id' => $admin->id]) }}">
                                                    <button
                                                        class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteModal(id) {
            let modalId = document.getElementById(id)
            modalId.classList.remove('hidden')
        }

        function deleteCencel(id) {
            let modalId = document.getElementById(id)
            modalId.classList.add('hidden')
        }
    </script>
@endsection
