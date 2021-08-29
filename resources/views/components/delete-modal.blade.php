@props(["url"])
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
                <form method="POST" action="/{{$url}}/delete" id="form-delete-user">
                    @csrf
                    <input type="hidden" name="id">
                    <button type="submit" class="flex-no-shrink bg-red-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-500 text-white rounded-full">Delete</button>
                </form>
                <button @click="show = false, open = true" class="flex-no-shrink bg-green-500 px-5 ml-4 py-2 text-sm shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-500 text-white rounded-full">Cancel</button>
            </div>
        </div>
    </div>
</div>
