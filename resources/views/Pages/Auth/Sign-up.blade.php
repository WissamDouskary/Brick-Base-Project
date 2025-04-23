@extends('layouts.app')

@section('title', 'Brick Base - Sign Up')

@section('content')
<div class="flex min-h-screen flex-col md:flex-row">
    <!-- Left side - Orange background with text -->
    <div class="bg-amber-400 p-8 md:w-1/2 flex flex-col justify-between">
        <div class="mt-12 md:mt-24 md:ml-8">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Join us</h1>
            <p class="text-xl md:text-2xl text-white max-w-md">
                Access to thousands of Jobs opportunities or Explore Your Favorite World
            </p>
        </div>
        <div class="md:ml-8 mb-12">
            <img src="{{ asset('storage/photos/LOGO.png') }}" alt="LOGO" class="h-44 w-auto mr-9">
        </div>
    </div>

    <!-- Right side - Sign up form -->
    <div class="bg-white p-8 md:w-1/2 flex items-center justify-center">
        <div class="w-full max-w-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Sign up now</h2>
            
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                
                <!-- Name fields -->
                <div class="flex flex-col md:flex-row gap-4 mb-4">
                    <div class="flex-1">
                        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">
                            First name
                        </label>
                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            value="{{ old('first_name') }}"
                            class="w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400 @error('first_name') border-red-500 @enderror"
                            required
                        >
                        @error('first_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Last name
                        </label>
                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            value="{{ old('last_name') }}"
                            class="w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400 @error('last_name') border-red-500 @enderror"
                            required
                        >
                        @error('last_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Email field -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email address
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400 @error('email') border-red-500 @enderror"
                        required
                    >
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role selection -->
                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-1">
                        Choose your role!
                    </label>
                    <div class="relative">
                        <select
                            id="role"
                            name="role"
                            class="w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400 appearance-none bg-white pr-8 @error('role') border-red-500 @enderror"
                            required
                        >
                            <option value="" disabled {{ old('role') ? '' : 'selected' }}>Select Your Role</option>
                            <option value="1" {{ old('role') == 'Worker' ? 'selected' : '' }}>Worker</option>
                            <option value="3" {{ old('role') == 'Client' ? 'selected' : '' }}>Client</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    @error('role')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Profile photo -->
                <div class="mb-4">
                    <label for="profile_photo" class="block border-gray-300 text-sm font-medium text-gray-700 mb-1">
                        Profile Photo
                    </label>
                    <div class="relative">
                        <label for="profile_photo" class="w-full p-2 border border-gray-300 rounded flex items-center justify-start gap-6 hover:bg-gray-50 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4 4m4-4v12" />
                            </svg>
                            <span id="file-name">Select Your Profile Photo</span>
                        </label>
                        <input
                            type="file"
                            id="profile_photo"
                            name="profile_photo"
                            class="hidden"
                            accept="image/*"
                        >
                    </div>
                    @error('profile_photo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="city" class="block text-sm font-medium text-gray-700 mb-1">
                        Show me your city!
                    </label>
                    <div class="relative">
                        <select
                            id="city"
                            name="city"
                            class="w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400 appearance-none bg-white pr-8 @error('city') border-red-500 @enderror"
                            required
                        >
                            <option value="" disabled {{ old('city') ? '' : 'selected' }}>Select Your City</option>
                            <option value="Casablanca" {{ old('city') == 'Casablanca' ? 'selected' : '' }}>Casablanca</option>
                            <option value="Safi" {{ old('city') == 'Safi' ? 'selected' : '' }}>Safi</option>
                            <option value="Agadir" {{ old('city') == 'Agadir' ? 'selected' : '' }}>Agadir</option>
                            <option value="Oujda" {{ old('city') == 'Oujda' ? 'selected' : '' }}>Oujda</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    @error('city')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password field -->
                <div class="mb-1">
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
                            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-amber-400 @error('password') border-red-500 @enderror"
                            required
                        >
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <p class="text-xs text-gray-500 mb-4">
                    Use 8 or more characters with a mix of letters, numbers & symbols
                </p>

                <!-- Terms checkbox -->
                <div class="flex items-start gap-2 mb-4">
                    <input
                        type="checkbox"
                        id="terms"
                        name="terms"
                        class="mt-1 @error('terms') border-red-500 @enderror"
                        required
                    >
                    <label for="terms" class="text-sm text-gray-700">
                        By creating an account, I agree to your <a  class="text-black font-medium">Terms of use</a> and <a class="text-black font-medium">Privacy Policy</a>
                    </label>
                </div>
                @error('terms')
                    <p class="text-red-500 text-xs mt-1 mb-4">{{ $message }}</p>
                @enderror

                <!-- Marketing checkbox -->
                <div class="flex items-start gap-2 mb-6">
                    <input
                        type="checkbox"
                        id="marketing"
                        name="marketing"
                        class="mt-1"
                    >
                    <label for="marketing" class="text-sm text-gray-700">
                        By creating an account, I am also consenting to receive SMS messages and emails, including product new feature updates, events, and marketing promotions.
                    </label>
                </div>

                <!-- Sign up button -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-2">
                    <button
                        type="submit"
                        class="bg-black text-white px-8 py-2 rounded-full hover:bg-gray-800 transition-colors w-full sm:w-auto"
                    >
                        Sign up
                    </button>
                    <div class="text-sm">
                        Already have an account? <a href="{{ route('login') }}" class="text-black font-medium">Log in</a>
                    </div>
                </div>
            </form>
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

    // Display selected file name
    document.getElementById('profile_photo').addEventListener('change', function() {
        const fileName = this.files[0]?.name || 'Select Your Profile Photo';
        document.getElementById('file-name').textContent = fileName;
    });
</script>
@endsection