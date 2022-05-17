
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo"></x-slot>

        <div class="max-w-4xl mx-auto mt-8">

            <div class="mb-4">
                <h1 class="text-3xl font-bold text-center">
                    {{ $movie->name }}
                </h1>
            </div>

            <div class="flex justify-start mt-10">
                <a href="{{ route('movie.index') }}" class="px-2 py-1 rounded-md bg-blue-500 text-sky-100 hover:bg-blue-700">Movie List</a>
            </div>
    
            <div class="flex justify-end mt-10">
                <a href="{{ route('movie.create') }}" class="px-2 py-1 rounded-md bg-blue-500 text-sky-100 hover:bg-blue-700">+ Create New Movie</a>
            </div>
    
            <div class="flex flex-col mt-10">
                <div class="flex flex-col">
                    <div class="inline-block w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
    
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('message')" />
    
                         <table class="w-full border-collapse border border-slate-500">
                            <tbody class="bg-white">
                                <tr>
                                    <td class="border border-slate-700">Name</td>
                                    <td class="border border-slate-700">{{ $movie->name }}</td>
                                </tr>

                                <tr>
                                    <td class="border border-slate-700">Description</td>
                                    <td class="border border-slate-700">{{ $movie->description }}</td>
                                </tr>

                                <tr>
                                    <td class="border border-slate-700">Realese Date</td>
                                    <td class="border border-slate-700">{{ $movie->release_date }}</td>
                                </tr>

                                <tr>
                                    <td class="border border-slate-700">Rating</td>
                                    <td class="border border-slate-700">{{ $movie->rating }}</td>
                                </tr>

                                <tr>
                                    <td class="border border-slate-700">Ticket Price</td>
                                    <td class="border border-slate-700">{{ $movie->ticket_price }}</td>
                                </tr>

                                <tr>
                                    <td class="border border-slate-700">Country</td>
                                    <td class="border border-slate-700">{{ $movie->country }}</td>
                                </tr>

                                <tr>
                                    <td class="border border-slate-700">Genre</td>
                                    <td class="border border-slate-700 mx-24 bg-green-200 text-justify px-6">
                                        <ul class="list-disc">
                                            @php
                                               $genres = explode(',', $movie->genre);
    
                                            @endphp
                                            @foreach ($genres as $genre)
                                                <li>{{ $genre }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="border border-slate-700">Photo</td>
                                    <td class="border border-slate-700">
                                        <img src="{{ asset('storage/'.$movie->photo) }}" height="150" width="150" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <section class="col-span-8 col-start-5 mt-10 space-y-6">
                            @include ('movies._add-comment-form')

                            @foreach ($movie->comments as $comment)
                                <x-movie-comment :comment="$comment"/>
                            @endforeach
                        </section>
                    </div>
                </div>
            </div>
        </div>

    </x-auth-card>
</x-guest-layout>

