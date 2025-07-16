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

    <div x-show="!showForm" x-transition>
        <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
            <div class="overflow-x-auto">
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

                @if ($errors->any())
                    <ul class="mt-4 px-4 py-3 bg-red-50 border border-red-200 rounded">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-600">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
    <div x-show="showForm" x-transition class="mt-6">
        <div class="bg-white p-6 rounded shadow">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-700">Create New Route</h3>
                <button @click="showForm = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <p class="text-gray-500">[Form content goes here]</p>
        </div>
    </div>

</div>
</x-layout>
