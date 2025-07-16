<x-layout>
 <div class="flex-1 bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Bus Fleet</h2>
       <a href="/addbus" 
               class="inline-flex items-center bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg transition-colors">
               <i class="fas fa-bus mr-2"></i>
               Add New Bus
            </a>
    </div>

    <div class="bg-gray-50 p-4 rounded-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bus Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">License Plate</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Capacity</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                   @foreach ( $buses as $bus)
                       
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$bus->name}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$bus->number_plate}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$bus->seats}}</td>
                           
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="/busEdit/{{$bus->id}}" class="text-primary-600 hover:text-primary-900 mr-3">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="/buslist/{{$bus->id}}" method="POST" class="inline">
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