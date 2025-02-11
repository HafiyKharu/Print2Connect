<!-- filepath: /c:/laragon/www/Print2Connect/resources/views/users/show.blade.php -->
<x-app-layout>
  <header class="mb-6 relative">
    <div class="relative">
      <img src="{{$user->banner}}" alt="banner" class="rounded-lg w-100"
        style="height: 200px; object-fit: cover; cursor: pointer;" data-toggle="modal" data-target="#bannerModal" />
      <img src="{{$user->avatar}}" alt="" class="rounded-circle position-absolute"
        style="bottom: -75px; left: 50%; transform: translateX(-50%); width: 150px; height: 150px; object-fit: cover; cursor: pointer;"
        data-toggle="modal" data-target="#avatarModal" />
    </div>

    <div class="d-flex justify-content-between align-items-center mb-8 mt-5">
      <div style="max-width: 270px">
        <h2 class="font-weight-bold h4">{{$user->name}}</h2>
        <p class="text-muted">Joined {{$user->created_at->diffForHumans()}}</p>
      </div>
      <div class="d-flex">
        @if (auth()->user()->is($user))
      <a href="{{route('users.edit', $user)}}" class="btn btn-outline-secondary btn-sm mr-2">Edit Profile</a>
    @endif
        <x-follow-button :user="$user"></x-follow-button>
      </div>
    </div>
    @if(session()->has('message'))
    <div class="alert alert-success w-100 mb-2" onclick="this.style.display='none'">
      {{session()->get('message')}}
      <span class="text-muted small">(click to dismiss)</span>
    </div>
  @elseif(session()->has('error'))
  <div class="alert alert-danger">
    {{session()->get('error')}}
  </div>
@endif
  </header>

  <div class="card mb-4">
    <div class="card-header">
      <h5 class="card-title mb-0">Details</h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-borderless">
          <tbody>
            @if(!empty($printshop))
        <tr>
          <th class="align-middle" scope="row">Business Registration Number</th>
          <td class="align-middle">:</td>
          <td class="align-middle">{{ $printshop->businessRegNo }}</td>
        </tr>
        <tr>
          <th class="align-middle" scope="row">Email</th>
          <td class="align-middle">:</td>
          <td class="align-middle">
          <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
          <a href="mailto:{{ $user->email }}">
            <img src="{{ asset('images/icons8-email-50.png') }}" alt="Email Icon" class="inline-block ml-2"
            style="width: 24px; height: 24px;" />
          </a>
          </td>
        </tr>
        <tr>
          <th class="align-middle" scope="row">Contact Number</th>
          <td class="align-middle">:</td>
          <td class="align-middle">
          <a href="https://api.whatsapp.com/send/?phone=6{{$printshop->contactNo}}&text&type=phone_number&app_absent=0"
            target="_blank">{{ $printshop->contactNo }}</a>
          <a href="https://api.whatsapp.com/send/?phone=6{{$printshop->contactNo}}&text&type=phone_number&app_absent=0"
            target="_blank">
            <img src="{{ asset('images/icons8-whatsapp-48.png') }}" alt="WhatsApp Icon" class="inline-block ml-2"
            style="width: 24px; height: 24px;" />
          </a>
          </td>
        </tr>
        <tr>
          <th class="align-middle" scope="row">Address</th>
          <td class="align-middle">:</td>
          <td class="align-middle">{{ $printshop->address }}</td>
        </tr>
        <tr>
          <th class="align-middle" scope="row">Service Description</th>
          <td class="align-middle">:</td>
          <td class="align-middle">{{ $printshop->serviceDescription }}</td>
        </tr>
      @elseif (!empty($customer))
    <tr>
      <th class="align-middle" scope="row">Email</th>
      <td class="align-middle">:</td>
      <td class="align-middle">
      <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
      <a href="mailto:{{ $user->email }}">
        <img src="{{ asset('images/icons8-email-50.png') }}" alt="Email Icon" class="inline-block ml-2"
        style="width: 24px; height: 24px;" />
      </a>
      </td>
    </tr>
    <tr>
      <th class="align-middle" scope="row">Phone Number</th>
      <td class="align-middle">:</td>
      <td class="align-middle">
      <a href="https://api.whatsapp.com/send/?phone=6{{$customer->phoneNumber}}&text&type=phone_number&app_absent=0"
        target="_blank">{{ $customer->phoneNumber }}</a>
      <a href="https://api.whatsapp.com/send/?phone=6{{$customer->phoneNumber}}&text&type=phone_number&app_absent=0"
        target="_blank">
        <img src="{{ asset('images/icons8-whatsapp-48.png') }}" alt="WhatsApp Icon" class="inline-block ml-2"
        style="width: 24px; height: 24px;" />
      </a>
      </td>
    </tr>
    <tr>
      <th class="align-middle" scope="row">Address</th>
      <td class="align-middle">:</td>
      <td class="align-middle">{{ $customer->address }}</td>
    </tr>
  @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>

  @if(!empty($printRequests))
    @include('users._timelineService', [
    'printRequest' => $printRequests
    ])
  @elseif(!empty($catalogues))
    @include('users._timelineCatalogue', [
    'catalogue' => $catalogues
    ])
  @endif

  <!-- Banner Modal -->
  <div class="modal fade" id="bannerModal" tabindex="-1" aria-labelledby="bannerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bannerModalLabel">Banner Preview</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="{{$user->banner}}" alt="banner" class="img-fluid">
        </div>
      </div>
    </div>
  </div>

  <!-- Avatar Modal -->
  <div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="avatarModalLabel">Avatar Preview</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="{{$user->avatar}}" alt="avatar" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

<!-- Bootstrap 4 JS (placed after content to ensure it loads properly) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>