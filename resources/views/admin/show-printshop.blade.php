<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Print Shop Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="mb-4">
                    <strong>User Name:</strong> {{ $printshop->user->username }}
                </div>
                <div class="mb-4">
                    <strong>Business Registration Number:</strong> {{ $printshop->businessRegNo }}
                </div>
                <div class="mb-4">
                    <strong>Address:</strong> {{ $printshop->address }}
                </div>
                <div class="mb-4">
                    <strong>Contact Number:</strong> {{ $printshop->contactNo }}
                </div>
                <div class="mb-4">
                    <strong>Service Description:</strong> {{ $printshop->serviceDescription }}
                </div>
                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('admin.approvePrintshop.index') }}" class="inline-block px-4 py-2 bg-gray-500 text-white rounded">
                        {{ __('Back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>