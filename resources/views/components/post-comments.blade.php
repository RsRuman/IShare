@props(['comment'])
<article class="bg-gray-100 flex p-2 space-x-2.5 p-2 rounded-xl border border-gray-200">
    <div>
        <img class="rounded" src="https://i.pravatar.cc/60?u={{ $comment->user_id }}">
    </div>
    <div>
        <header>
            <h3 class="font-bold">{{ $comment->user->username }}</h3>
            <p class="text-xs">Posted <time>{{ $comment->created_at->diffForHumans() }}</time></p>
        </header>
        <p class="pt-3">{{ $comment->body }}</p>
    </div>
</article>
