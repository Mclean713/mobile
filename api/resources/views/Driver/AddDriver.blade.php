<x-layout>
    <div class="flex-1 bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-user-tie text-primary-600 mr-3"></i>
                Add New Driver
            </h2>
            <a href="/" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times text-xl"></i>
            </a>
        </div>

        <form  action="/adddriver"  class="space-y-6" method="post">
            @csrf
            <div class="bg-gray-50 p-6 rounded-lg">
                <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-id-card text-primary-600 mr-2"></i>
                    Personal Information
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                        <input type="text" name="FirstName" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" placeholder="John">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                        <input type="text" name="LastName" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" placeholder="Doe">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="text" name="Email" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="text" name="phoneNumber" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">License Number</label>
                        <input type="text" name="LicenseNumber" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" placeholder="DL-58492">
                    </div>

                </div>

            </div>

            <div class="flex justify-end space-x-4 pt-4">
                <button type="submit" name="submit" class="px-6 py-2 bg-primary-600 hover:bg-primary-700 rounded-lg text-white flex items-center">
                    <i class="fas fa-save mr-2"></i>
                    Save Driver
                </button>
            </div>
        </form>
    </div>

</x-layout>   