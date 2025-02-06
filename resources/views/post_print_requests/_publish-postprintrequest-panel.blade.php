<div class="border border-blue-400 rounded-lg py-4 px-4 mb-6">
    <form id="postPrintRequestForm" action="{{ route('post_print_requests.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="printType" class="block font-bold mb-1">Print Type</label>
            <input 
                type="text" 
                name="printType" 
                id="printType" 
                class="w-full border rounded-lg"
                required
            />
        </div>
        <div class="mb-4">
            <label for="description" class="block font-bold mb-1">Description</label>
            <textarea 
                name="description"
                id="description" 
                class="w-full border rounded-lg"
                rows="3"
                placeholder="Describe your print request..."
                required
            ></textarea>
        </div>
        <div class="mb-4">
            <label for="quantity" class="block font-bold mb-1">Quantity</label>
            <input 
                type="number" 
                name="quantity" 
                id="quantity" 
                class="w-full border rounded-lg"
                required
                min="1"
            />
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
</div>