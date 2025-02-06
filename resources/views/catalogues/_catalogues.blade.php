<div class="card mb-4">
    <div class="card-body">
        <!-- Your posting content here -->
        <h5 class="card-title"><strong>{{ $catalogue->title }}</strong></h5>
        <div class="flex p-2 border-b border-b-gray-300">
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
            </div>
        </div>
        <div class="mt-2">
            <table class="table-borderless">
                <tbody>
                    <tr>
                        <td><strong>Service Description</strong></td>
                        <td class="p-2">:</td>
                        <td class="p-2">{{ $catalogue->description }}</td>
                    </tr>
                    <tr>
                        <td><strong>Start date of the promotion</strong></td>
                        <td class="p-2">:</td>
                        <td class="p-2">{{ \Carbon\Carbon::parse($catalogue->start)->format('d/m/Y') ?? 'N/A' }}
                        </td>
                    </tr>
                    <tr>
                        <td><strong>End date of the promotion</strong></td>
                        <td class="p-2">:</td>
                        <td class="p-2">{{ \Carbon\Carbon::parse($catalogue->end)->format('d/m/Y') ?? 'N/A' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br />
        <div class="text-center">
            <img src="{{ Storage::url($catalogue->catalogueImages) }}" class="rounded mx-auto d-block" alt="catalogue"
                width="300" height="300" data-toggle="modal" data-target="#imageModal" style="cursor: pointer;">
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ Storage::url($catalogue->catalogueImages) }}" alt="catalogue" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
 
    </div>
</div>