<div class="card mb-4">
    <div class="card-body">
        <!-- Your posting content here -->
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title"><strong>{{ $printRequest->printType }}</strong></h5>
            @if(auth()->check() && auth()->user()->role === 'print shop' && $printRequest->status !== 'accepted')
                <!-- Accept button for web view -->
                <form action="{{ route('post_print_requests.accept', [$printRequest->id, auth()->user()->id]) }}" method="POST" class="d-none d-md-block" onsubmit="return confirm('Are you sure you want to accept this request?');">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-warning" title="Accept Print Request">
                        Accept
                    </button>
                </form>
                <!-- Dropdown menu for mobile view -->
                <div class="dropdown d-md-none">
                    <button class="dropdown-toggle btn btn-warning" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="material-symbols-outlined">more</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <form action="{{ route('post_print_requests.accept', [$printRequest->id, auth()->user()->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to accept this request?');">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="dropdown-item" title="Accept Print Request">
                                Accept
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>

        <div class="flex p-2 border-b border-b-gray-300">
            <div class="mr-2 flex-shrink-0">
                <!-- User avatar -->
                <img src="{{ $printRequest->user->avatar }}" class="rounded-full mr-2" alt="avatar" width="50"
                    height="50">
            </div>

            <div class="w-full">
                <div class="flex justify-between">
                    <h5 class="font-bold">
                        {{ $printRequest->user->name }}
                    </h5>
                    <!-- If you want to allow only the owner to delete/edit -->
                    @if(auth()->check() && auth()->user()->is($printRequest->user))
                        <div class="ml-4">
                            <!-- Add edit or delete buttons if needed -->
                        </div>
                    @endif
                </div>
                <!-- Display the date/time the print request was posted -->
                <div class="text-xs text-gray-600">
                    Posted at: {{ $printRequest->created_at->format('h:i A d/m/Y') }}
                </div>
            </div>
        </div>
        <div class="mt-2">
            <table class="table-borderless">
                <tbody>
                    <tr>
                        <td><strong>Description of the Service</strong></td>
                        <td class="p-2">:</td>
                        <td class="p-2">{{ $printRequest->description }}</td>
                    </tr>
                    <tr>
                        <td><strong>Quantity</strong></td>
                        <td class="p-2">:</td>
                        <td class="p-2">{{ $printRequest->quantity }}</td>
                    </tr>
                    <tr>
                        <td><strong>Deadline</strong></td>
                        <td class="p-2">:</td>
                        <td class="p-2">
                            {{ \Carbon\Carbon::parse($printRequest->deadline)->format('h:i A d/m/Y') ?? 'N/A' }}
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Status of request</strong></td>
                        <td class="p-2">:</td>
                        <td class="p-2">{{ $printRequest->status}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br />
        <!-- Display existing comments -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title"><strong>Comment Section</strong></h5>
                @foreach($printRequest->comments as $comment)
                    <div class="flex p-2 border-b border-b-gray-300">
                        <div class="mr-2 flex-shrink-0">
                            <!-- User avatar -->
                            <img src="{{ $comment->user->avatar }}" class="rounded-full mr-2" alt="avatar" width="50"
                                height="50">
                        </div>
                        <div class="w-full">
                            <div class="flex justify-between">
                                <h5 class="font-bold">
                                    {{ $comment->user->name }}
                                </h5>
                                <!-- If you want to allow only the owner to delete/edit -->
                                @if(auth()->check() && auth()->user()->is($printRequest->user))
                                    <div class="ml-4">
                                        <!-- Add edit or delete buttons if needed -->
                                    </div>
                                @endif
                            </div>
                            <!-- Display the date/time the print request was posted -->
                            <div class="text-xs text-gray-600">
                                Posted at: {{ $comment->created_at->format('h:i A d/m/Y') }}
                            </div>
                            <div class="mt-2">
                                <p>{{ $comment->description}}</p>
                            </div>
                            <br />
                        </div>
                    </div>
                @endforeach
                <!-- Form for adding a comment -->
                <div class="card-text mb-2 border border-gray-200 p-2 rounded ">
                    <form action="{{ route('comments.store', $printRequest) }}" method="POST"
                        class="mr-2 flex-shrink-0">
                        @csrf
                        <div>
                            <textarea name="description" rows="2" class="w-full border rounded"
                                placeholder="Add a comment..." required></textarea>
                        </div>
                        <button type="submit"
                            class="bg-blue-500 text-white px-3 py-1 rounded mt-1 hover:bg-blue-800 right-2    ">
                            Comment
                        </button>
                    </form>
                    @error('description')
                        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>