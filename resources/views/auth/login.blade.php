<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - LaundryMaster</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom Styles -->
    <style>
        :root {
            --primary: #6a49f2;
            --primary-hover: #5636d6;
            --secondary: #322d49;
            --text-body: #666666;
            --light-bg: #f9f9f9;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-body);
            overflow-x: hidden;
        }
        
        .text-primary { color: var(--primary); }
        .bg-primary { background-color: var(--primary); }
        .bg-primary-hover:hover { background-color: var(--primary-hover); }
        .border-primary { border-color: var(--primary); }
        .focus\:border-primary:focus { border-color: var(--primary); }
        .focus\:ring-primary:focus { --tw-ring-color: var(--primary); }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: 'var(--primary)',
                        'primary-hover': 'var(--primary-hover)',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-white">

    <div class="min-h-screen flex overflow-hidden bg-white">
        <!-- Left Side: Branding & Image -->
        <div class="hidden lg:flex lg:w-5/12 relative bg-[#1e1e2d] text-white flex-col justify-between p-12 overflow-hidden">
            <!-- Background Image with Overlay -->
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1521656693074-0ef32e80a5d5?q=80&w=2070&auto=format&fit=crop" alt="Laundry Shop" class="w-full h-full object-cover opacity-40">
                <div class="absolute inset-0 bg-gradient-to-b from-[#1e1e2d]/80 to-[#1e1e2d]/90"></div>
            </div>

            <!-- Logo -->
            <div class="relative z-10">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-white shadow-lg shadow-primary/30">
                        <i class="fas fa-tshirt text-xl"></i>
                    </div>
                    <span class="font-bold text-2xl tracking-tight text-white">LaundryMaster</span>
                </a>
            </div>

            <!-- Main Text & Illustration Area -->
            <div class="relative z-10 my-auto">
                <h1 class="text-4xl font-bold mb-6 leading-tight text-white">We're ready to help you manage your laundry business.</h1>
                <p class="text-lg text-gray-300 mb-10 max-w-md">Streamline operations, track inventory, and manage staff all in one place. Join thousands of laundry owners today.</p>
                
                <!-- Feature List -->
                <div class="relative w-full max-w-sm mt-8">
                    <!-- Abstract shapes for illustration feel -->
                    <div class="absolute top-0 right-0 w-24 h-24 bg-primary/20 rounded-full blur-2xl"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-blue-500/20 rounded-full blur-2xl"></div>
                    
                    <div class="bg-white/5 backdrop-blur-md rounded-2xl p-6 border border-white/10 shadow-2xl">
                        <div class="space-y-5">
                            <!-- Feature 1 -->
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center text-green-400 shrink-0">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div>
                                    <h5 class="font-bold text-white text-sm">Quick Setup</h5>
                                    <p class="text-xs text-gray-400">Get started in less than 2 minutes</p>
                                </div>
                            </div>
                            
                            <!-- Feature 2 -->
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center text-blue-400 shrink-0">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <div>
                                    <h5 class="font-bold text-white text-sm">24/7 Support</h5>
                                    <p class="text-xs text-gray-400">We are here to help you grow</p>
                                </div>
                            </div>

                            <!-- Feature 3 -->
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-orange-500/20 flex items-center justify-center text-orange-400 shrink-0">
                                    <i class="fas fa-boxes"></i>
                                </div>
                                <div>
                                    <h5 class="font-bold text-white text-sm">Full Inventory Control</h5>
                                    <p class="text-xs text-gray-400">Never run out of supplies again</p>
                                </div>
                            </div>

                            <!-- Feature 4 -->
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-purple-500/20 flex items-center justify-center text-purple-400 shrink-0">
                                    <i class="fas fa-cash-register"></i>
                                </div>
                                <div>
                                    <h5 class="font-bold text-white text-sm">POS & Order Tracking</h5>
                                    <p class="text-xs text-gray-400">Seamless checkout experience</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="relative z-10">
                <p class="text-sm text-gray-500">&copy; {{ date('Y') }} LaundryMaster. All rights reserved.</p>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="w-full lg:w-7/12 flex flex-col justify-center items-center p-6 md:p-12 overflow-y-auto h-screen bg-white">
            <div class="w-full max-w-xl">
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-primary">
                        <i class="fas fa-tshirt text-2xl"></i>
                        <span class="font-bold text-2xl text-gray-900">LaundryMaster</span>
                    </a>
                </div>

                <div class="mb-10">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Welcome Back</h2>
                    <p class="text-gray-500">Please enter your details to sign in.</p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="mt-8">
                    @csrf
                    
                    <div class="space-y-5">
                        <div class="relative group">
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Email Address</label>
                            <input type="email" name="email" class="w-full bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block p-3.5 pl-4 outline-none transition-all border border-transparent focus:bg-white focus:shadow-md" placeholder="hello@example.com" id="email" value="{{ old('email') }}" required autofocus>
                            @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="relative group">
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Password</label>
                            <div class="relative">
                                <input type="password" name="password" id="dlab-password" class="w-full bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block p-3.5 pl-4 pr-10 outline-none transition-all border border-transparent focus:bg-white focus:shadow-md" placeholder="••••••••" required>
                                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 cursor-pointer hover:text-gray-600" onclick="togglePassword('dlab-password')">
                                    <i class="fa fa-eye-slash"></i>
                                </span>
                            </div>
                            @error('password') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember" name="remember" type="checkbox" class="w-4 h-4 text-primary border-gray-300 rounded focus:ring-primary">
                                <label for="remember" class="ml-2 block text-sm text-gray-500">Remember me</label>
                            </div>
                            <div class="text-sm">
                                <a href="#" class="font-medium text-primary hover:text-primary-hover">Forgot Password?</a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10">
                        <button type="submit" class="w-full px-8 py-3 rounded-lg bg-primary text-white font-bold shadow-lg shadow-primary/30 hover:bg-primary-hover transition-all">
                            Sign In
                        </button>
                    </div>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-500">Don't have an account? <a href="{{ route('register') }}" class="text-primary font-bold hover:underline">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>

    <div id="style-switcher" class="fixed right-0 top-0 h-full w-80 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 z-[100]">
        <button id="style-switcher-toggle" class="absolute -left-12 top-1/2 -translate-y-1/2 bg-primary text-white p-3 rounded-l-lg shadow-lg">
            <i class="fas fa-cog fa-spin"></i>
        </button>
        <div class="p-6 h-full overflow-y-auto">
            <div class="flex justify-between items-center mb-8">
                <h3 class="font-bold text-xl text-gray-900">Pick your style</h3>
                <button onclick="resetTheme()" class="text-xs bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition">Reset</button>
            </div>

            <!-- Primary Color -->
            <div class="mb-10">
                <h4 class="font-semibold text-gray-700 mb-4">Primary Color</h4>
                <div class="grid grid-cols-5 gap-3">
                    <button class="w-8 h-8 rounded-full bg-[#6a49f2] ring-2 ring-offset-2 ring-transparent hover:ring-[#6a49f2] transition" onclick="setPrimary('#6a49f2', '#5636d6', '#e0e7ff')"></button>
                    <button class="w-8 h-8 rounded-full bg-[#3b82f6] ring-2 ring-offset-2 ring-transparent hover:ring-[#3b82f6] transition" onclick="setPrimary('#3b82f6', '#2563eb', '#dbeafe')"></button>
                    <button class="w-8 h-8 rounded-full bg-[#10b981] ring-2 ring-offset-2 ring-transparent hover:ring-[#10b981] transition" onclick="setPrimary('#10b981', '#059669', '#d1fae5')"></button>
                    <button class="w-8 h-8 rounded-full bg-[#f59e0b] ring-2 ring-offset-2 ring-transparent hover:ring-[#f59e0b] transition" onclick="setPrimary('#f59e0b', '#d97706', '#fef3c7')"></button>
                    <button class="w-8 h-8 rounded-full bg-[#ef4444] ring-2 ring-offset-2 ring-transparent hover:ring-[#ef4444] transition" onclick="setPrimary('#ef4444', '#dc2626', '#fee2e2')"></button>
                    <button class="w-8 h-8 rounded-full bg-[#ec4899] ring-2 ring-offset-2 ring-transparent hover:ring-[#ec4899] transition" onclick="setPrimary('#ec4899', '#db2777', '#fce7f3')"></button>
                    <button class="w-8 h-8 rounded-full bg-[#8b5cf6] ring-2 ring-offset-2 ring-transparent hover:ring-[#8b5cf6] transition" onclick="setPrimary('#8b5cf6', '#7c3aed', '#ede9fe')"></button>
                    <button class="w-8 h-8 rounded-full bg-[#06b6d4] ring-2 ring-offset-2 ring-transparent hover:ring-[#06b6d4] transition" onclick="setPrimary('#06b6d4', '#0891b2', '#cffafe')"></button>
                    <button class="w-8 h-8 rounded-full bg-[#f97316] ring-2 ring-offset-2 ring-transparent hover:ring-[#f97316] transition" onclick="setPrimary('#f97316', '#ea580c', '#ffedd5')"></button>
                    <button class="w-8 h-8 rounded-full bg-[#64748b] ring-2 ring-offset-2 ring-transparent hover:ring-[#64748b] transition" onclick="setPrimary('#64748b', '#475569', '#f1f5f9')"></button>
                </div>
            </div>
            
            <!-- Note -->
            <div class="mt-8 p-4 bg-gray-50 rounded-lg border border-gray-200">
                <p class="text-xs text-gray-500">* This theme switcher is for demo purposes. You can customize these colors in the CSS variables.</p>
            </div>
        </div>
    </div>

    <script>
        const switcher = document.getElementById('style-switcher');
        const toggleBtn = document.getElementById('style-switcher-toggle');
        
        toggleBtn.addEventListener('click', () => {
            switcher.classList.toggle('translate-x-full');
        });

        function setPrimary(color, hover, light) {
            document.documentElement.style.setProperty('--primary', color);
            document.documentElement.style.setProperty('--primary-hover', hover);
            document.documentElement.style.setProperty('--light-bg', light);
            
            // Save to localStorage
            localStorage.setItem('laundry_primary', color);
            localStorage.setItem('laundry_primary_hover', hover);
            localStorage.setItem('laundry_primary_light', light);
        }

        function resetTheme() {
            setPrimary('#6a49f2', '#5636d6', '#f9f9f9');
            localStorage.removeItem('laundry_primary');
            localStorage.removeItem('laundry_primary_hover');
            localStorage.removeItem('laundry_primary_light');
        }

        // Load saved theme
        document.addEventListener('DOMContentLoaded', () => {
            const savedColor = localStorage.getItem('laundry_primary');
            if (savedColor) {
                const savedHover = localStorage.getItem('laundry_primary_hover');
                const savedLight = localStorage.getItem('laundry_primary_light');
                setPrimary(savedColor, savedHover, savedLight);
            }
        });

        function togglePassword(id) {
            const input = document.getElementById(id);
            const icon = input.nextElementSibling.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }
    </script>
</body>
</html>