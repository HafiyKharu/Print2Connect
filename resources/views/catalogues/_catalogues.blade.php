<!-- filepath: /c:/laragon/www/Print2Connect/resources/views/post_print_requests/_printrequest.blade.php -->
<div class="flex p-4 border-b border-b-gray-400 ">
    <div class="mr-2 flex-shrink-0">
        <!-- User avatar -->
        <img src="{{ $catalogue->user->avatar }}" class="rounded-full mr-2" alt="avatar" width="50" height="50">
    </div>
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
        <!-- Display the date/time the print request was posted -->
        <div class="text-xs text-gray-600">
            Posted at: {{ $catalogue->created_at->format('h:i A d/m/Y') }}
        </div>
        <br />
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td><strong>Title of the Service</strong></td>
                    <td class="p-2">:</td>
                    <td class="p-2">{{ $catalogue->title }}</td>
                </tr>
                <tr>
                    <td><strong>Service Description</strong></td>
                    <td class="p-2">:</td>
                    <td class="p-2">{{ $catalogue->description }}</td>
                </tr>
                <tr>
                    <td><strong>Start date of the promotion</strong></td>
                    <td class="p-2">:</td>
                    <td class="p-2">{{ \Carbon\Carbon::parse($catalogue->start)->format('h:i A d/m/Y') ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><strong>End date of the promotion:</strong></td>
                    <td class="p-2">:</td>
                    <td class="p-2">{{ \Carbon\Carbon::parse($catalogue->end)->format('h:i A d/m/Y') ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>
        <br />
        <div class="text-center">
            <img src="{{ Storage::url($catalogue->catalogueImages)}}" class="rounded mx-auto d-block" alt="catalogue"
                width="300" height="300">
            {{-- <button onclick="toggleFullscreen(this)"
                class="bg-blue-500 text-white px-2 py-1 rounded mt-2 hover:bg-blue-600 center">
                Fullscreen
            </button> --}}
        </div>
        {{--
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
        </script> --}}
        </p>
    </div>
</div>