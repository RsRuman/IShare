<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="bg-gray-100 font-extrabold font-serif p-10 rounded text-4xl text-center">
            <h3 class="animate-bounce">Dashboard</h3>
        </div>

        <div class="md:flex md:justify-between">
            <div class="bg-gray-100 font-serif sm:text-center md:inline-grid p-4 text-1xl auto-rows-min">
                <a href="/admin/dashboard" class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white hover:bg-blue-700">Index</a>
                <a href="/admin/posts/create" class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white hover:bg-blue-700">Add New Post</a>
                <a href="/admin/category" class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white hover:bg-blue-700">Category List</a>
                <a href="/admin/categories/create" class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white hover:bg-blue-700">Add Category</a>
                <a href="/admin/user" class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white hover:bg-blue-700">User List</a>
            </div>

            <div class="md:w-3/4 text-center">
                <h1 class="text-center p-2 mb-2 font-bold bg-blue-500 text-white text-xl">Create Category</h1>
                <div class="w-full">
                    <form action="/admin/categories/" method="post">
                        @csrf
                        <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
                        <input type="text" name="name" id="name" class="border border-gray-400 p-2 rounded" value="{{ old('category') }}" placeholder="Category Name">
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="text-center">
                            <button type="submit" class="bg-blue-500 mt-2 w-32 p-2 uppercase flex-right text-white rounded">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-layout>
