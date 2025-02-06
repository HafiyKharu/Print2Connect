<!-- filepath: /c:/laragon/www/Print2Connect/resources/views/explore.blade.php -->
<x-app-layout>
  <div class="container mt-4">
    <h1 class="mt-6 mb-4">Explore Users</h1>

    <!-- Search Form -->
    <form action="{{ route('explore.index') }}" method="GET" class="mt-4 mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by username" value="{{ request('search') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <div class="row">
        <!-- Customers Column -->
        <div class="col-md-6 ">
            <h2 class="mt-4 mb-4">Customers</h2>
            @if($customers->isEmpty())
                <p class="text-info">No customers found.</p>
            @else
                <ul class="list-group">
                    @foreach($customers as $customer)
                        <li class="list-group-item d-flex align-items-center mb-2 mt-2">
                            <img src="{{ $customer->avatar }}" 
                                 alt="{{ $customer->username }}'s avatar"
                                 width="60"
                                 height="60"
                                 class="rounded mr-3">
                            <a href="{{ route('users.show', $customer) }}">{{ $customer->username }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Print Shops Column -->
        <div class="col-md-6">
            <h2 class="mt-4 mb-4">Print Shops</h2>
            @if($printShops->isEmpty())
                <p class="text-info">No print shops found.</p>
            @else
                <ul class="list-group mb-2 mt-2">
                    @foreach($printShops as $printShop)
                        <li class="list-group-item d-flex align-items-center mb-2 mt-2">
                            <img src="{{ $printShop->avatar }}" 
                                 alt="{{ $printShop->username }}'s avatar"
                                 width="60"
                                 height="60"
                                 class="rounded mr-3">
                            <a href="{{ route('users.show', $printShop) }}">{{ $printShop->username }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
  </div>
</x-app-layout>