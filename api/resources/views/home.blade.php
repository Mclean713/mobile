<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusPro - Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center">
        <div class="flex flex-col md:flex-row items-center justify-center space-y-8 md:space-y-0 md:space-x-10 px-6">
            
            <div>
                <img src="images/bus-2546383_1280.jpg" alt="Bus Illustration" class="w-80 max-w-full">
            </div>

            <div class="text-center">
                <img src="images/bus-2546383_1280.jpg" alt="BusPro Logo" class="mx-auto mb-4 w-20 h-20">

                <h1 class="text-4xl font-bold text-blue-700 mb-4">Welcome to Bus reservation</h1>
                <p class="text-gray-600 mb-6">Your reliable bus reservation system.</p>
                <div class="space-x-4">
                    <a href="{{ route('login') }}"
                       class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="bg-gray-100 text-blue-700 px-6 py-2 rounded-md border border-blue-600 hover:bg-blue-50">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-blue-700 mb-6">About Bus reservation</h2>
            <p class="text-gray-700 text-lg leading-relaxed">
                Bus reservation is a modern and customer-focused bus transportation company committed to providing safe, comfortable, and affordable travel experiences. 
                With a fleet of well-maintained buses, professional drivers, and an easy-to-use online reservation system, we connect cities and communities with reliability and care. 
                Whether you're commuting for work, visiting family, or planning a getaway, BusPro ensures your journey is smooth from start to finish.
            </p>
        </div>
    </section>


</body>
</html>
