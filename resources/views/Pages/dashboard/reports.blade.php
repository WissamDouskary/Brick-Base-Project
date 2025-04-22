@extends('Pages.dashboard.layouts.app')

@section('content')
    <div class="space-y-6 p-8">
        <h1 class="text-2xl font-bold">Reports</h1>

        <!-- Filters -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="people" class="block text-sm font-medium text-gray-700 mb-1">People:</label>
                <select id="people" class="w-full rounded-md border-gray-300 shadow-sm pl-2 py-2 focus:border-blue-500 focus:ring-blue-500">
                    <option selected>All</option>
                    <option>Admins</option>
                    <option>Users</option>
                </select>
            </div>
            <div>
                <label for="topic" class="block text-sm font-medium text-gray-700 mb-1">Topic:</label>
                <select id="topic" class="w-full rounded-md border-gray-300 shadow-sm pl-2 py-2 focus:border-blue-500 focus:ring-blue-500">
                    <option selected>All</option>
                    <option>Sales</option>
                    <option>Marketing</option>
                    <option>Support</option>
                </select>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Active Users -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Active Users</h3>
                <div class="flex items-baseline">
                    <span class="text-3xl font-bold">27</span>
                    <span class="text-gray-400 text-sm ml-2">/80</span>
                </div>
            </div>

            <!-- Banned Users -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Banned Users</h3>
                <div class="flex items-baseline">
                    <span class="text-3xl font-bold">5</span>
                </div>
            </div>

            <!-- Reviews -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Reviews</h3>
                <div class="flex items-baseline">
                    <span class="text-3xl font-bold">15</span>
                </div>
            </div>

            <!-- Active Products -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Active Products</h3>
                <div class="flex items-baseline">
                    <span class="text-3xl font-bold">27</span>
                </div>
            </div>

            <!-- Comments -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Comments</h3>
                <div class="flex items-baseline">
                    <span class="text-3xl font-bold">120</span>
                </div>
            </div>

            <!-- Available Workers -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Available Workers</h3>
                <div class="flex items-baseline">
                    <span class="text-3xl font-bold">2</span>
                </div>
            </div>
        </div>

        <!-- Chart and Latest Users -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Chart -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="flex justify-center">
                    <div class="w-64 h-64">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Latest Users -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="text-sm font-medium text-gray-900 mb-4">Latest Users</h3>
                <div class="space-y-4">
                    <div>
                        <h4 class="font-medium">Houston Facility</h4>
                        <p class="text-sm text-gray-500">User</p>
                    </div>
                    <div>
                        <h4 class="font-medium">Test Group</h4>
                        <p class="text-sm text-gray-500">Admin</p>
                    </div>
                    <div>
                        <h4 class="font-medium">Sales Leadership</h4>
                        <p class="text-sm text-gray-500">User</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('pieChart').getContext('2d');
            
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Red', 'Green', 'Yellow', 'Blue'],
                    datasets: [{
                        data: [39, 28, 22, 11],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(54, 162, 235, 0.7)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(54, 162, 235, 1)'
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
                            display: false
                        }
                    }
                }
            });
        });
    </script>
@endsection
