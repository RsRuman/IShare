<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-blue-100 p-6 rounded-xl border border-blue-300">
            <h1 class="text-center pt-2 font-bold text-xl">User Register</h1>
            <form action="/login" method="post">
                @csrf
                <label for="user_name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Username:</label>
                <input type="text" value="{{ old('user_name') }}" name="user_name" id="user_name" class="border border-gray-400 p-2 w-full rounded" placeholder="Enter your username">
                @error('user_name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label for="password" class="block mb-2 pt-2 uppercase font-bold text-xs text-gray-700">Password:</label>
                <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full rounded" placeholder="Enter your password">
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <button type="submit" class="bg-blue-500 mt-2 w-32 p-2 text-white rounded">Login</button>
            </form>
        </main>
    </section>
</x-layout>
