<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-blue-100 p-6 rounded-xl border border-blue-300">
            <h1 class="text-center pt-2 font-bold text-xl">Publish New Post</h1>
            <form action="/admin/posts" method="post" enctype="multipart/form-data">
                @csrf
                <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="border border-gray-400 p-2 w-full rounded" value="{{ old('title') }}" placeholder="Post Title">
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label for="category" class="block mt-2 mb-2 uppercase font-bold text-xs text-gray-700">Select Category</label>
                <select name="category_id" id="category_id" class="border border-gray-400 p-2 w-full rounded" >
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('$category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label for="thumbnail" class="block mt-2 mb-2 uppercase font-bold text-xs text-gray-700">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail" class="border bg-white border-gray-400 p-2 w-full rounded" value="{{ old('thumbnail') }}" placeholder="Chose thumbnail">
                @error('thumbnail')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label for="excerpt" class="block mt-2 mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>
                <textarea class="border border-gray-400 p-2 w-full rounded" name="excerpt" id="excerpt" placeholder="Excerpt"> {{ old('excerpt') }}</textarea>
                @error('excerpt')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label for="body" class="block mt-2 mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
                <textarea class="border border-gray-400 p-2 w-full rounded" name="body" id="body" placeholder="Body">{{ old('body') }}</textarea>
                @error('body')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="right-0">
                    <button type="submit" class="bg-blue-500 mt-2 w-32 p-2 uppercase flex-right text-white rounded">Post</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
