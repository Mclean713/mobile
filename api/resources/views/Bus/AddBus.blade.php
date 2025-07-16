<x-layout>
        <div class="flex-1 bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-bus text-primary-600 mr-3"></i>
                    Add New Bus
                </h2>
                <a href="/" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-xl"></i>
                </a>
            </div>

            <form action="/bus" class="space-y-6" method="post">
                @csrf

                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-info-circle text-primary-600 mr-2"></i>
                        Basic Information
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <input type="text" name="name" required class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" placeholder="SWB-1001">
                        </div>
                                              
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">License Plate</label>
                            <input type="text" name="number_plate" required class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" placeholder="ABC-1234">
                        </div>
                                             
                </div>

   
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-users text-primary-600 mr-2"></i>
                        Capacity
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Total Capacity</label>
                            <input type="number" name="seats" min="1" class="w-full border rounded-lg px-4 py-2 bg-gray-100" placeholder="Auto-calculated">
                        </div>
                    </div>
                    
                </div>
                @if ($errors->any())
                  <ul class="px-4 py-2 bg-red-100">
                    @foreach ( $errors->all() as $error )
                        <li class="my-2 text-red-500">{{$error}}</li>
                    @endforeach
                  </ul>
                @endif

                <div class="flex justify-end space-x-4 pt-4">
                    <button type="submit" name="submit" class="px-6 py-2 bg-primary-600 hover:bg-primary-700 rounded-lg text-white flex items-center">
                        <i class="fas fa-save mr-2"></i>
                        Save Bus Details
                    </button>
                </div>
            </form>
        </div>

</x-layout>    