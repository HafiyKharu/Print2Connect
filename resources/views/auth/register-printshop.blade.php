<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ asset('images/PRINT2CONNECT.png') }}" class="img-fluid" alt="Logo PRINT2CONNECT" style="width: 25rem; height: auto;" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register.printshop') }}">
            @csrf

            <!-- Username -->
            <div>
                <x-label for="username" :value="__('Username')" />
                <x-input id="username" class="block mt-1 w-full" type="text" name="username" required autofocus />
            </div>

            <!-- Name -->
            <div class="mt-4">
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" required />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required />
            </div>

            <!-- Business Registration Number -->
            <div class="mt-4">
                <x-label for="businessRegNo" :value="__('Business Reg No')" />
                <x-input id="businessRegNo" class="block mt-1 w-full" type="text" name="businessRegNo" required />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-label for="address" :value="__('Address')" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" required />
            </div>

            <!-- Contact Number -->
            <div class="mt-4">
                <x-label for="contactNo" :value="__('Contact No')" />
                <x-input id="contactNo" class="block mt-1 w-full" type="text" name="contactNo" required />
            </div>

            <!-- Service Description -->
            <div class="mt-4">
                <x-label for="serviceDescription" :value="__('Service Description')" />
                <x-input id="serviceDescription" class="block mt-1 w-full" type="text" name="serviceDescription" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>