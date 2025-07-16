<x-layout>
    <body class="bg-gray-50">
        <div class="container mx-auto px-4 py-8 max-w-3xl">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Add New Announcement</h2>
                <p class="text-gray-600">Create and publish updates about your bus service</p>
            </div>

            <form action="/addAnnuncementStore" method="post" class="bg-white p-6 rounded-lg shadow space-y-6">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>


                <div>
                    <label for="effective_date" class="block text-sm font-medium text-gray-700">Effective Date</label>
                    <input type="date" name="effective_date" id="effective_date" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                    <select name="type" id="type" name="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <option value="General">General</option>
                        <option value="Delay">Delay</option>
                        <option value="Route Change">Route Change</option>
                        <option value="Maintenance">Maintenance</option>
                    </select>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="5" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"></textarea>
                </div>

                @if ($errors->any())
                    <ul class="px-4 py-2 bg-red-100">
                        @foreach ( $errors->all() as $error)
                            <li class="my-2 text-red-500">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
 
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 shadow-sm">
                        Publish Announcement
                    </button>
                </div>
            </form>
        </div>
    </body>
</x-layout>
