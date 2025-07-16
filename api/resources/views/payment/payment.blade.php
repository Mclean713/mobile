<x-layout>
    <div class="flex-1 bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-credit-card text-primary-600 mr-3"></i>
                Add Payment Method
            </h2>
            <a href="/paymentList" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times text-xl"></i>
            </a>
        </div>

        <form action="/payment" class="space-y-6" method="POST">
            @csrf
            <div class="bg-gray-50 p-6 rounded-lg">
                <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-money-bill-wave text-primary-600 mr-2"></i>
                    Payment Information
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Payment Method Name</label>
                        <input type="text"  name="MethodName" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" placeholder="e.g. Credit Card, Mobile Payment">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Payment Type</label>
                        <select id="paymentType" name="PaymentType" required class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600">
                            <option value="">Select Payment Type</option>
                            <option value="mobile">Mobile Payment</option>
                            <option value="bank">Bank Transfer</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Processing Fee (%)</label>
                        <input type="number" name="fee" step="0.01" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" placeholder="0.00">
                    </div>
                    

                    <div id="accountNumberField" class="hidden">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Account Number</label>
                        <input type="text" name="acountNumber" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" placeholder="Enter account number">
                    </div>
                    
                    <div id="mobileCodesField" class="hidden md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mobile Payment Codes</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs text-gray-500 mb-1">Code</label>
                                <input type="text" name="code" class="w-full border rounded-lg px-4 py-2" placeholder="123456">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-1">PhoneNumber</label>
                                <input type="text" name="phoneNumber" class="w-full border rounded-lg px-4 py-2" placeholder="0-999-999-999">
                            </div>
                        
                        </div>
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea  name="Decription" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent" rows="3" placeholder="Additional details about this payment method"></textarea>
                    </div>


                      @if ($errors->any())
                                    <ul class="px-4 py-2 bg-red-100">
                                        @foreach ( $errors->all() as $error)
                                            <li class="my-2 text-red-500">{{$error}}</li>
                                        @endforeach
                                    </ul>
                       @endif
                </div>
            </div>

            <div class="flex justify-end space-x-4 pt-4">
                <button type="submit" class="px-6 py-2 bg-primary-600 hover:bg-primary-700 rounded-lg text-white flex items-center">
                    <i class="fas fa-save mr-2"></i>
                    Save Payment Method
                </button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('paymentType').addEventListener('change', function() {
            const paymentType = this.value;
            const accountNumberField = document.getElementById('accountNumberField');
            const mobileCodesField = document.getElementById('mobileCodesField');
            
            // Show/hide account number field based on payment type
            if (['card', 'mobile', 'bank'].includes(paymentType)) {
                accountNumberField.classList.remove('hidden');
            } else {
                accountNumberField.classList.add('hidden');
            }
            
            // Show/hide mobile codes field only for mobile payments
            if (paymentType === 'mobile') {
                mobileCodesField.classList.remove('hidden');
            } else {
                mobileCodesField.classList.add('hidden');
            }
        });
    </script>
</x-layout>