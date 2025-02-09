<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold h4 mb-0">
            {{ __('Approve Print Shop') }}
        </h2>
    </x-slot>

    <div class="container my-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="text-center font-bold mb-4">Approve Print Shop</h1>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Business Reg No</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($printshops as $printshop)
                                <tr>
                                    <td>{{ $printshop->id }}</td>
                                    <td>{{ $printshop->user->name }}</td>
                                    <td>{{ $printshop->businessRegNo }}</td>
                                    <td>
                                        <!-- View Details Button triggers the modal -->
                                        <button class="btn btn-primary mb-2 w-100" data-toggle="modal"
                                            data-target="#viewDetailsModal-{{ $printshop->id }}">
                                            View Details
                                        </button>

                                        <!-- Approve Form -->
                                        <form method="POST"
                                            action="{{ route('admin.approvePrintshop.update', $printshop->id) }}"
                                            onsubmit="return confirm('Are you sure you want to approve this print shop?');"
                                            class="d-inline-block mb-2 w-100">
                                            @csrf
                                            <button type="submit" class="btn btn-success w-100">
                                                Approve
                                            </button>
                                        </form>

                                        <!-- Reject Form -->
                                        <form method="POST" action="{{ route('admin.rejectPrintshop', $printshop->id) }}"
                                            onsubmit="return confirm('Are you sure you want to reject this print shop?');"
                                            class="d-inline-block w-100">
                                            @csrf
                                            <button type="submit" class="btn btn-danger w-100">
                                                Reject
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal for View Details -->
                                <div class="modal fade" id="viewDetailsModal-{{ $printshop->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="viewDetailsModalLabel-{{ $printshop->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewDetailsModalLabel-{{ $printshop->id }}">
                                                    Print Shop Details
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-left">
                                                <p><strong>User Name:</strong> {{ $printshop->user->username }}</p>
                                                <br/>
                                                <p><strong>Business Registration Number:</strong>
                                                    {{ $printshop->businessRegNo }}</p>
                                                <br/>
                                                <p><strong>Address:</strong> {{ $printshop->address }}</p>
                                                <br/>
                                                <p><strong>Contact Number:</strong> {{ $printshop->contactNo }}</p>
                                                <br/>
                                                <p><strong>Service Description:</strong>
                                                    {{ $printshop->serviceDescription }}</p>
                                                <br/>
                                                <p><strong>Created account at:</strong> {{ $printshop->created_at ? $printshop->created_at->format('h:i A d/m/Y') : 'N/A' }} </p>
                                                <br/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Modal -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>