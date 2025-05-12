<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-12 text-lg text-gray-900"> <!-- Increased padding and font size -->
                        <canvas id="user"></canvas>
                    </div>
                </div>
                <div class="mt-0 ml-4 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-12 text-lg text-gray-900"> <!-- Increased padding and font size -->
                        <canvas id="sales"></canvas>
                    </div>
                </div>

                <div class="mt-0 ml-4 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-12 text-lg text-gray-900"> <!-- Increased padding and font size -->
                        <canvas id="category"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        <!-- User chart -->
        <script>
            const userChart = new Chart(document.getElementById('user'), {
                type: 'line',
                data: {
                    labels: @json($userLabels),
                    datasets: [{
                        label: 'Users',
                        data: @json($userCounts),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins:{
                        title:{
                        display:true,
                        text:'Number of users over the last 30 days'
                    }
                    }
                   ,
                    animation: {
                        duration: 2000, // animation duration in milliseconds
                        easing: 'easeInOutQuart' // animation easing function
                    }
                }
            });
        </script>
        <script>
            const salesChart = new Chart(document.getElementById('sales'), {
                type: 'pie',
                data: {
                    labels: @json($salesLabels),
                    datasets: [{
                        label: 'Sales',
                        data: @json($salesCounts),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {

                    plugins:{
                        title:{
                        display:true,
                        text:'Most Purchased Products'
                    }
                    },
                      animation: {
                        duration: 2000, // animation duration in milliseconds
                        easing: 'easeInOutQuart' // animation easing function
                    }
                }
            });
        </script>
        <!-- Category chart -->
        <script>
            const categoryChart = new Chart(document.getElementById('category'), {
                type: 'bar',
                data: {
                    labels: @json($categoryLabels),
                    datasets: [{
                        label: 'Categories',
                        data: @json($categoryCounts),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins:{
                        title:{
                        display:true,
                        text:'Popular Products'
                    }
                    },

                    animation: {
                        duration: 2000, // animation duration in milliseconds
                        easing: 'easeInOutQuart' // animation easing function
                    }
                }
            });
        </script>
    @endpush
</x-app-layout>
