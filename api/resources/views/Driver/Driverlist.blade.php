<x-layout>
 <div class="flex-1 bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Driver</h2>
         <a href="/adddriver" 
               class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors">
               <i class="fas fa-user-tie mr-2"></i>
               Add Driver
        </a>
    </div>

    <div class="bg-gray-50 p-4 rounded-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">FirstName</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">LastName</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">LicenseNumber</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">status</th>
                         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                   @foreach ( $drivers as $driver)
                       
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$driver->FirstName}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$driver->LastName}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$driver->LicenseNumber}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$driver->type}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$driver->status}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="/driverEdit/{{$driver->id}}" class="text-primary-600 hover:text-primary-900 mr-3">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="/driverlist/{{$driver->id}}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this item?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody> 
</div>

</x-layout>  