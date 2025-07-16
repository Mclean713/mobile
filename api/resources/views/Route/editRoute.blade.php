<x-layout>
<div class="flex-1 bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Route</h2>

          <a href="/routelist" 
            class="text-gray-500 hover:text-gray-700" >
            <i class="fas fa-times text-xl"></i>
          </a>
    </div>

    <form action="/addroute/{{$route->id}}" class="space-y-6" method="post">
        @csrf
        @method('PUT')
        <div class="bg-gray-50 p-4 rounded-lg">
            <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                <i class="fas fa-info-circle text-primary-600 mr-2"></i>
                Edit Information
            </h3>

            <div class="grid grid-cols-1 md:grid-rows-4 gap-3">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Route Name</label>
                    <input type="text" 
                       name="routeName"
                       class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" 
                       value="{{old('routeName',$route->routeName)}}"   
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Starting Point</label>
                     <input type="text" 
                        name="Start_area"  
                        class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" 
                        value="{{old('Start',$route->Start_area)}}"   
                    >
                </div>
        
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Starting District</label>
                    <input type="text" 
                        name="Start_district"  
                        class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" 
                        value="{{old('Start',$route->Start_district)}}"   
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Distination Point</label>
                    <input type="text" 
                        name="destination_area"  
                        class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" 
                        value="{{old('Start',$route->destination_area)}}"   
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Distination District</label>
                    <input type="text" 
                        name="destination_district"  
                        class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" 
                        value="{{old('Start',$route->destination_district)}}"   
                    >
                </div>
            </div>


              @if ($errors->any())
                  <ul class="px-4 py-2 bg-red-100">
                    @foreach ( $errors->all() as $error )
                        <li class="my-2 text-red-500">{{$error}}</li>
                    @endforeach
                  </ul>
              @endif


        <div class="flex justify-end space-x-3 pt-4">
            <button type="submit" name="submit" class="px-4 py-2 bg-primary-600 hover:bg-primary-700 rounded-lg text-white">
                Save Route
            </button>
        </div>
    </form>
</div>
</x-layout>