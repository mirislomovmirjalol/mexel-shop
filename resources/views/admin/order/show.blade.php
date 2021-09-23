@extends('admin.layouts.app')

@section('content')
    <div class="container my-10 h-screen">
        <div class="lg:w-1/2 md:w-full mx-auto flex flex-col bg-white shadow-xl">
            <div class="flex-1 py-6 overflow-y-auto px-4 sm:px-6">
                <div class="flex items-start justify-between">
                    <a href="{{ URL::previous() }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-5" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <h2 class="tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl"
                        id="slide-over-title">
                        Order #{{ $id }}
                    </h2>
                    <span></span>
                </div>

                <div class="mt-8">
                    <div class="flow-root">
                        <ul role="list" class="-my-6 divide-y divide-gray-200">

                            @if($products)

                                @foreach($products as $product)
                                    <li class="py-6 flex">
                                        <div
                                            class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                                            <img
                                                src="{{ asset('images') }}/{{ $product->products()->first()->image }}"
                                                class="w-full h-full object-center object-cover">
                                        </div>

                                        <div class="ml-4 flex-1 flex flex-col">
                                            <div>
                                                <div class="flex justify-between font-medium text-gray-800">
                                                    <h3>
                                                        <a href="{{ route ('product.show', $product->products()->first()->id) }}">
                                                            {{ $product->products()->first()->name }}
                                                        </a>
                                                    </h3>
                                                    <p class="ml-4">
                                                        {{ $product->products()->first()->price }} Sum
                                                    </p>
                                                </div>

                                            </div>
                                            <div class="flex-1 flex items-end justify-between text-sm">
                                                <div class="pr-8 flex ">
                                                    <span class="font-semibold px-2 mx-1">{{ $product->count }}</span>
                                                </div>
                                            </div>
                                            <div class="flex-1 flex items-end justify-between text-sm">
                                                <div class="pr-8 flex ">
                                                    <form
                                                        action="{{ route ('admin.order.reduce', ['order' => $id,'productId' => $product->products()->first()->id]) }}"
                                                        method="post">
                                                        <button type="submit" role="button">
                                                            <span class="font-semibold bg-gray-100 px-2 rounded">
                                                                -
                                                            </span>
                                                        </button>
                                                        @csrf
                                                    </form>
                                                    <span class="font-semibold px-2 mx-1">{{ $product->count }}</span>
                                                    <form
                                                        action="{{ route ('admin.order.add', ['order' => $id,'productId' => $product->products()->first()->id]) }}"
                                                        method="post">
                                                        <button type="submit" role="button">
                                                            <span class="font-semibold bg-gray-100 px-2 rounded">
                                                                +
                                                            </span>
                                                        </button>
                                                        @csrf
                                                    </form>
                                                </div>

                                                <div class="flex">
                                                    <form
                                                        action="{{ route('admin.order.remove', ['order' => $id,'productId' => $product->products()->first()->id]) }}"
                                                        method="post">
                                                        <button type="submit"
                                                                class="font-medium text-red-600 hover:text-gray-400">
                                                            Remove
                                                        </button>
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                @endforeach
                            @else
                                <li class="py-6 flex">
                                    <div class="ml-4 flex-1 flex flex-col">
                                        <div>
                                            <div class="flex justify-between font-medium text-gray-800">
                                                <h3>
                                                    You Don't Have Any products on your cart!
                                                </h3>

                                            </div>

                                        </div>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                <div class="flex justify-between text-base font-medium text-gray-800">
                    <p>Subtotal</p>
                    <p>
                        @if($product ?? '')
                            {{ $product->getFullPrice($id) }}
                        @else
                            0
                        @endif
                        sum</p>
                </div>
                <p class="mt-0.5 text-sm text-yellow-500">Delivery is not included in this price!</p>
            </div>
            <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                <div class="flex justify-between text-base font-medium text-gray-800">
                    <p>
                        User
                    </p>
                    <p>
                        {{ $order->user()->name }}
                    </p>
                </div>
                <div class="flex justify-between text-base font-medium text-gray-800">
                    <p>
                        Phone Number
                    </p>
                    <p>
                        {{ $order->user()->phone }}
                    </p>
                </div>
                <div class="flex justify-between text-base font-medium text-gray-800">
                    <p>
                        City
                    </p>
                    <p>
                        {{ $order->address()->city }}
                    </p>
                </div>
                <div class="flex justify-between text-base font-medium text-gray-800">
                    <p>
                        Region
                    </p>
                    <p>
                        {{ $order->address()->region }}
                    </p>
                </div>
                <div class="flex justify-between text-base font-medium text-gray-800">
                    <p>
                        Street
                    </p>
                    <p>
                        {{ $order->address()->street }}
                    </p>
                </div>
                <div class="flex justify-between text-base font-medium text-gray-800">
                    <p>
                        Home Number
                    </p>
                    <p>
                        {{ $order->address()->home_number }}
                    </p>
                </div>
                <div class="flex justify-between text-base font-medium text-gray-800">
                    <p>
                        Landmark
                    </p>
                    <p>
                        {{ $order->address()->landmark }}
                    </p>
                </div>
            </div>
            @switch($order->status)
                @case(0)
                <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                    <div class="flex justify-between text-base font-medium text-gray-800">
                        <button type="button" onclick="openModal('cancelModal')"
                                class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Cancel Order
                        </button>
                        <button type="button" onclick="openModal('confirmModal')"
                                class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Confirm Order
                        </button>
                    </div>
                </div>
                @break
                @case(1)
                <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                    <div class="flex justify-end text-base font-medium text-gray-800">
                        <button type="button" onclick="openModal('deliveredOrder')"
                                class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Delivered Order
                        </button>
                    </div>
                </div>
                @break
                @case(2)
                <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                    <div class="flex justify-end text-base font-medium text-green-400">
                        <h3>
                            Order is done!
                        </h3>
                    </div>
                </div>
                @break
                @case(3)
                <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                    <div class="flex justify-end text-base font-medium text-red-600">
                        <h3>
                            Order is canceled!
                        </h3>
                    </div>
                </div>
                @break
            @endswitch
        </div>
    </div>


    {{--    Cancel modal   --}}

    <div
        class="min-w-screen px-2 hidden h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"
        id="cancelModal">
        <div class="absolute bg-gray-600 bg-opacity-60 opacity-80 inset-0 z-0"></div>
        <div
            class="w-full  max-w-lg p-2 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
            <!--content-->
            <div class="">
                <!--body-->
                <div class="text-center p-5 flex-auto justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                              clip-rule="evenodd"/>
                    </svg>
                    <h2 class="text-xl font-bold py-4 ">Are you sure?</h2>
                    <p class="text-sm text-gray-500 px-8 ">Do you really want to cancel order of
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
                        onclick="modalCancel('cancelModal')"
                        class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                        Back
                    </button>
                    <form action="{{ route('admin.order.cancel',['order' => $order->id]) }}" method="post">
                        <button
                            class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600">
                            Cancel
                        </button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--    Confirm modal   --}}

    <div
        class="min-w-screen px-2 hidden h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"
        id="confirmModal">
        <div class="absolute bg-gray-600 bg-opacity-60 opacity-80 inset-0 z-0"></div>
        <div
            class="w-full  max-w-lg p-2 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
            <!--content-->
            <div class="">
                <!--body-->
                <div class="text-center p-5 flex-auto justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-16 h-16 flex items-center text-green-500 mx-auto"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                        <path
                            d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/>
                    </svg>
                    <h2 class="text-xl font-bold py-4 ">Are you sure?</h2>
                    <p class="text-sm text-gray-500 px-8 ">Do you really want to confirm order of
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
                        onclick="modalCancel('confirmModal')"
                        class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                        Back
                    </button>
                    <form action="{{ route('admin.order.confirm',['order' => $order->id]) }}" method="post">
                        <button
                            class="mb-2 md:mb-0 bg-green-500 border border-green-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-600">
                            Confirm
                        </button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--    Delivered modal   --}}

    <div
        class="min-w-screen px-2 hidden h-screen animated fadeIn faster fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"
        id="deliveredOrder">
        <div class="absolute bg-gray-600 bg-opacity-60 opacity-80 inset-0 z-0"></div>
        <div
            class="w-full  max-w-lg p-2 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
            <!--content-->
            <div class="">
                <!--body-->
                <div class="text-center p-5 flex-auto justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-16 h-16 flex items-center text-green-500 mx-auto"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                              clip-rule="evenodd"/>
                    </svg>
                    <h2 class="text-xl font-bold py-4 ">Are you sure?</h2>
                    <p class="text-sm text-gray-500 px-8 ">Do you really want to change status to delivered order of
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
                        onclick="modalCancel('deliveredOrder')"
                        class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                        Back
                    </button>
                    <form action="{{ route('admin.order.delivered',['order' => $order->id]) }}" method="post">
                        <button
                            class="mb-2 md:mb-0 bg-green-500 border border-green-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-600">
                            Delivered
                        </button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(id) {
            let modalId = document.getElementById(id)
            modalId.classList.remove('hidden')
        }

        function modalCancel(id) {
            let modalId = document.getElementById(id)
            modalId.classList.add('hidden')
        }
    </script>
@endsection

