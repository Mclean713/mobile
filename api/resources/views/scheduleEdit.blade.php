<x-layout>
    <div class="flex justify-center items-start min-h-screen bg-gray-100 p-6">
        <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-4xl">
            <h3 class="text-2xl font-semibold text-gray-700 mb-6">Edit Schedule</h3>

            <form action="/schedule/{{$schedule->id}}" method="post">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <div class="mb-4">
                            <label for="route" class="block text-sm font-medium text-gray-700 mb-1">Route</label>
                            <select id="route" name="routeId" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" required>
                               
                            @foreach ($routes as $route)
                                <option value="{{ $route->id }}"
                                    {{ old('routeId', $schedule->routeId) == $route->id ? 'selected' : '' }}>
                                    {{ $route->routeName }}
                                </option>
                            @endforeach

                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="bus" class="block text-sm font-medium text-gray-700 mb-1">Bus</label>
                            <select id="bus" name="busId" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" required>
                                @foreach ($buses as $bus)
                                    <option value="{{ $bus->id }}"
                                        {{ old('busId', $schedule->busId) == $bus->id ? 'selected' : '' }}>
                                        {{ $bus->number_plate }} ({{ $bus->seats }} seats)
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="driver" class="block text-sm font-medium text-gray-700 mb-1">Driver</label>
                            <select id="driver" name="driverId" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" required>
                                @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}"
                                        {{ old('driverId', $schedule->driverId) == $driver->id ? 'selected' : '' }}>
                                        {{ $driver->FirstName }} {{ $driver->LastName }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="mb-4">
                            <label for="startDate" class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                            <input type="date" name="StartDate" id="startDate"
                                    value="{{ old('StartDate', $schedule->StartDate) }}"
                                    class="..." required>

                        </div>

                        <div class="mb-4">
                            <label for="departureTime" class="block text-sm font-medium text-gray-700 mb-1">Departure Time</label>
                            <input type="time" name="DepartureTime" id="departureTime"
                                value="{{ old('DepartureTime', $schedule->DepartureTime) }}"
                                class="..." required>
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent">
                                <option value="scheduled" {{ old('status', $schedule->status) == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                <option value="completed" {{ old('status', $schedule->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ old('status', $schedule->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>

                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="basePrice" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                            <input type="number" name="price" id="basePrice"
                                value="{{ old('price', $schedule->price) }}"
                                class="..." required>

                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-3">
                    <a href="/schedule" 
                    class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Cancel
                    </a>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        <i class="fas fa-calendar-plus mr-2"></i> Create Schedule
                    </button>
                </div>
            </form>
        </div>
    </div>


</x-layout>