@extends('layouts.app')

@section('title', 'Log in')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-white p-4">
        <div class="w-full max-w-md">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Log in</h1>

            <form method="POST" action="{{ route('sign_in') }}" class="space-y-6">
                @csrf

                <!-- Email field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email address or user name
                    </label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}"
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-amber-400 @error('email') border-red-500 @enderror"
                        required autofocus>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password field -->
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <button type="button" id="toggle-password" class="text-sm text-gray-500 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span>Hide</span>
                        </button>
                    </div>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-amber-400 @error('password') border-red-500 @enderror"
                            required>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                @if (session('error'))
                    <p class="text-red-500 text-xs mt-1">{{ session('error') }}</p>
                @endif

                <!-- Remember me checkbox -->
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember"
                        class="h-4 w-4 text-amber-400 focus:ring-amber-400 border-gray-300 rounded"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Remember me
                    </label>
                </div>

                <!-- Terms agreement -->
                <div class="text-sm text-gray-600">
                    By continuing, you agree to the <a href="" class="text-black font-medium">Terms of use</a> and <a
                        href="" class="text-black font-medium">Privacy Policy</a>.
                </div>

                <!-- Login button -->
                <button type="submit"
                    class="w-full bg-black text-white py-3 px-4 rounded-full hover:bg-gray-800 transition-colors cursor-pointer">
                    Log in
                </button>
            </form>

            <!-- Sign up link -->
            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">
                    Don't have an account? <a href="{{ route('SignUp') }}" class="text-black font-medium">Sign up</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('toggle-password').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const toggleText = this.querySelector('span');
            const toggleIcon = this.querySelector('svg');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleText.textContent = 'Show';
                toggleIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            `;
            } else {
                passwordInput.type = 'password';
                toggleText.textContent = 'Hide';
                toggleIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
            }
        });
    </script>
@endsection
