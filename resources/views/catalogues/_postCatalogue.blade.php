<div class="border border-blue-400 rounded-lg py-4 px-4 mb-6">
    <form id='postCatalogueForm' action="{{ route('catalogues.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="title" class="block font-bold">Type of Service</label>
            <input type="text" name="title" id="title" class="w-full border rounded p-1" required
                placeholder="example digital printing, flexography, 3D printing...." />
        </div>
        <div class="mb-4">
            <label for="description" class="block font-bold">Detail Service Description</label>
            <textarea name="description" id="description" rows="3" class="w-full border rounded" required
                placeholder="example jualan murah beli 5 unit percuma 1 unit"></textarea>
        </div>
        <div class="d-flex justify-content-between mb-4">
            <div class="flex-grow-1 mr-2">
                <label for="start" class="d-block text-center font-weight-bold">Start date of the
                    promotion/service</label>
                <input type="date" name="start" id="start" class="form-control" required
                    min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" />
            </div>
            <div class="flex-grow-1 ml-2">
                <label for="end" class="d-block text-center font-weight-bold">End date of the promotion/service</label>
                <input type="date" name="end" id="end" class="form-control" required
                    min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" />
            </div>
        </div>
        <div class="mb-4">
            <label for="catalogueImages" class="block font-bold">Catalogue Image</label>
            <input type="file" name="catalogueImages" id="catalogueImages" class="w-full border rounded p-1"
                accept="image/*" onchange="previewImage(event)" />
        </div>
        <div class="mb-4">
            <img id="imagePreview" src="#" alt="Image Preview" class="d-none img-fluid border rounded" />
        </div>

        <script>
            function previewImage(event) {
                var input = event.target;
                var reader = new FileReader();
                reader.onload = function () {
                    var dataURL = reader.result;
                    var imagePreview = document.getElementById('imagePreview');
                    imagePreview.src = dataURL;
                    imagePreview.classList.remove('d-none');
                };
                reader.readAsDataURL(input.files[0]);
            }
        </script>
    </form>
    @error('title')
        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
    @enderror
    @error('description')
        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
    @enderror
    @error('catalogueImages')
        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
    @enderror
    @error('start')
        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
    @enderror
    @error('end')
        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>