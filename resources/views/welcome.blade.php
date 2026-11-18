@extends('layouts.app')

@section('title', 'Welcome to KavyaSetu')

@section('content')

    <div class="relative bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 py-24 sm:py-32">
        <div class="max-w-5xl mx-auto px-6 lg:px-8 text-center">
            <h1 class="text-5xl sm:text-6xl font-serif font-bold text-gray-900 mb-6 leading-tight">
                Share Your Heart,<br>
                <span class="text-indigo-700">One Verse at a Time</span>
            </h1>

            <p class="text-xl text-gray-700 max-w-2xl mx-auto mb-10">
                A gentle space for poets to publish original work and discover beautiful words from others.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                @guest
                    <a href="{{ route('register') }}"
                       class="inline-flex items-center px-8 py-4 text-lg font-medium rounded-full text-white bg-indigo-600 hover:bg-indigo-700 shadow-lg transition transform hover:-translate-y-1">
                        Start Writing → 
                    </a>
                @else
                    <a href="{{ route('poems.create') }}"
                       class="inline-flex items-center px-8 py-4 text-lg font-medium rounded-full text-white bg-indigo-600 hover:bg-indigo-700 shadow-lg transition transform hover:-translate-y-1">
                        Write New Poem →
                    </a>
                @endguest

                <a href="{{ route('poems.index') }}"
                   class="inline-flex items-center px-8 py-4 text-lg font-medium rounded-full border-2 border-indigo-600 text-indigo-700 hover:bg-indigo-50 transition">
                    Explore Poems
                </a>
            </div>
        </div>
    </div>

    <!-- What you can do here -->
    <div class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
            <div>
                <div class="text-2xl font-bold text-indigo-600 mb-2">Publish your poems</div>
                <p class="text-gray-600">Share original work with the world, one verse at a time.</p>
            </div>
            <div>
                <div class="text-2xl font-bold text-indigo-600 mb-2">Drafts stay private</div>
                <p class="text-gray-600">Unfinished poems are visible only to you until you publish them.</p>
            </div>
            <div>
                <div class="text-2xl font-bold text-indigo-600 mb-2">Discover new voices</div>
                <p class="text-gray-600">Browse the public feed and read what other poets are writing.</p>
            </div>
        </div>
    </div>

@endsection