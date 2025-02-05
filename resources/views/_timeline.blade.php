<div class="border border-gray-300 rounded-lg">
  @forelse ($printRequests as $printRequest)
        <div class="mb-4">
            @include('post_print_requests._printrequest', ['printRequest' => $printRequest])
        </div>
    {{-- @elseif ($item instanceof App\Models\Catalogue)
      @include('catalogues.index', ['catalogue' => $item])
    @endif --}}
  @empty
    <p class="p-4">Nothing yet, post something.</p>
  @endforelse
  {{ $items->links() }}
</div>