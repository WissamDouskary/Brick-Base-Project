@extends('layouts.app')

@section('title', 'Log in')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-white p-4">
    <div class="w-full max-w-md">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Log in</h1>
        
        <form method="POST" action="" class="space-y-6">
            @csrf
            
            <!-- Email/Username field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email address or user name
                </label>
                <input
                    type="text"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-amber-400 @error('email') border-red-500 @enderror"
                    required
                    autofocus
                >
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <span>Hide</span>
                    </button>
                </div>
                <div class="relative">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-amber-400 @error('password') border-red-500 @enderror"
                        required
                    >
                </div>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember me checkbox -->
            <div class="flex items-center">
                <input
                    type="checkbox"
                    id="remember"
                    name="remember"
                    class="h-4 w-4 text-amber-400 focus:ring-amber-400 border-gray-300 rounded"
                    {{ old('remember') ? 'checked' : '' }}
                >
                <label for="remember" class="ml-2 block text-sm text-gray-700">
                    Remember me
                </label>
            </div>

            <!-- Terms agreement -->
            <div class="text-sm text-gray-600">
                By continuing, you agree to the <a href="" class="text-black font-medium">Terms of use</a> and <a href="" class="text-black font-medium">Privacy Policy</a>.
            </div>

            <!-- Login button -->
            <button
                type="submit"
                class="w-full bg-black text-white py-3 px-4 rounded-full hover:bg-gray-800 transition-colors"
            >
                Log in
            </button>
        </form>

        <!-- Forgot password link -->
        <div class="text-center mt-4">
            <a href="" class="text-sm text-gray-600 hover:text-gray-900">
                Forgot your password
            </a>
        </div>

        <!-- Sign up link -->
        <div class="text-center mt-4">
            <p class="text-sm text-gray-600">
                Don't have an account? <a href="{{ route('SignUp') }}" class="text-black font-medium">Sign up</a>
            </p>
        </div>

        <!-- Social login divider -->
        <div class="flex items-center my-8">
            <div class="flex-grow border-t border-gray-300"></div>
            <div class="flex-grow border-t border-gray-300"></div>
        </div>

        <!-- Social login buttons -->
        <div class="flex justify-center space-x-6">
            <a href="" class="text-blue-500 hover:text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                </svg>
            </a>
            <a href="" class="text-gray-800 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M22 17.607c-.786 2.28-3.139 6.317-5.563 6.361-1.608.031-2.125-.953-3.963-.953-1.837 0-2.412.923-3.932.983-2.572.099-6.542-5.827-6.542-10.995 0-4.747 3.308-7.1 6.198-7.143 1.55-.028 3.014 1.045 3.959 1.045.949 0 2.727-1.29 4.596-1.101.782.033 2.979.315 4.389 2.377-3.741 2.442-3.158 7.549.858 9.426zm-5.222-17.607c-2.826.114-5.132 3.079-4.81 5.531 2.612.203 5.118-2.725 4.81-5.531z"/>
                </svg>
            </a>
            <a href="" class="text-red-500 hover:text-red-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M7 11v2.4h3.97c-.16 1.029-1.2 3.02-3.97 3.02-2.39 0-4.34-1.979-4.34-4.42 0-2.44 1.95-4.42 4.34-4.42 1.36 0 2.27.58 2.79 1.08l1.9-1.83c-1.22-1.14-2.8-1.83-4.69-1.83-3.87 0-7 3.13-7 7s3.13 7 7 7c4.04 0 6.721-2.84 6.721-6.84 0-.46-.051-.81-.111-1.16h-6.61zm0 0 17 2h-3v3h-2v-3h-3v-2h3v-3h2v3h3v2z" fill-rule="evenodd" clip-rule="evenodd"/>
                </svg>
            </a>
            <a href="" class="text-blue-400 hover:text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                </svg>
            </a>
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