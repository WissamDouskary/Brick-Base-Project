@extends('layouts.app')

@section('title', 'Wait For Admin Approval')

@section('content')
    <div class="min-h-screen bg-gray-100 flex flex-col items-center justify-center p-4">
        <div class="max-w-md w-full bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Status Icon -->
            <div class="bg-yellow-50 flex justify-center py-8">
                <div class="bg-yellow-100 rounded-full p-4">
                    <svg class="w-16 h-16 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <!-- Message Content -->
            <div class="px-6 py-6 text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Account Pending Activation</h2>
                <div class="w-16 h-1 bg-yellow-500 mx-auto mb-4"></div>
                <p class="text-gray-600 mb-6">
                    Your account is currently <span class="font-semibold text-yellow-600">inactive</span> or <span class="font-semibold text-red-600">Banned</span>. An administrator
                    needs to review and approve your registration before you can access your account.
                </p>
                @if (Auth::user()->category == null)
                    <p class="text-gray-600 mb-6">
                        Please Complete Your <a href="{{ route('CompleteRegistration') }}"
                            class="font-semibold text-red-600">registration</a>. Before review send to admin.
                    </p>
                @endif
                <div class="bg-gray-50 p-4 rounded-lg mb-6">
                    <p class="text-sm text-gray-500">We'll notify you by email once your account has been activated. This
                        process usually takes 24-48 hours.</p>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="{{ route('Home') }}"><button type="submit"
                            class="cursor-pointer px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors duration-300">
                            Return Home
                        </button></a>
                    <a href="mailto:douskary.wissam@gmail.com"
                        class="px-6 py-3 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg font-medium transition-colors duration-300">
                        Contact Support
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                <p class="text-sm text-gray-500 text-center">
                    If you believe this is an error or have questions, please contact our support team.
                </p>
            </div>
        </div>
    </div>
@endsection
