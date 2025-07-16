<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            600: '#2563eb',
                            700: '#1d4ed8',
                        },
                        dark: {
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    }
                }
            }
        }


    </script>
 
</head>
<body class="bg-gray-100">

    <nav class="bg-grey text-white shadow-lg">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">

                <div class="flex items-center space-x-2">
                    <i class="fas fa-bus text-2xl"></i>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="relative group">
                     
                               <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block px-4 py-2 text-gray-800 hover:bg-gray-100" >
                                       <i class="fas fa-sign-out-alt"></i>  Logout
                                    </button>     
                                </form>
                    
                    </div>
                </div>
                

                <button class="md:hidden focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </nav>


    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col md:flex-row gap-6">

            <div class="hidden md:block w-64 bg-white rounded-lg shadow p-4 h-fit">
                <div class="mb-6">
                    <h3 class="font-bold text-lg mb-4 text-gray-700 border-b pb-2">Manager Menu</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="/" class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 text-primary-600 font-medium">
                                <i class="fas fa-tachometer-alt w-5"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="/route" class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 text-gray-700">
                                <i class="fas fa-route w-5"></i>
                                <span>Routes</span>
                            </a>
                        </li>
                        <li>
                            <a href="/schedule" class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 text-gray-700">
                                <i class="fas fa-calendar-alt w-5"></i>
                                <span>Schedules</span>
                            </a>
                        </li>
                        <li>
                            <a href="/mainfest" class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 text-gray-700">
                                <i class="fas fa-ticket-alt w-5"></i>
                                <span>Mainfest</span>
                            </a>
                        </li>
                
                        <li>
                            <a href="/revenue" class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 text-gray-700">
                                <i class="fas fa-chart-bar w-5"></i>
                                <span>Revenue</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{ $slot}}
        </body>  