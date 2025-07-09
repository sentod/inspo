<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-white font-sans">
    <!-- Header Section -->
    <header class="flex justify-between items-center p-6">
        <div class="text-3xl font-bold text-teal-500">
            inspo.
        </div>
        <nav class="space-x-8 text-gray-500">
            <a class="hover:text-teal-500" href="#">All</a>
            <a class="hover:text-teal-500" href="#">Recommendations</a>
            <a class="hover:text-teal-500" href="#">Contact Us</a>
        </nav>
        <div class="space-x-4">
            <a class="text-teal-500 hover:text-gray-900" href="{{ route('account.login') }}">
                Login
            </a>
            <a class="bg-teal-500 text-white px-4 py-2 rounded-full hover:bg-teal-600" href="{{ route('account.register') }}">
                Sign Up
            </a>
        </div>
    </header>

    <!-- Main Section -->
    <main class="flex flex-col md:flex-row items-center justify-between p-4 md:p-10 mt-10">
        <!-- Left Side Content -->
        <div class="md:w-1/2 space-y-4 mr-8">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-700">
                Find influencers according to your needs
            </h1>
            <p class="text-gray-500">
                Recommend Instagram influencers according to the needs of your brand or company
            </p>
            <a class="bg-teal-500 text-white px-6 py-3 rounded-full hover:bg-teal-600 mt-4 inline-block" href="{{ route('account.login') }}">
                Get Started
            </a>
        </div>

        <!-- Right Side Image -->
        <div class="md:w-1/2 mt-10 md:mt-0">
            <div class="relative">
                <img alt="Three influencers smiling and posing for the camera" class="rounded-lg" height="400" src="{{ asset('images/banner.png') }}"/>
            </div>
        </div>
    </main>
</body>
</html>
