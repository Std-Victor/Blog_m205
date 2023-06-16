@extends('layouts.main')
@section('title', 'Add New Post')
@section('content')
    <main class="overflow-x-auto w-full py-12">
        <div class="mx-auto w-max mt-16 px-6 pb-4 border border-gray-400/50 rounded-md shadow-lg shadow-gray-500/50">
            <div class="mt-5">
                <form action="{{ route('posts.store') }}" method="POST" class="grid gap-y-6 py-5">
                    @csrf
                    @include('posts._form')
                </form>
            </div>
        </div>
    </main>
@endsection
