@extends('layouts.app')

@section('content')
    <div class="container my-10 h-screen">
        <nav id="store" class="w-full z-30 top-0 px-6 py-1">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">
                <p class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl">
                    Orders History
                </p>
            </div>
        </nav>

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
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
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('order.show',['id' => $order->id]) }}"
                                               class="text-indigo-600 hover:text-indigo-900">Show</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="pl-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        You don't have any orders!
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

