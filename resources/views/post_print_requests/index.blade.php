<!-- filepath: /c:/laragon/www/Print2Connect/resources/views/post_print_requests/index.blade.php -->
<x-app-layout>

    <!-- Search form -->
    <form method="GET" action="{{ route('post_print_requests.index') }}" class="mb-4">
        <input 
            type="text" 
            name="search" 
            placeholder="Search by print type or description..." 
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

    <!-- Only show "Post Print Request" form if user is a customer -->
    @if(auth()->check() && auth()->user()->role === 'customer')
        <div class="mb-4">
            <button
                type="button"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                onclick="togglePostPrintRequestPanel()"
            >
                Post Print Request
            </button>
        </div>
        <div id="postPrintRequestPanel" style="display:none;">
            @include('post_print_requests._publish-postprintrequest-panel')
        </div>
    @endif

    @if(session()->has('success'))
        <div class="border-gray-500 bg-green-400 p-2 w-full mb-2 rounded-lg" onclick="this.style.display='none'">
            {{session()->get('success')}}
            <span class="text-sm text-gray-500">(click to dismiss)</span>
        </div>
    @endif
    
<div class="border border-gray-300 rounded-lg">
    @forelse ($printRequests as $printRequest)
        <div class="mb-4">
            @include('post_print_requests._printrequest', ['printRequest' => $printRequest])
        </div>
    @empty
        <p class="p-4">No print requests. Create one!</p>
    @endforelse

    {{ $printRequests->links() }}
</div>

    <script>
        function togglePostPrintRequestPanel() {
            let panel = document.getElementById('postPrintRequestPanel');
            panel.style.display = (panel.style.display === 'none' || panel.style.display === '') 
                ? 'block' 
                : 'none';
        }
    </script>
</x-app-layout>