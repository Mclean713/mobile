<x-layout>
    <div class="flex-1 bg-white rounded-lg shadow p-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Fleet Management Dashboard</h1>
            <p class="text-gray-600">Manage your buses, drivers, and operations</p>
        </div>
        
        <div class="flex flex-wrap gap-3">
            
        </div>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <div class="bg-white border rounded-lg p-6 shadow-sm hover:shadow-md transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Buses</p>
                    <h3 class="text-2xl font-bold mt-1">{{$buscount}}</h3>
                </div>
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <i class="fas fa-bus text-xl"></i>
                </div>
            </div>
            <a href="{{ route('buslist.view')}}" class="mt-4 inline-block text-sm text-primary-600 hover:text-primary-800">
                <i class="fas fa-list mr-1"></i> View All
            </a>
        </div>


        <div class="bg-white border rounded-lg p-6 shadow-sm hover:shadow-md transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Drivers</p>
                    <h3 class="text-2xl font-bold mt-1">{{$drivercount}}</h3>
                </div>
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <i class="fas fa-user-tie text-xl"></i>
                </div>
            </div>
            <a href="/driverlist"  class="mt-4 inline-block text-sm text-primary-600 hover:text-primary-800">
                <i class="fas fa-list mr-1"></i> View All
            </a>
        </div>


        <div class="bg-white border rounded-lg p-6 shadow-sm hover:shadow-md transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Payment Methods</p>
                    <h3 class="text-2xl font-bold mt-1">{{$payment}}</h3>
                </div>
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                    <i class="fas fa-wallet mr-2"></i>

                </div>
            </div>
            <a href="/paymentList" class="mt-4 inline-block text-sm text-primary-600 hover:text-primary-800">
                <i class="fas fa-list mr-1"></i> View all
            </a>
        </div>

        <div class="bg-white border rounded-lg p-6 shadow-sm hover:shadow-md transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Routes</p>
                    <h3 class="text-2xl font-bold mt-1">{{$routecount}}</h3>
                </div>
                <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                    <i class="fas fa-route text-xl"></i>
                </div>
            </div>
            <a href="/routelist" class="mt-4 inline-block text-sm text-primary-600 hover:text-primary-800">
                <i class="fas fa-list mr-1"></i> View Routes
            </a>
        </div>
    </div>

    <div class="bg-white border rounded-lg p-6 shadow-sm">
        <div class="flex justify-between items-center mb-6">
        </div>
    </div>    
        
</x-layout>     