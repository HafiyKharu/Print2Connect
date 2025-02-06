<div class="border border-gray-300 rounded-lg">
  @forelse ($catalogues as $catalogue)
    @include('catalogues._catalogues')
  @empty
    <p class="p-4">Nothing yet, post something.</p>
  @endforelse
  {{ $catalogues->links()}}
</div>