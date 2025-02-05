<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Approve Print Shop') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h1 class="text-2xl font-bold mb-4">Approve Print Shop</h1>
                <table class="min-w-full border">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">User Name</th>
                            <th class="border px-4 py-2">Business Reg No</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($printshops as $printshop)
                            <tr>
                                <td class="border px-4 py-2">{{ $printshop->id }}</td>
                                <td class="border px-4 py-2">{{ $printshop->user->name }}</td>
                                <td class="border px-4 py-2">{{ $printshop->businessRegNo }}</td>
                                <td class="border px-4 py-2">
                                    <div class="flex flex-col space-y-2">
                                        <a href="{{ route('admin.approvePrintshop.show', $printshop->id) }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded text-center">
                                            {{ __('View Details') }}
                                        </a>
                                        <form method="POST" action="{{ route('admin.approvePrintshop.update', $printshop->id) }}" class="inline-block" onsubmit="return confirm('Are you sure you want to approve this print shop?');">
                                            @csrf
                                            <x-button class="bg-green-500">
                                                {{ __('Approve') }}
                                            </x-button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.rejectPrintshop', $printshop->id) }}" class="inline-block" onsubmit="return confirm('Are you sure you want to reject this print shop?');">
                                            @csrf
                                            <x-button class="bg-red-500">
                                                {{ __('Reject') }}
                                            </x-button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>