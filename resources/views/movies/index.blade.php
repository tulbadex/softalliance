<x-guest-layout>

    <div class="max-w-4xl mx-auto mt-8">

        <div class="mb-4">
            <h1 class="text-3xl font-bold text-center">
                Movie List
            </h1>
        </div>

        <div class="flex justify-end mt-10">
            <a href="{{ route('movie.create') }}" class="px-2 py-1 rounded-md bg-blue-500 text-sky-100 hover:bg-blue-700">+ Create New Movie</a>
        </div>

        <div class="flex flex-col mt-10">
            <div class="flex flex-col">
                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('message')" />

                     <table class="min-w-full">
                         <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">No</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Name</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Description</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Release Date</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Rating</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Ticket price</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Country</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Genre</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Photo</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50" width="180px">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($movies as $movie)
                            <tr>
                                <td class="px-6 whitespace-no-wrap border-b border-gray-200">{{ ++$i }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $movie->name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $movie->description }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $movie->release_date }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $movie->rating }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $movie->ticket_price }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $movie->country }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <ul class="list-disc">
                                        @php
                                           $genres = explode(',', $movie->genre);

                                        @endphp
                                        @foreach ($genres as $genre)
                                            <li>{{ $genre }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <img src="{{ asset('storage/'.$movie->photo) }}" height="150" width="150" />
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 items-center">
                        
                                    <a class="text-indigo-600 hover:text-indigo-900" href="{{ route('movie.show',$movie->slug) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </a>
                       
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $movies->links() }}
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
