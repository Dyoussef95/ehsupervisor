<x-guest-layout>
    <!-- Session Status -->
    
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <x-application-logo class="" />
        <!-- Email Address -->
        <div class="form-floating">
        
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@example.com"/>
            <x-input-label for="email" :value="__('Email')" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-floating">

            <x-text-input id="password"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="Password" />
            <x-input-label for="password" :value="__('Password')" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">

        <button type="submit" class="btn btn-primary w-100 py-2">
                {{ __('Log in') }}
        </button>
    
    </form>
</x-guest-layout>
