{{-- <!-- filepath: /c:/laragon/www/Print2Connect/resources/views/post_print_requests/_publish-postprintrequest-panel.blade.php -->
<div class="border border-blue-400 rounded-lg py-4 px-4 mb-6">
    <form action="{{ route('catalogues.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="title" class="block font-bold mb-1">Title of the service</label>
            <textarea 
                name="title"
                id="title" 
                class="w-full border rounded-lg"
                rows="3"
                placeholder="Title of the promotion..."
                required
            ></textarea>
        </div>
        <div class="mb-4">
            <label for="description" class="block font-bold mb-1">Service Description</label>
            <textarea 
                name="description"
                id="description" 
                class="w-full border rounded-lg"
                rows="3"
                placeholder="Describe your promotion service..."
                required
            ></textarea>
        </div>

        <div class="mb-4">
            <label for="deadline" class="block font-bold mb-1">Deadline</label>
            <input 
            type="datetime-local" 
            name="deadline" 
            id="deadline" 
            class="w-full border rounded-lg"
            required
            min="{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i') }}"
            />
        </div>

        <button 
            type="submit"
            class="bg-blue-500 rounded-lg shadow py-2 px-4 text-white hover:bg-blue-900"
        >
            Post Print Request
        </button>
    </form>

    @error('printType')
        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
    @enderror
    @error('description')
        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
    @enderror
    @error('quantity')
        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
    @enderror
    @error('deadline')
        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div> --}}
<div class="border border-blue-400 rounded-lg py-4 px-4 mb-6">
    <form action="{{ route('catalogues.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-2">
            <label for="title" class="block font-bold">Title of the service</label>
            <input type="text" name="title" id="title" class="w-full border rounded p-1" required />
        </div>

        <div class="mb-2">
            <label for="description" class="block font-bold">Service Description</label>
            <textarea name="description" id="description" rows="3" class="w-full border rounded" required></textarea>
        </div>

        <div class="mb-2">
            <label for="start" class="block font-bold">Start date of the promotion</label>
            <input type="date" name="start" id="start" class="w-full border rounded p-1" required min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"/>
        </div>

        <div class="mb-2">
            <label for="end" class="block font-bold">End date of the promotion</label>
            <input type="date" name="end" id="end" class="w-full border rounded p-1" required min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"/>
        </div>

        <div class="mb-2">
            <label for="catalogueImages" class="block font-bold">Catalogue Image</label>
            <input type="file" name="catalogueImages" id="catalogueImages" class="w-full border rounded p-1" />
        </div>

        <footer class="flex justify-between items-center">
            <img 
                src="{{ auth()->user()->avatar }}" 
                class="rounded-full mr-2" 
                alt="avatar" 
                width="50" 
                height="50"
            >
            <div class="flex items-center">
                <button 
                    type="submit"
                    class="bg-blue-500 rounded-lg shadow py-1 px-2 text-white h-10 hover:bg-blue-900"
                >
                    Post Catalogue
                </button>
            </div>
        </footer>
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
