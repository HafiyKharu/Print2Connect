<div class="border border-gray-300 rounded-lg">
  @forelse ($printRequests as $printRequest)
      @include('post_print_requests._printrequest')
  @empty
      <p class="p-4">Nothing yet, post something.</p>
  @endforelse
  {{ $printRequests->links() }}
</div>