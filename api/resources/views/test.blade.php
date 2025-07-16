<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Modal Form</title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center" x-data="{ showForm: false }">

  <!-- Main Button -->
  <button
    @click="showForm = true"
    class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700 transition"
  >
    Open Form
  </button>

  <!-- Modal Overlay -->
  <div
    x-show="showForm"
    x-transition.opacity
    class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-40"
    @click.self="showForm = false"
  ></div>

  <!-- Modal Content (Form) -->
  <div
    x-show="showForm"
    x-transition
    class="fixed inset-0 flex items-center justify-center z-50"
    aria-modal="true"
    role="dialog"
  >
    <div class="bg-white w-full max-w-md p-6 rounded-lg shadow-xl relative">
      <h2 class="text-xl font-semibold mb-4">Contact Form</h2>

      <form method="POST" action="/test" class="space-y-4">
        @csrf
        <div>
          <label class="block text-sm font-medium text-gray-700">Name</label>
          <input
            type="text"
            name="name"
            required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500"
          />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <input
            type="email"
            name="email"
            required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500"
          />
        </div>

        <div class="flex justify-between mt-4">
          <button
            type="submit"
            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition"
          >
            Submit
          </button>

          <button
            type="button"
            class="text-gray-600 hover:underline"
            @click="showForm = false"
          >
            Cancel
          </button>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
