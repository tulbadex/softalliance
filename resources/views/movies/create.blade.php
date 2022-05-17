<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('movie.create') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Description -->
            <div>
                <x-label for="description" :value="__('Description')" />

                <x-textarea id="description" class="block mt-1 w-full" :value="old('description')" name="description" required autofocus>
                    
                </x-textarea>
            </div>

            <!-- Release Date -->
            <div>
                <x-label for="release_date" :value="__('Release Date')" />

                <x-input id="release_date" class="block mt-1 w-full" type="date" name="release_date" :value="old('release_date')" required autofocus />
            </div>

            <!-- Rating -->
            <div>
                <x-label for="rating" :value="__('Rating')" />

                <x-input id="rating" class="block mt-1 w-full" type="number" min="1" max="5" name="rating" :value="old('rating')" required autofocus />
            </div>

            <!-- Ticket Price -->
            <div>
                <x-label for="ticket_price" :value="__('Ticket Price')" />

                <x-input id="ticket_price" class="block mt-1 w-full" type="text" name="ticket_price" :value="old('ticket_price')" required autofocus />
            </div>

            <!-- Country -->
            <div>
                <x-label for="country" :value="__('Country')" />

                <x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required autofocus />
            </div>

            <!-- Genre -->
            <div>
                <x-label for="genre" :value="__('Genre')" />

                <x-input id="genre" class="block mt-1 w-full" type="text" name="genre" :value="old('genre')" required autofocus />
            </div>

            <!-- Photo -->
            <div>
                <x-label for="photo" :value="__('Photo')" />

                <x-input id="photo" class="block mt-1 w-full" type="file" name="photo" :value="old('photo')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Add Movie') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
