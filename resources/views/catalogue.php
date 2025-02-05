<x-app-layout>
  <!-- <div>
    @foreach ($users as $user)
      <a href="{{route('users.show', $user)}}" class="flex items-center mb-5">
        <img src="{{$user->avatar}}" 
        alt="{{$user->username}}'s avatar"
        width="60"
        height="60"
        class="mr-4 rounded"
        >
        <div>
          <h4 class="font-bold">{{'@'.$user->username}}</h4>
        </div>
      </a>
    @endforeach

    {{$users->links()}}
  </div> -->
  @include('_publish-tweet-panel')
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
    @include('_timeline', [
        'tweets' => $tweets
    ])
</x-app-layout>