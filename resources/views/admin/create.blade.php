<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="bg-gray-100 font-extrabold font-serif p-10 rounded text-4xl text-center">
            <h3 class="animate-bounce">Dashboard</h3>
        </div>

        <div class="md:flex md:justify-between">
            <div class="bg-gray-100 font-serif md:inline-grid p-4 text-1xl auto-rows-min">
                <a href="/admin/dashboard" class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white">All Post</a>
                <a href="/admin/posts/create" class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white">Add New Post</a>
                <a href="/admin/categories/create" class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white">Add Category</a>
                <a href="/admin/dashboard" class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white">User List</a>
            </div>

            <div class="md:inline-grid w-3/4">
                <h1 class="text-center p-2 mb-2 font-bold bg-blue-500 text-white text-xl">Publish New Post</h1>
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
            </div>
        </div>
    </main>
</x-layout>
