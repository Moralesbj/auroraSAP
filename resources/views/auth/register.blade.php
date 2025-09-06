<x-guest-layout>

<form method="POST" action="{{ route('register') }}">
        @csrf
<!-- Campo de rol -->
 <!-- Rol -->
 
         <!-- Name -->
                <div class="mt-4">
                    <label for="name">Name</label>
                    <input id="name" class="block mt-1 w-full border rounded" type="text" name="name" required autofocus />
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <label for="email">Email</label>
                    <input id="email" class="block mt-1 w-full border rounded" type="email" name="email" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password">Password</label>
                    <input id="password" class="block mt-1 w-full border rounded" type="password" name="password" required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" class="block mt-1 w-full border rounded" type="password" name="password_confirmation" required />
                </div>

        <div class="mt-4">
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4" type="submit">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
