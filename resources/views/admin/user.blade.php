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

            <div class="inline-grid  md:w-3/4">
                <div class="">

                    <div class="bg-white overflow-auto">
                            <table class="w-full bg-white rounded">
                                <thead class="bg-blue-500 text-white">
                                <tr>
                                    <th class="text-left px-2 py-2 uppercase font-semibold text-sm">Name</th>
                                    <th class="text-left px-2 py-2 uppercase font-semibold text-sm">Username</th>
                                    <th class="text-left px-2 py-2 uppercase font-semibold text-sm">Email</th>
                                    <th class="text-left px-2 py-2 uppercase font-semibold text-sm">Action</th>

                                </tr>
                                </thead>
                                <tbody class="bg-white">
                                @foreach($users as $user)
                                    <tr class="{{ $loop->iteration%2 !== 0 ? '' : 'bg-gray-100' }}">
                                        <td class="text-left px-2 py-4">{{ $user->name }} </td>
                                        <td class="text-left px-2 py-4">{{ $user->user_name }}</td>
                                        <td class="text-left px-2 py-4">{{ $user->email }}</td>
                                        <td class="text-left px-2 py-4">
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
