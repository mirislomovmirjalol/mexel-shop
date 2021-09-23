@extends('admin.layouts.app')

@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <h1 class="text-lg font-bold text-gray-900">
                    Orders
                </h1>
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
                                    Address
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    User
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Data
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($orders as $order)
                                <tr>
                                    <td class="pl-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        #{{ $order->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $order->address()->street }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $order->user()->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $order->created_at }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @switch($order->status)
                                            @case(0)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-yellow-500"
                                             viewBox="0 0 20 20"
                                             fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                              clip-rule="evenodd"/>
                                        </svg>
                                            Buyurtma korib chiqilmoqda
                                        </span>
                                            @break
                                            @case(1)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-green-400"
                                             viewBox="0 0 20 20"
                                             fill="currentColor">
                                            <path
                                                d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                                            <path
                                                d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/>
                                        </svg>
                                            Buyurtma yolda
                                        </span>
                                            @break
                                            @case(2)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5 mr-1 text-green-400"
                                                         viewBox="0 0 20 20" fill="currentColor">
                                                      <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                                      <path fill-rule="evenodd"
                                                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"/>
                                                    </svg>
                                            Buyurtma yetkazib berildi
                                        </span>
                                            @break
                                            @case(3)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-red-600"
                                             viewBox="0 0 20 20"
                                             fill="currentColor">
                                          <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                clip-rule="evenodd"/>
                                        </svg>
                                            Buyurtma bekor qilindi
                                        </span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end">
                                        <a href="{{ route('admin.order.show',['id' => $order->id]) }}"
                                           class="ml-1.5 hover:text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                 viewBox="0 0 20 20" fill="currentColor">
                                                <path stroke="#374151" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="M3 8V4m0 0h4M3 4l4 4m8 0V4m0 0h-4m4 0l-4 4m-8 4v4m0 0h4m-4 0l4-4m8 4l-4-4m4 4v-4m0 4h-4"/>
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.order.edit', ['id' => $order->id]) }}"
                                           class="ml-1.5 hover:text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                 viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                                <path fill-rule="evenodd"
                                                      d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </a>
                                        <button type="button" onclick="deleteModal({{ $order->id }})"
                                                class="ml-1.5 text-red-600 hover:text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                 viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                <div
                                    class="min-w-screen px-2 hidden h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"
                                    id="{{ $order->id }}">
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
                                                    order of
                                                    <span class="font-bold text-gray-600">
                                                        {{ $order->user()->name }}
                                                    </span>
                                                    ?
                                                    <br>
                                                    This process cannot be undone</p>
                                            </div>
                                            <!--modal footer-->
                                            <div class="flex justify-around">
                                                <button
                                                    type="button"
                                                    onclick="deleteCencel({{ $order->id }})"
                                                    class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                                                    Cancel
                                                </button>
                                                <form action="{{ route('admin.order.destroy', ['id' => $order->id]) }}">
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
