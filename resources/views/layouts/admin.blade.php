<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md">
            <div class="p-4 text-xl font-bold text-green-500">
               <img src="{{ asset('images/logo-inspo.svg') }}" alt="Inspo Logo" class="mt-4 ml-16">
            </div>
            <ul class="mt-4 ml-2">
                   <li class="p-3 hover:bg-teal-500 hover:text-white transition group {{ request()->routeIs('admin.user') ? 'text-teal-500' : 'text-gray-700' }}">
                        <a href="{{ route('admin.user') }}" class="flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                                class="size-6 transition group-hover:stroke-white {{ request()->routeIs('admin.user') ? 'stroke-teal-500' : 'stroke-gray-700' }}">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                            User
                        </a>
                    </li>       
                <li class="p-3 hover:bg-teal-500 hover:text-white transition group {{ request()->routeIs('admin.message') ? 'text-teal-500' : 'text-gray-700' }}">
                    <a href="{{ route('admin.message') }}" class="flex items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                            class="size-6 transition group-hover:stroke-white {{ request()->routeIs('admin.message') ? 'stroke-teal-500' : 'stroke-gray-700' }}">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                        </svg>
                        Message
                    </a>
                </li>

                <li class="p-3 hover:bg-teal-500 hover:text-white transition group {{ request()->routeIs('admin.logout') ? 'text-teal-500' : 'text-gray-700' }}">
                    <a href="{{ route('admin.logout') }}" class="flex items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                            class="size-6 transition group-hover:stroke-white {{ request()->routeIs('admin.logout') ? 'stroke-teal-500' : 'stroke-gray-700' }}">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                        </svg>
                        Logout
                    </a>
                </li>
            </ul>

        </div>

        <!-- Content -->
        <div class="flex-1 p-6">
            <div class="mt-2 flex justify-end items-center">
                <div class="flex justify-end">
                    <span class="mr-2">Hello, Erika</span>
                </div>
            </div>
            <div class="mt-6 bg-white p-6 rounded-lg shadow">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>