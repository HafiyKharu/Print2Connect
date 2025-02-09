<!-- filepath: /c:/laragon/www/Print2Connect/resources/views/users/show.blade.php -->
<x-app-layout>
  <header class="mb-6 relative">
    <div class="relative">
      <img src="{{$user->banner}}" alt="banner" class="rounded-lg" />
      <img src="{{$user->avatar}}" alt=""
        class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
        style="left: 50%; border-radius: 50%;" height="150" width="150" />
    </div>

    <div class="flex justify-between items-center mb-8">
      <div style="max-width: 270px">
        <h2 class="font-bold text-2xl">{{$user->name}}</h2>
        <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
      </div>
      <div class="flex">
        @if (auth()->user()->is($user))
      <a href="{{route('users.edit', $user)}}"
        class="rounded-full shadow p-2 border-gray-300 text-black text-xs mr-2">Edit Profile</a>
    @endif
        <x-follow-button :user="$user"></x-follow-button>
      </div>
    </div>
    @if(session()->has('message'))
    <div class="border-gray-500 bg-green-400 p-2 w-full mb-2 rounded-lg" onclick="this.style.display='none'">
      {{session()->get('message')}}
      <span class="text-sm text-gray-500">(click to dismiss)</span>
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
          <td class="align-middle">{{ $user->email }}</td>
        </tr>
        <tr>
          <th class="align-middle" scope="row">Contact Number</th>
          <td class="align-middle">:</td>
          <td class="align-middle">{{ $printshop->contactNo }}</td>
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
      <td class="align-middle">{{ $user->email }}</td>
    </tr>
    <tr>
      <th class="align-middle" scope="row">Phone Number</th>
      <td class="align-middle">:</td>
      <td class="align-middle">{{ $customer->phoneNumber }}</td>
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
</x-app-layout>