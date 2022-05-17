@props(['comment'])

<x-panel class="bg-gray-50">
    <article class="flex space-x-4">

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->name }}</h3>

                <p class="text-xs">
                    Posted
                    <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
                </p>
            </header>

            <p>
                {{ $comment->comment }}
            </p>
        </div>
    </article>
</x-panel>