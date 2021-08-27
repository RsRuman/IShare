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
                <a href="/admin/user" class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white">User List</a>
            </div>

            <div class="inline-grid w-3/4">
                <div class="w-full">

                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white rounded">
                            <thead class="bg-blue-500 text-white">
                            <tr>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Thumbnail</th>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Category</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>

                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            @foreach($posts as $post)
                                <tr class="{{ $loop->iteration%2 !== 0 ? '' : 'bg-gray-100' }}">
                                    <td class="w-1/3 text-left py-3 px-4"> <img src="{{ asset('storage/'.$post->thumbnails) }}" alt="Blog Post illustration" class="rounded-xl h-20 w-28"></td>
                                    <td class="w-1/3 text-left py-3 px-4">{{ $post->title }}</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">{{ $post->category->name }}</a></td>
                                    <td>
                                        <a class="bg-yellow-500 font-bold rounded text-white hover:bg-yellow-700 mg:px-2 md:py-2 sm:p-1">Edit</a>
                                        <a class="bg-red-500 font-bold rounded text-white hover:bg-red-700 md:px-2 md:py-2 sm:p-1" >Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
