@props(['post'])
<article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
    <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
        <img src="{{ asset('storage/'.$post->thumbnails) }}" alt="" class="rounded-xl">

        <p class="mt-4 block text-gray-400 text-xs">
            Published <time>{{ $post->created_at->diffForHumans() }}</time>
        </p>

        <div class="flex items-center lg:justify-center text-sm mt-4">
            <img src="/images/lary-avatar.svg" alt="Lary avatar">
            <div class="ml-3 text-left">
                <a href="/?author={{ $post->user->user_name }}">
                    <h5 class="font-bold">{{ $post->user->name }}</h5>
                </a>
                <h6>Mascot at Laracasts</h6>
            </div>
        </div>
    </div>

    <div class="col-span-8">
        <div class="hidden lg:flex justify-between mb-6">
            <div class="space-x-2">
                <a href="/?category={{ $post->category->slug }}"
                   class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                   style="font-size: 10px">{{ $post->category->name }}</a>
            </div>
        </div>

        <h1 class="font-bold text-3xl lg:text-4xl mb-10">
            {{ $post->title }}
        </h1>

        <div class="space-y-4 lg:text-lg leading-loose">
            <p>{{ $post->body }}</p>

        </div>
    </div>
    <section class="col-span-8 col-start-5 mt-10 rounded-xl space-y-6">
        @auth
        <x-comment-form :post="$post"/>
        @endauth
        @foreach($post->comments as $comment)
        <x-post-comments :comment="$comment"/>
        @endforeach
    </section>
</article>
