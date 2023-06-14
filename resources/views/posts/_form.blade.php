<input type="hidden" name="id" value="{{ $post->id ?? 00 }}" />

<div class="w-[580px]">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900"
    >Title</label
    >
    <input
        type="text"
        id="title"
        name="title"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 outline-none
        @error('title') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror"
        placeholder="John Doe"
        value="{{ old('title', $post->title) }}"
    />
    @error('title')
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
<div class="w-[580px]">
    <label for="body" class="block mb-2 text-sm font-medium text-gray-900">Your post body</label>
    <textarea id="body" name="body" rows="10" class=" @error('body') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here...">
        {{old('body', $post->body ) }}
    </textarea>
    @error('body')
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
<div class="w-[580px]">
    <label for="filiere" class="block mb-2 text-sm font-medium text-gray-900"
    >Filiere</label
    >
    <select
        name="filiere_id"
        id="filiere"
        class="bg-gray-50 border @if (!isset($post)) cursor-not-allowed @endif border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
        @if (!isset($post)) disabled @endif
    >
        @foreach ($categories as $item )
            <option @if($item->id === $post->category_id) selected @endif value="{{ $item->id }}"> {{ $item->title }} </option>
        @endforeach
    </select>
</div>
<div class="w-[580px] flex gap-3 mt-3 justify-center">
    <button
        type="button"
        class="flex items-center gap-3 font-medium text-white bg-gradient-to-r rounded-md from-slate-400 to-gray-700 px-8 py-2 shadow-lg shadow-gray-500/50 hover:bg-gradient-to-br"
        onclick="window.location.href='{{ route('posts.index') }}'"
    >
        Cancel
    </button>
    <button
        type="submit"
        name="action"
        value="update"
        class="flex items-center gap-3 font-medium text-white bg-gradient-to-r rounded-md from-emerald-400 to-green-700 px-8 py-2 shadow-lg shadow-green-500/50 hover:bg-gradient-to-br"
    >
        Save
    </button>
</div>
