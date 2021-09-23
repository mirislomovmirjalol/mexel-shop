@extends('layouts.app')

@section('content')
    <div class="container my-10 h-screen">
        <nav id="store" class="w-full z-30 top-0 px-6 py-1">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                <p class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl">
                    Active Orders
                </p>
            </div>
        </nav>

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
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
                            @if($orders)
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="pl-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                            #{{ $order->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                            {{ $order->address()->street }}
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
                                            @endswitch
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('order.show',['id' => $order->id]) }}" class="text-indigo-600 hover:text-indigo-900">Show</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="pl-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        You don't have any active orders!
                                    </td>
                                    <td class="pl-6 py-4 whitespace-nowrap text-sm text-gray-600">

                                    </td>
                                    <td class="pl-6 py-4 whitespace-nowrap text-sm text-gray-600">

                                    </td>
                                    <td class="pl-6 py-4 whitespace-nowrap text-sm text-gray-600">

                                    </td>
                                    <td class="pl-6 py-4 whitespace-nowrap text-sm text-gray-600">

                                    </td>
                                </tr>
                            @endif
                            <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

