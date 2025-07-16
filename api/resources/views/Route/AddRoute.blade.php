<x-layout>
<div x-data="{ showForm: false }" class="flex-1 bg-white rounded-lg shadow p-6">
    

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Route List</h2>
        <div class="flex items-center gap-4">

            <button @click="showForm = true"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                <i class="fas fa-route text-xl"></i> New Route
            </button>

        </div>
    </div>

    <div x-show="!showForm" x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
            
            <div class="overflow-x-auto">
               <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700 uppercase">Route Name</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700 uppercase">Starting Point</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700 uppercase">Starting District</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700 uppercase">Destination Point</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700 uppercase">Destination District</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($routes as $route)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $route->routeName }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $route->Start_area }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $route->Start_district }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $route->destination_area }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $route->destination_district }}</td>
                                <td class="px-6 py-4 space-x-2">
                                    <a href="/routeEdit/{{ $route->id }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    <form action="{{ route('delete.route', $route) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center text-red-600 hover:text-red-800 font-medium"
                                            onclick="return confirm('Are you sure you want to delete this item?')">
                                            <i class="fas fa-trash mr-1"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       

            </div>
        </div>
    </div>


    <div x-cloak x-show="showForm" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50">
        <div class="w-full max-w-3xl bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="flex justify-between items-center border-b p-4">
                <h3 class="text-xl font-semibold text-gray-700">Create New Route</h3>
                <button @click="showForm = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        
            <div class="overflow-y-auto max-h-[80vh] p-6">
                <form action="/route" class="space-y-6" method="post">
                    @csrf
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-info-circle text-primary-600 mr-2"></i>
                            Basic Information
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Route Name</label>
                                <input type="text" name="routeName" required class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Starting Point</label>
                                <input type="text" name="Start_area" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Starting District</label>
                                <input type="text" name="Start_district" required class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Destination Point</label>
                                <input type="text" name="destination_area" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Destination District</label>
                                <input type="text" name="destination_district" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent">
                            </div>
                        </div>

                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bus Stops</label>
                            <div id="busStopsWrapper">
                                <div class="flex items-center mb-2">
                                    <input type="text" name="busStops[]" placeholder="Enter bus stop" class="flex-1 border rounded-lg px-3 py-2 mr-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent">
                                    <button type="button" onclick="addBusStop()" class="text-green-600 hover:text-green-800 text-sm">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" @click="showForm = false" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg text-gray-800">
                            Cancel
                        </button>
                        <button type="submit" name="submit" class="px-4 py-2 bg-primary-600 hover:bg-primary-700 rounded-lg text-white">
                            Save Route
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<style>
    [x-cloak] { display: none !important; }
</style>
<script>
    function addBusStop() {
        const wrapper = document.getElementById('busStopsWrapper');
        const newStop = document.createElement('div');
        newStop.className = 'flex items-center mb-2';
        newStop.innerHTML = `
            <input type="text" name="busStops[]" placeholder="Enter bus stop" class="flex-1 border rounded-lg px-3 py-2 mr-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent">
            <button type="button" onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-800 text-sm">Remove</button>
        `;
        wrapper.appendChild(newStop);
    }
</script>
</x-layout>