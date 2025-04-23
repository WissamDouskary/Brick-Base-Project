@extends('Pages.dashboard.layouts.app')

@section('content')
    <div class="space-y-6 p-8">
        <h1 class="text-2xl font-bold">Reports</h1>


        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Active Users -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Active Users</h3>
                <div class="flex items-baseline">
                    <span class="text-3xl font-bold">{{ $countUsers }}</span>
                    <input type="hidden" id="countUsers" value="{{ $countUsers }}">
                </div>
            </div>

            <!-- Banned Users -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Banned Users</h3>
                <div class="flex items-baseline">
                    <span class="text-3xl font-bold">{{ $countinactiveUsers }}</span>
                    <input type="hidden" id="countinactiveUsers" value="{{ $countinactiveUsers }}">
                </div>
            </div>

            <!-- Reviews -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Reviews and Comments</h3>
                <div class="flex items-baseline">
                    <span class="text-3xl font-bold">{{ $countReviews }}</span>
                </div>
            </div>

            <!-- Active Products -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Active Products</h3>
                <div class="flex items-baseline">
                    <span class="text-3xl font-bold">{{ $countproducts }}</span>
                </div>
            </div>

            <!-- Available Workers -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Available Workers</h3>
                <div class="flex items-baseline">
                    <span class="text-3xl font-bold">{{ $countWorkers }}</span>
                    <input type="hidden" id="countWorkers" value="{{ $countWorkers }}">
                </div>
            </div>
        </div>

        <!-- Chart and Latest Users -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Chart -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="flex justify-center">
                    <div class="w-88 h-72">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Latest Users -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="text-sm font-medium text-gray-900 mb-4">Latest Users</h3>
                <div class="space-y-4">
                    @foreach ($latestUsers as $user)
                        <div class="flex gap-4 justify-start items-center">
                            <img class="w-8 h-8 rounded-full border-gray-300 ring-slate-500" src="{{ asset('storage/' . $user->profile_photo . '') }}"
                                alt="photo for {{ $user->first_name . ' ' . $user->last_name }}">
                            <div>
                                <h4 class="font-medium">{{ $user->first_name . ' ' . $user->last_name }}</h4>
                                <p class="text-sm text-gray-500">{{ $user->role == '1' ? 'Worker' : 'User' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('pieChart').getContext('2d');
            let countUsers = document.getElementById('countUsers').value
            let countinactiveUsers = document.getElementById('countinactiveUsers').value
            let countWorkers = document.getElementById('countWorkers').value

            let data = [countUsers, countinactiveUsers, countWorkers]
            
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Active Users', 'Banned Users', 'Workers'],
                    datasets: [{
                        data: data,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(255, 206, 86, 0.7)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            display: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
