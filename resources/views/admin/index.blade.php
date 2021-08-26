<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="bg-gray-100 font-extrabold font-serif p-10 rounded text-4xl text-center">
            <h3 class="animate-bounce">Dashboard</h3>
        </div>

        <div class="md:flex md:justify-between">
            <div class="bg-gray-100 font-serif inline-grid p-4 text-1xl auto-rows-min">
                <a class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white">All Post</a>
                <a class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white">Add New Post</a>
                <a class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white">User List</a>
                <a class="bg-blue-500 font-bold p-2 mb-3 h-10 rounded-tr-3xl text-white">Add Category</a>
            </div>

            <div class="inline-grid w-3/4">
                <div class="w-full">

                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                            <tr>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Thumbnail</th>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Category</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>

                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            <tr>
                                <td class="w-1/3 text-left py-3 px-4">Lian</td>
                                <td class="w-1/3 text-left py-3 px-4">Smith</td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
