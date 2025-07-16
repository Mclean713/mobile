<x-layout>

<div x-data="{ showForm: false }" class="flex-1 bg-white rounded-lg shadow p-6">
    

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Schedule List</h2>
        <div class="flex items-center gap-4">
         
            <button @click="showForm = true"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                <i class="fas fa-calendar-plus mr-2"></i>  New Schedule
            </button>

           
        </div>
    </div>

    
    <div x-show="!showForm" x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
           
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700 uppercase">Route</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700 uppercase">Bus</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700 uppercase">Driver</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700 uppercase">Departure</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700 uppercase">Price</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700 uppercase">Status</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        
                  
                        @foreach ($schedules as $schedule)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $schedule->route->routeName }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $schedule->bus->number_plate }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $schedule->driver->FirstName }} {{ $schedule->driver->LastName }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $schedule->DepartureTime }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $schedule->price }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $schedule->status }}</td>
                                <td class="px-6 py-4 space-x-2">
                                    <a href="/scheduleEditview/{{$schedule->id}}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    <form action="/schedule/{{$schedule->id}}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center text-red-600 hover:text-red-800 font-medium"
                                            onclick="return confirm('Are you sure you want to delete this schedule?')">
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


    <div x-cloak x-show="showForm" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50">
        <div class="w-full max-w-3xl bg-white rounded-lg shadow-lg overflow-hidden">

            <div class="flex justify-between items-center border-b p-4">
                <h3 class="text-xl font-semibold text-gray-700">Create New Schedule</h3>
                <button @click="showForm = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            

            <div class="overflow-y-auto max-h-[80vh] p-6">
                <form action="/schedule" method="post">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <div class="mb-4">
                            <label for="route" class="block text-sm font-medium text-gray-700 mb-1">Route</label>
                            <select id="route" name="routeId" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" required>
                                <option value="">Select route</option>
                                @foreach ($routes as $route)
                                    <option value="{{$route->id}}">{{$route->routeName}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="bus" class="block text-sm font-medium text-gray-700 mb-1">Bus</label>
                            <select id="bus" name="busId" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" required>
                                <option value="">Select bus</option>
                                @foreach ($buses as $bus)
                                    <option value="{{$bus->id}}">{{$bus->number_plate}} ({{$bus->seats}} seats)</option>   
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="driver" class="block text-sm font-medium text-gray-700 mb-1">Driver</label>
                            <select id="driver" name="driverId" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" required>
                                <option value="">Select driver</option>
                                @foreach ($drivers as $driver)
                                    <option value="{{$driver->id}}">{{$driver->FirstName}} {{$driver->LastName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div>
                        <div class="mb-4">
                            <label for="startDate" class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                            <input type="date" name="StartDate" id="startDate" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" placeholder="Select start date" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="departureTime" class="block text-sm font-medium text-gray-700 mb-1">Departure Time</label>
                            <input type="time" name="DepartureTime" id="departureTime" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" placeholder="Select departure time" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent">
                                <option value="scheduled">Scheduled</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="basePrice" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                            <input type="number" name="price" id="basePrice" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" placeholder="Enter base price" required>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 flex justify-end space-x-3">
                    <button type="button" @click="showForm = false" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        <i class="fas fa-calendar-plus mr-2"></i> Create Schedule
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
