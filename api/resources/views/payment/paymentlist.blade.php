<x-layout>
 <div class="flex-1 bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Payment Methods</h2>
        <a href="/payment" 
                     class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                    <i class="fas fa-credit-card mr-2"></i> Payment Methods
        </a>

    </div>

    <div class="bg-gray-50 p-4 rounded-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Method Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fee</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">AcountNumber</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Code</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">phoneNumber</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">phoneNumber</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                   @foreach ( $payments as $payment)
                       
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$payment->MethodName}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$payment->PaymentType}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$payment->fee}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$payment->acountNumber}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$payment->code}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$payment->phoneNumber}}</td>
                           <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="/editPayment/{{$payment->id}}" class="text-primary-600 hover:text-primary-900 mr-3">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="/paymentlist/{{$payment->id}}" method="POST" class="inline">
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