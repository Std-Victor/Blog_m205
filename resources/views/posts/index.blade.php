@extends('layouts.main')
@section('content')
    <main>
        <div class="overflow-x-auto w-full py-12">
        <div class="mx-auto w-3/5 flex justify-between items-center px-5 pb-4">
                <div>
                    <h1 class="text-lg font-semibold my-2">Welcome to our community</h1>
                    <p class="text-gray-500 text-base">This is a list of all the posts that are available now, feel free to read anyone you would like.</p>
                </div>
                <button type="button" class="font-medium text-white bg-gradient-to-r rounded-md from-cyan-500 to-blue-700 px-4 py-3 shadow-lg shadow-blue-500/50 hover:bg-gradient-to-br" onclick="window.location.href='{{ route('posts.create') }}'">Add New Post</button>
            </div>
            @if ($message = session('message'))
                <div class="mx-auto w-3/5 flex p-4 my-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Success alert!</span> {{ $message }}
                    </div>
                </div>
            @endif
            <div class="mx-auto w-4/5 text-sm text-left text-gray-500 overflow-hidden flex flex-row gap-5 flex-wrap ">
                @forelse($posts as $pst)
                    <div class="px-1 py-2 w-[480px]">
                        <div class="bg-white shadow-2xl rounded-lg mb-6 tracking-wide " >
                            <div class="md:flex-shrink-0">
                                <img src="https://picsum.photos/id/{{$pst->id <= 2 ? $pst->id + 4 : $pst->id - 2}}{{$pst->category->id}}0/600/300.jpg" alt="mountains" class="w-full h-64 rounded-lg rounded-b-none">
                            </div>
                            <div class="px-4 py-2 mt-2">
                                <h2 class="font-bold text-2xl text-gray-800 tracking-normal mb-3">{{ strlen($pst->title) > 25 ? substr($pst->title, 0,25)."..." : $pst->title  }}</h2>
                                <p class="text-sm text-gray-700 px-2 mr-1">{{ substr($pst->body,0,230) }}...</p>
                                <div class="flex items-center justify-between mt-2 mx-6">
                                    <a href="{{ route('posts.show',['post' => $pst]) }}" class="text-blue-500 text-xs -ml-3 ">Show More</a>
                                    <a href="#" class="flex text-gray-700">
                                        <svg fill="none" viewBox="0 0 24 24" class="w-6 h-6 text-blue-500" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                        </svg>
                                        5
                                    </a>
                                </div>
                                <div class="author flex items-center -ml-3 my-3">
                                    <div class="user-logo">
                                        <img class="w-12 h-12 object-cover rounded-full mx-4  shadow" src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=731&q=80" alt="avatar">
                                    </div>
                                    <h2 class="text-sm tracking-tighter text-gray-900">
                                        <a href="#">By {{ $pst->user->name }}</a> <span class="text-gray-600">{{ $pst->updated_at->format('j M Y') }}.</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1>no data</h1>
                @endforelse
            </div>
            <div class="mx-auto w-3/5 flex justify-center items-center mt-9"> {{ $posts->links() }} </div>
        </div>
    </main>
@endsection
