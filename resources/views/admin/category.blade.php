<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="bg-gray-100 font-extrabold font-serif p-10 rounded text-4xl text-center">
            <h3 class="animate-bounce">Dashboard</h3>
        </div>

        <div class="md:flex md:justify-between">
            <div class="bg-gray-100 font-serif sm:text-center md:inline-grid p-4 text-1xl auto-rows-min">
                <a href="/admin/dashboard" class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white">Index</a>
                <a href="/admin/posts/create" class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white">Add New Post</a>
                <a href="/admin/category" class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white hover:bg-blue-700">Category List</a>
                <a href="/admin/categories/create" class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white">Add Category</a>
                <a href="/admin/user" class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white">User List</a>
            </div>

            <div class="md:inline-grid md:w-3/4">
                <h1 class="text-center p-2 mb-2 font-bold bg-blue-500 text-white text-xl">Category List</h1>
                <div class="w-full">
                    <div class="bg-white overflow-auto">
                        <div x-data="{show: false, open: true}" @click.away="show = false, open = true">
                        <x-delete-modal :url="$url= 'category'"/>

                        <table class="min-w-full bg-white rounded" x-bind:class="! open ? 'hidden' : ''">
                            <thead class="bg-blue-500 text-white">
                            <tr>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Slug</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>

                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            @foreach($categories as $category)
                                <tr class="{{ $loop->iteration%2 !== 0 ? '' : 'bg-gray-100' }}">
                                    <td class="w-1/3 text-left py-3 px-4">{{ $category->name }}</td>
                                    <td class="text-left py-3 px-4">{{ $category->slug }}</a></td>
                                    <td>
                                        <a class="bg-yellow-500 font-bold rounded text-white hover:bg-yellow-700 mg:px-2 md:py-2 sm:p-1">Edit</a>
                                        <button data-id="{{ $category->id }}" onclick="confirmDelete(this);" @click="show = !show, open = !open" class="bg-red-500 font-bold rounded text-white hover:bg-red-700 md:px-2 md:py-2 sm:p-1" >Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        function confirmDelete(self) {
            var id = self.getAttribute("data-id");
            console.log(id);
            document.getElementById("form-delete-user").id.value = id;

        }
    </script>
</x-layout>
