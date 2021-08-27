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

            <div class="md:w-3/4">
                <h1 class="text-center p-2 mb-2 font-bold bg-blue-500 text-white text-xl">User List</h1>
                    <div class="bg-white overflow-auto">
                        <div x-data="{show: false, open: true}" @click.away="show = false, open = true">
                            <div x-show="show">
                                <div class="flex flex-col space-y-4 min-w-screen animated fadeIn faster left-0 top-0 flex justify-center items-center inset-0 z-50 h-60 outline-none focus:outline-none bg-gray-100">
                                    <div class="flex flex-col p-8 bg-gray-800 shadow-md hover:shodow-lg rounded-2xl">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="w-16 h-16 rounded-2xl p-3 border border-gray-800 text-blue-400 bg-gray-900" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <div class="flex flex-col ml-3">
                                                    <div class="font-medium leading-none text-gray-100">Delete Your Acccount ?</div>
                                                    <p class="text-sm text-gray-500 leading-none mt-1">By deleting your account you will lose your all data
                                                    </p>
                                                </div>
                                            </div>
                                            <form method="POST" action="/user/delete" id="form-delete-user">
                                                @csrf
                                                <input type="hidden" name="id">
                                                <button type="submit" class="flex-no-shrink bg-red-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-full">Delete</button>
                                            </form>
                                            <button @click="show = false, open = true" class="flex-no-shrink bg-green-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-500 text-white rounded-full">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <table class="w-full bg-white rounded" x-bind:class="! open ? 'hidden' : ''">
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
                                                <button data-id="{{ $user->id }}" onclick="confirmDelete(this);" @click="show = !show, open = !open" class="bg-red-500 font-bold rounded text-white hover:bg-red-700 md:px-2 md:py-2 sm:p-1" >Delete</button>
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
            document.getElementById("form-delete-user").id.value = id;
            console.log(id);
        }
    </script>
</x-layout>
