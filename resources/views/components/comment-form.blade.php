@props(['post'])
<form method="post" action="/comments/{{ $post->slug }}/comments" class="bg-blue-50 p-2 rounded-xl">
    @csrf
    <div>
        <header class="flex items-center">
            <img class="rounded" src="https://i.pravatar.cc/60?u={{ auth()->id() }}">
            <h2 class="ml-4">Wants to participate?</h2>
        </header>
        <div class="mt-6">
            <textarea name="body" class="focus:outline-none focus:ring p-2 rounded-xl text-sm w-full" rows="5" placeholder="Write something about the post" required></textarea>
        </div>
        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Submit</button>
        </div>
    </div>
</form>
