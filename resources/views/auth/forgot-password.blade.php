<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Globe Trotting</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .logo-text {
            font-size: 1.5rem;
            font-weight: 800;
            color: white;
            letter-spacing: 2px;
        }
        .logo-tagline {
            font-size: 0.875rem;
            color: #e0e7ff;
            letter-spacing: 1px;
        }
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="relative z-20 container mx-auto px-4 sm:px-6 py-8 sm:py-12 md:py-16 lg:py-20 flex flex-col justify-center min-h-screen pt-20 sm:pt-24">
        <div class="max-w-md mx-auto w-full">
            
            <!-- Logo and Header -->
            <div class="text-center fade-in mb-8">
                <a href="/">
                    <div class="flex flex-col items-center">
                        <img src="/images/global-throthlelogo-new.png" alt="Globe Trotting Logo"
                            class="h-24 sm:h-28 md:h-32 w-auto object-contain mx-auto float-animation">
                        <div class="logo-text mt-2">GLOBE TROTTING</div>
                        <div class="logo-tagline">Your Journey, Our Expertise</div>
                    </div>
                </a>
            </div>

            <!-- Forgot Password Card -->
            <div class="bg-white rounded-2xl shadow-2xl p-8 fade-in">
                <h2 class="text-3xl font-bold text-gray-900 mb-2 text-center">Forgot Password?</h2>
                <p class="text-gray-600 text-center mb-8">No worries, we'll send you reset instructions</p>

                <!-- Success Message -->
                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Error Messages -->
                @if($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-6">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('forgot-password') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200">
                        <p class="text-xs text-gray-500 mt-1">Enter the email associated with your account</p>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold py-3 px-4 rounded-lg hover:from-purple-700 hover:to-indigo-700 transition duration-300 transform hover:scale-105">
                        Send Reset Link
                    </button>
                </form>

                <!-- Back to Login -->
                <p class="text-center text-gray-600 mt-6">
                    <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                        ← Back to Login
                    </a>
                </p>
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-6">
                <a href="/" class="text-white hover:text-blue-100 font-semibold">
                    ← Back to Home
                </a>
            </div>
        </div>
    </div>
</body>
</html>