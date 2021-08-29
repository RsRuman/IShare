<dialog id="myModal" class=" w-11/12 md:w-1/2 p-5  bg-white rounded-md ">

    <div class="flex flex-col w-full h-auto ">
        <!-- Header -->
        <div class="flex w-full h-auto justify-center items-center">
            <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                Modal Header
            </div>
            <div onclick="document.getElementById('myModal').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
            <!--Header End-->
        </div>
        <!-- Modal Content-->
        <div class="w-full h-auto py-10 px-10 justify-center items-center bg-gray-200 rounded text-center text-gray-500">



            <form action="/post/update" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="id" id="id" hidden>


                <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="border border-gray-400 p-2 w-full rounded" value="{{ old('title') }}" placeholder="Post Title">
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror


                <label for="excerpt" class="block mt-2 mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>
                <textarea class="border border-gray-400 p-2 w-full rounded h-60" name="excerpt" id="excerpt" placeholder="Excerpt"> {{ old('excerpt') }}</textarea>
                @error('excerpt')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <label for="body" class="block mt-2 mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
                <textarea class="border border-gray-400 p-2 w-full rounded h-60" name="body" id="body" placeholder="Body">{{ old('body') }}</textarea>
                @error('body')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="right-0">
                    <button type="submit" class="bg-blue-500 mt-2 w-32 p-2 uppercase flex-right text-white rounded">update</button>
                </div>
            </form>




        </div>
        <!-- End of Modal Content-->

    </div>
</dialog>
