@auth
    <x-panel>
        <form method="POST" action="/movies/{{ $movie->slug }}/comments">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                @error('name')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Comment -->
            <div>
                <x-label for="comment" :value="__('Comment')" />

                <x-textarea id="comment" class="block mt-1 w-full" :value="old('comment')" name="comment" required autofocus>
                    
                </x-textarea>
                @error('comment')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Add Comment') }}
                </x-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or
        <a href="/login" class="hover:underline">log in</a> to leave a comment.
    </p>
@endauth