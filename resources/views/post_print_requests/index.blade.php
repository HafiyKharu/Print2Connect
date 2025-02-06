<!-- filepath: /c:/laragon/www/Print2Connect/resources/views/post_print_requests/index.blade.php -->
<x-app-layout>
    <form id="search" method="GET" action="{{ route('post_print_requests.index') }}" class="mb-4 mt-4">
        <input type="text" name="search" placeholder="Search by print type or description..."
            class="border rounded p-2 w-full" value="{{ request('search') }}">
    </form>
    <!-- Search form -->
    <div class="flex justify-between mb-4">
        <div>
            <button type="submit" class="btn btn-primary" form="search">
                Search
            </button>
        </div>
        <!-- Only show "Post Print Request" form if user is a customer -->
        <div >
            @if(auth()->check() && auth()->user()->role === 'customer')
                <!-- Vertically centered scrollable modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postPrintRequestModal">
                    Post Print Service Request
                </button>
                <!-- Modal -->
                <div class="modal fade" id="postPrintRequestModal" tabindex="-1"
                    aria-labelledby="postPrintRequestModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="postPrintRequestModalLabel">Post Print Request</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @include('post_print_requests._publish-postprintrequest-panel')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" form="postPrintRequestForm" class="btn btn-primary">Post Print
                                    Request</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
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
</x-app-layout>