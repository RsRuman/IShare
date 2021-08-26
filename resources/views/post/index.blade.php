<x-layout>
    <x-_header :categories="$categories" :currentCategory="$currentCategory"/>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if(count($posts) > 0)
            <x-post-feature-card :post='$posts->first()'/>
            <div class="lg:grid lg:grid-cols-6">
            @foreach($posts->skip(1) as $post)
                <x-post-card :post='$post' class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}"/>
            @endforeach
            </div>
            {{ $posts->links() }}
        @else
            <h1 class="font-bold text-3xl text-blue-500 text-center">We'll get back to you. Post is coming... Please be patient. Thank you!</h1>
        @endif
    </main>
</x-layout>
