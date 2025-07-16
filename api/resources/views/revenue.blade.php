<x-layout>
    <div class="flex-1 bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-chart-line text-primary-600 mr-3"></i>
                Revenue
            </h2>
            <div class="flex space-x-4">
                <button class="px-4 py-2 bg-primary-100 hover:bg-primary-200 rounded-lg text-primary-700 flex items-center">
                    <i class="fas fa-download mr-2"></i>
                    Export
                </button>
            </div>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-blue-600 font-medium">Total Revenue</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-1">{{$total}}</h3>
                    </div>
                </div>
                <p class="text-xs text-blue-500 mt-2"><span class="text-green-500">{{$percentageAmount}}</span> from week</p>
            </div>

            <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-green-600 font-medium">Completed Schedules</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-1"></h3>
                    </div>
                    <i class="fas fa-check-circle text-green-400 text-xl"></i>
                </div>
                <p class="text-xs text-green-500 mt-2"><span class="text-green-500">{{$percentageChange}}</span> from last week</p>
            </div>

            

            <div class="bg-orange-50 p-4 rounded-lg border border-orange-100">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm text-orange-600 font-medium">Cancellations</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-1">{{$cancellation}}</h3>
                        <p class="text-xs text-green-500 mt-2"><span class="text-red-600">{{$percentage}} %</span> from last week</p>
                    </div>
                    <i class="fas fa-times-circle text-orange-400 text-xl"></i>
                </div>

            </div>
        </div>

        <div class="bg-gray-50 p-6 rounded-lg mb-8">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-800 flex items-center">
                    <i class="fas fa-chart-bar text-primary-600 mr-2"></i>
                    Revenue Overview
                </h3>
              
            </div>
            <div class="h-64 bg-white p-4 rounded border">

                <div class="flex items-center justify-center h-full text-gray-400">
                    <div class="h-64 bg-white p-4 rounded border" width="800" height="400">
                          <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
    </div>



    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const chartData = @json($data); 

        const labels = chartData.map(item => item.week); 
        const totals = chartData.map(item => item.total);  

        const ctx = document.getElementById('revenueChart').getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Revenue (MK)',
                    data: totals,
                    borderColor: '#4f46e5',
                    backgroundColor: 'rgba(79, 70, 229, 0.05)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'top' },
                    tooltip: { mode: 'index', intersect: false }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        grid: { drawBorder: false },
                        ticks: {
                            callback: value => 'MK' + value.toLocaleString()
                        }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });
    });
</script>


</x-layout>