<x-app-layout>

<!-- Search form -->
    <form method="GET" action="{{ route('catalogues.index') }}" class="mb-4">
        <input 
            type="text" 
            name="search" 
            placeholder="Search by title of print service or description..." 
            class="border rounded p-2 w-full"
            value="{{ request('search') }}"
        >
        <button 
            type="submit"
            class="bg-blue-500 text-white px-3 py-1 rounded mt-2 hover:bg-blue-800"
        >
            Search
        </button>
    </form>

    @if(session('error'))
        <div class="bg-red-200 text-red-800 p-2 rounded mb-2">
            {{ session('error') }}
        </div>
    @endif

    @if(auth()->check() && auth()->user()->role === 'print shop')
        <div id="postCatalogue">
            @include('catalogues._postCatalogue')
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-2">
            {{ session('success') }}
        </div>
    @endif

    <div class="border border-gray-300 rounded-lg">
        @forelse ($catalogues as $catalogue)
            <div class="mb-4">
                @include('catalogues._catalogues', ['catalogue' => $catalogue])
            </div>
        @empty
            <p class="p-4">No print requests. Create one!</p>
        @endforelse
    </div>
</x-app-layout>