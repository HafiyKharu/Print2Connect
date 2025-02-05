<!-- filepath: /c:/laragon/www/Print2Connect/resources/views/post_print_requests/_printrequest.blade.php -->
<div class="flex p-4 border-b border-b-gray-300">
    <div class="mr-2 flex-shrink-0">
        <!-- User avatar -->
        <img 
            src="{{ $catalogue->user->avatar }}" 
            class="rounded-full mr-2" 
            alt="avatar"
            width="50"
            height="50"
        >
    </div>
    {{-- <div class="mb-4">
        <h3 class="font-bold">{{ $catalogue->title }}</h3>
        <p>{{ $catalogue->description }}</p>
        <p>Deadline: {{ \Carbon\Carbon::parse($catalogue->deadline)->format('h:i A d/m/Y') }}</p>
        @if($catalogue->catalogueImages != 'http://localhost:8000/')
            <img src="{{ Storage::url($catalogue->catalogueImages )}}" class="w-full h-auto">
        @endif
        <p>Posted by: {{ $catalogue->user->name }}</p>
    </div> --}}
    <div class="w-full">
        <div class="flex justify-between">
            <h5 class="font-bold">
                {{ $catalogue->user->name }}
            </h5>
            <!-- If you want to allow only the owner to delete/edit -->
            @if(auth()->check() && auth()->user()->is($catalogue->user))
                <div class="ml-4">
                    <!-- Add edit or delete buttons if needed -->
                </div>
            @endif
        </div>
        <!-- If user is print shop and request not accepted, show Accept button -->
        {{-- <div class="relative">
            @if(auth()->check() && auth()->user()->role === 'print shop' && $printRequest->status !== 'accepted')
            <form 
                action="{{ route('post_print_requests.accept', $printRequest) }}" 
                method="POST"
                class="absolute top-2 right-2" 
                onsubmit="return confirm('Are you sure you want to accept this request?');"
            >
                @csrf
                @method('PATCH')
                <button 
                    type="submit"
                    class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600"
                    title="Accept Print Request"
                >
                    <!-- Hamburger icon (Font Awesome example) -->
                    <i class="fas fa-bars"></i>
                </button>
            </form>
            @endif
        </div> --}}
        <!-- Display the date/time the print request was posted -->
        <div class="text-xs text-gray-600">
            Posted at: {{ $catalogue->created_at->format('h:i A d/m/Y') }}
        </div>
        <p class="text-sm mt-2">
            <strong>Title of the Service: </strong> {{ $catalogue->title }}<br>
            <strong>Service Description: </strong> {{ $catalogue->description }}<br>
            <strong>Start date of the promotion:</strong> {{ \Carbon\Carbon::parse($catalogue->start) ->format('h:i A d/m/Y') ?? 'N/A' }}<br>
            <strong>End date of the promotion:</strong> {{ \Carbon\Carbon::parse($catalogue->end) ->format('h:i A d/m/Y') ?? 'N/A' }}<br>
            @if($catalogue->catalogueImages != 'http://localhost:8000/')
            <img src="{{ Storage::url($catalogue->catalogueImages )}}" class="w-full h-auto">
        <button 
            onclick="toggleFullscreen(this)" 
            class="bg-blue-500 text-white px-2 py-1 rounded mt-2 hover:bg-blue-600"
        >
            Fullscreen
        </button>

        <script>
            function toggleFullscreen(button) {
                const container = button.closest('.flex');
                if (!document.fullscreenElement) {
                    container.requestFullscreen().catch(err => {
                        alert(`Error attempting to enable full-screen mode: ${err.message} (${err.name})`);
                    });
                } else {
                    document.exitFullscreen();
                }
            }
        </script>
        @endif
        </p>
        
        <!-- Display existing comments -->
        {{-- <div class="mt-4 ml-4">
            @foreach($printRequest->comments as $comment)
                <div class="mb-2 border border-gray-200 p-2 rounded">
                    <div class="text-xs text-gray-600">
                        {{ $comment->user->name }} - {{ $comment->created_at->format('Y-m-d H:i') }}
                    </div>
                    <div>
                        {{ $comment->description }}
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Form for adding a comment -->
        <form action="{{ route('comments.store', $printRequest) }}" method="POST" class="mt-2 ml-4">
            @csrf
            <div>
                <textarea 
                    name="description" 
                    rows="2" 
                    class="w-full border rounded" 
                    placeholder="Add a comment..." 
                    required
                ></textarea>
            </div>
            <button 
                type="submit" 
                class="bg-blue-500 text-white px-3 py-1 rounded mt-1 hover:bg-blue-800"
            >
                Comment
            </button>
        </form>
        @error('description')
            <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
        @enderror --}}
    </div>
</div>