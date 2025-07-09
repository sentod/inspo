{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Inspo</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(180deg, #B2FFE3 0%, #FFE0FF 100%);
        }
        .input-custom {
            height: 48px; 
            font-size: 16px; 
        }
        .btn-custom {
            height: 48px;
            font-size: 16px; 
            background-color: #19B999; 
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="max-w-6xl w-full flex rounded-2xl shadow-lg bg-white overflow-hidden">
            <!-- Left Side - Illustration -->
            <div class="w-1/2 gradient-bg p-8 hidden md:block">
                <div class="h-full flex items-center justify-center">
                    <img src="{{ asset('images/register.svg') }}" alt="Inspo Illustration" class="w-full max-w-md">
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="w-full md:w-1/2 p-8 md:p-12">
                <div class="mb-8">
                    <div class="flex items-center gap-2 mb-6">
                        <img src="{{ asset('icons/logo.svg') }}" alt="Inspo Logo" class="h-8 ml-48">
                    </div>
                    <h2 class="text-gray-500">Register here!</h2>
                </div>

                <form action="{{ route('account.processRegister') }}" method="POST" action="" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                 <img src="{{ asset('icons/user.svg') }}" alt="Inspo Logo" class="">
                            </div>
                            <input type="name" name="name" id="name" 
                                class="input-custom pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500"
                                value="{{ old('name') }}" required>
                        </div>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1 required" >Email*</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <img src="{{ asset('icons/email.svg') }}" alt="Inspo Logo" class="mr-4">
                            </div>
                            <input type="email" name="email" id="email" 
                                class="input-custom pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500"
                                value="{{ old('email') }}" required>
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1" required>Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                 <img src="{{ asset('icons/lock.svg') }}" alt="Inspo Logo" class="mr-4">
                            </div>
                            <input type="password" name="password" id="password" 
                                class="input-custom pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500"
                                required>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" 
                        class="btn-custom w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                        Register
                    </button>

                     <div class="text-center mt-6">
                        <p class="text-sm text-gray-600">
                            Have an account? 
                            <a href="{{ route('account.login') }}" class="font-medium text-teal-500 hover:text-teal-600 underline">
                                Login
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>