@extends('layouts.app')

@section('content')
    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-32 lg:max-w-none">
                <h2 class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl">Categories</h2>
                <div class="mx-auto flex items-center flex-wrap pt-4">
                    @foreach($categories as $category)
                        <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                            <a href="{{ route ('category.show', $category->id) }}" class="hover:text-gray-500 hover:no-underline">
                                <div
                                    class="relative w-full h-80 bg-white rounded-lg overflow-hidden sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1 hover:grow hover:shadow-lg">
                                    <img src="{{ asset('images') }}/{{ $category->image }}"
                                         alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                                         class="w-full h-full object-center object-cover">
                                </div>
                                <div class="pt-3 flex items-center justify-between">
                                    <p class="text-base font-semibold">{{ $category->name }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
