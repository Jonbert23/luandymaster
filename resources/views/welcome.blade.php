<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaundryMaster - The All-in-One Laundry Management Solution</title>

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
            --primary: #6a49f2; /* Appku-like Purple/Blue */
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
        
        h1, h2, h3, h4, h5, h6 {
            color: var(--secondary);
            font-weight: 700;
        }
        
        .text-primary { color: var(--primary); }
        .bg-primary { background-color: var(--primary); }
        .bg-primary-hover:hover { background-color: var(--primary-hover); }
        
        .btn-primary {
            background: linear-gradient(to right, var(--primary), var(--primary-hover));
            color: white;
            padding: 12px 35px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .btn-outline {
            background: transparent;
            color: var(--secondary);
            border: 2px solid #eee;
            padding: 12px 35px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .section-padding {
            padding: 100px 0;
        }
        
        .card-shadow {
            box-shadow: 0 15px 40px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        
        .card-shadow:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.08);
        }
        
        .icon-box {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 30px;
            margin-bottom: 25px;
            transition: all 0.3s ease;
        }
        
        .feature-item:hover .icon-box {
            background: var(--primary);
            color: white;
        }

        .shape-bg {
            position: absolute;
            z-index: -1;
        }

        /* Custom Gradients */
        .bg-gradient-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-hover) 100%);
        }
        
        .pricing-card.active {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-hover) 100%);
            color: white;
        }
        
        .pricing-card.active h4, 
        .pricing-card.active h2, 
        .pricing-card.active p,
        .pricing-card.active li {
            color: white;
        }
        
        .pricing-card.active .btn-outline {
            background: white;
            color: var(--primary);
            border-color: white;
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }
            </style>
    </head>
<body class="antialiased bg-white">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/95 backdrop-blur-md border-b border-gray-100 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-24">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="#" class="flex items-center gap-2">
                        <div class="w-10 h-10 rounded-full bg-gradient-primary flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <span class="font-bold text-2xl tracking-tight text-[#322d49]">LaundryMaster</span>
                    </a>
                </div>
                
                <!-- Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-[#322d49] hover:text-primary font-semibold transition">Home</a>
                    <a href="#features" class="text-[#322d49] hover:text-primary font-semibold transition">Features</a>
                    <a href="#overview" class="text-[#322d49] hover:text-primary font-semibold transition">Overview</a>
                    <a href="#pricing" class="text-[#322d49] hover:text-primary font-semibold transition">Pricing</a>
                    <a href="#testimonials" class="text-[#322d49] hover:text-primary font-semibold transition">Stories</a>
                </div>
                
                <!-- CTA -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-[#322d49] hover:text-primary font-semibold transition hidden sm:block">Log in</a>
                    <a href="{{ route('register') }}" class="btn-primary">Get Started</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- 1. Hero Section -->
    <section id="home" class="relative pt-40 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <!-- Background Shapes -->
        <div class="absolute top-0 right-0 -z-10 opacity-10">
            <svg width="800" height="800" viewBox="0 0 800 800" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="400" cy="400" r="400" fill="#6a49f2"/>
            </svg>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="text-center lg:text-left">
                    <h1 class="text-5xl lg:text-6xl font-extrabold leading-tight mb-6">
                        We're building software <br>
                        <span class="text-primary">to manage business</span>
                    </h1>
                    <p class="text-lg text-gray-600 mb-10 leading-relaxed">
                        The all-in-one solution for orders, inventory, POS, and staff management. Streamline operations and grow your laundry business with LaundryMaster.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="{{ route('register') }}" class="btn-primary flex items-center gap-2">
                            Start Free Trial <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="#demo" class="flex items-center gap-3 text-[#322d49] font-bold hover:text-primary transition px-6 py-3">
                            <div class="w-12 h-12 rounded-full bg-white border border-gray-200 flex items-center justify-center shadow-md text-primary">
                                <i class="fas fa-play ml-1"></i>
                            </div>
                            Watch Promo
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=2070&auto=format&fit=crop" alt="Dashboard" class="rounded-2xl shadow-2xl border-4 border-white transform rotate-2 hover:rotate-0 transition duration-500">
                    <!-- Floating Elements -->
                    <div class="absolute -bottom-10 -left-10 bg-white p-4 rounded-xl shadow-xl animate-bounce hidden md:block">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                <i class="fas fa-check"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Daily Orders</p>
                                <p class="font-bold text-[#322d49]">+125 New</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Why LaundryMaster (About) -->
    <section class="section-padding bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h4 class="text-primary font-bold uppercase tracking-wider mb-2">Why Choose Us</h4>
                    <h2 class="text-4xl font-bold mb-6">Why LaundryMaster is the <br> Best software company</h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Everything you need to run your laundry business efficiently. From tracking individual garments to managing complex inventory, we've got you covered.
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Say goodbye to lost tickets and angry customers. Our system ensures every item is accounted for and every customer leaves happy.
                    </p>
                    <a href="{{ route('register') }}" class="btn-primary">Start a project</a>
                </div>
                
                <div class="space-y-8">
                    <!-- Feature 1 -->
                    <div class="flex gap-6 feature-item group">
                        <div class="icon-box shrink-0">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold mb-3 group-hover:text-primary transition">Order Tracking</h4>
                            <p class="text-gray-600">Visual Kanban board to track every order from drop-off to pickup. Never lose a sock again.</p>
                        </div>
                    </div>
                    
                    <!-- Feature 2 -->
                    <div class="flex gap-6 feature-item group">
                        <div class="icon-box shrink-0">
                            <i class="fas fa-cash-register"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold mb-3 group-hover:text-primary transition">POS System</h4>
                            <p class="text-gray-600">Fast checkout for walk-ins. Print professional receipts with QR codes for easy tracking.</p>
                        </div>
                    </div>
                    
                    <!-- Feature 3 -->
                    <div class="flex gap-6 feature-item group">
                        <div class="icon-box shrink-0">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold mb-3 group-hover:text-primary transition">Inventory Control</h4>
                            <p class="text-gray-600">Automated stock tracking for detergents and supplies. Get alerts before you run out.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Stats Section -->
    <section class="py-16 bg-[#f9f9f9]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="p-6">
                    <h2 class="text-4xl font-extrabold text-primary mb-2">50K+</h2>
                    <p class="font-semibold text-gray-600">Orders Processed</p>
                </div>
                <div class="p-6">
                    <h2 class="text-4xl font-extrabold text-primary mb-2">98%</h2>
                    <p class="font-semibold text-gray-600">Positive Rating</p>
                </div>
                <div class="p-6">
                    <h2 class="text-4xl font-extrabold text-primary mb-2">500+</h2>
                    <p class="font-semibold text-gray-600">Trusted Laundries</p>
                </div>
                <div class="p-6">
                    <h2 class="text-4xl font-extrabold text-primary mb-2">1M+</h2>
                    <p class="font-semibold text-gray-600">Garments Cleaned</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. CTA / Login Section -->
    <section class="section-padding bg-gradient-primary text-white text-center relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="max-w-4xl mx-auto px-4 relative z-10">
            <h5 class="uppercase tracking-widest font-semibold mb-4 opacity-80">Get Full Access</h5>
            <h2 class="text-4xl md:text-5xl font-bold mb-8">To check all features please login or register with us</h2>
            <p class="text-xl opacity-90 mb-10 max-w-2xl mx-auto">Join the fastest growing community of laundry business owners. Transform your operations today.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('register') }}" class="bg-white text-primary px-10 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition shadow-lg">Create Free Account</a>
                <a href="{{ route('login') }}" class="bg-transparent border-2 border-white text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-primary transition">Login Now</a>
            </div>
        </div>
    </section>

    <!-- 5. Features (Work Smarter) -->
    <section id="features" class="section-padding bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=2015&auto=format&fit=crop" alt="Analytics" class="rounded-2xl shadow-2xl">
                </div>
                <div class="order-1 lg:order-2">
                    <h4 class="text-primary font-bold uppercase tracking-wider mb-2">Benefit Our Software</h4>
                    <h2 class="text-4xl font-bold mb-6">Work smarter with <br> powerful features</h2>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Don't just work hard, work smart. Our analytics dashboard gives you deep insights into your business performance, helping you make data-driven decisions.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-primary-light flex items-center justify-center text-primary shrink-0">
                                <i class="fas fa-chart-line text-xl"></i>
                            </div>
                            <div>
                                <h5 class="text-xl font-bold mb-2">Advanced Analytics Review</h5>
                                <p class="text-gray-600">Track revenue, popular services, and peak hours. Know exactly how your business is performing.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-primary-light flex items-center justify-center text-primary shrink-0">
                                <i class="fas fa-users-cog text-xl"></i>
                            </div>
                            <div>
                                <h5 class="text-xl font-bold mb-2">Staff Performance Tracking</h5>
                                <p class="text-gray-600">Monitor staff productivity and manage schedules effortlessly. Keep your team aligned.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Overview (How it Works) -->
    <section id="overview" class="section-padding bg-[#f9f9f9]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-4">Quick Software Overview</h2>
                <p class="text-gray-600 text-lg">Get up and running in minutes. Our simple onboarding process makes it easy to modernize your laundry shop.</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition duration-300 text-center group">
                    <div class="w-20 h-20 mx-auto bg-primary-light rounded-full flex items-center justify-center text-primary text-3xl mb-6 group-hover:bg-primary group-hover:text-white transition duration-300">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-3">01. Sign Up Free</h4>
                    <p class="text-gray-600">Create your account in 60 seconds. No credit card required for early access.</p>
                </div>
                
                <!-- Step 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition duration-300 text-center group">
                    <div class="w-20 h-20 mx-auto bg-primary-light rounded-full flex items-center justify-center text-primary text-3xl mb-6 group-hover:bg-primary group-hover:text-white transition duration-300">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-3">02. Setup Shop</h4>
                    <p class="text-gray-600">Add your services, products, prices, and staff members to the system.</p>
                </div>
                
                <!-- Step 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition duration-300 text-center group">
                    <div class="w-20 h-20 mx-auto bg-primary-light rounded-full flex items-center justify-center text-primary text-3xl mb-6 group-hover:bg-primary group-hover:text-white transition duration-300">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-3">03. Start Growing</h4>
                    <p class="text-gray-600">Start taking orders, tracking inventory, and growing your revenue.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. Advanced Features Grid -->
    <section class="section-padding bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-4">Advanced features</h2>
                <p class="text-gray-600 text-lg">Powerful tools designed to handle the complexities of a modern laundry business.</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="p-6 border border-gray-100 rounded-xl hover:border-primary transition duration-300">
                    <i class="fas fa-sliders-h text-4xl text-primary mb-4"></i>
                    <h4 class="text-lg font-bold mb-2">Fully Customizable</h4>
                    <p class="text-sm text-gray-600">Customize services, pricing, and receipts to match your brand.</p>
                </div>
                <div class="p-6 border border-gray-100 rounded-xl hover:border-primary transition duration-300">
                    <i class="fas fa-plug text-4xl text-primary mb-4"></i>
                    <h4 class="text-lg font-bold mb-2">Easy Integration</h4>
                    <p class="text-sm text-gray-600">Works with your favorite payment gateways and tools.</p>
                </div>
                <div class="p-6 border border-gray-100 rounded-xl hover:border-primary transition duration-300">
                    <i class="fas fa-mobile-alt text-4xl text-primary mb-4"></i>
                    <h4 class="text-lg font-bold mb-2">Mobile Ready</h4>
                    <p class="text-sm text-gray-600">Access your dashboard from any device, anywhere.</p>
                </div>
                <div class="p-6 border border-gray-100 rounded-xl hover:border-primary transition duration-300">
                    <i class="fas fa-shield-alt text-4xl text-primary mb-4"></i>
                    <h4 class="text-lg font-bold mb-2">Secure Data</h4>
                    <p class="text-sm text-gray-600">Bank-level encryption to keep your business data safe.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. App Features List -->
    <section class="section-padding bg-[#f9f9f9]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold mb-8">Most probably you are getting the best App ever</h2>
                    
                    <div class="space-y-8">
                        <div class="flex gap-4">
                            <div class="shrink-0 w-14 h-14 bg-white shadow-md rounded-full flex items-center justify-center text-primary text-xl">
                                <i class="fas fa-cloud-download-alt"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold mb-2">Free Early Access</h4>
                                <p class="text-gray-600">Join now and get full access to all premium features for free during our early access period.</p>
                            </div>
                        </div>
                        
                        <div class="flex gap-4">
                            <div class="shrink-0 w-14 h-14 bg-white shadow-md rounded-full flex items-center justify-center text-primary text-xl">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold mb-2">Trusted and Reliable</h4>
                                <p class="text-gray-600">Built with stability in mind. 99.9% uptime guarantee so your business never stops.</p>
                            </div>
                        </div>
                        
                        <div class="flex gap-4">
                            <div class="shrink-0 w-14 h-14 bg-white shadow-md rounded-full flex items-center justify-center text-primary text-xl">
                                <i class="fas fa-database"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold mb-2">Cloud Storage</h4>
                                <p class="text-gray-600">All your data is backed up automatically in the cloud. Never lose a customer record.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1555421689-491a97ff2040?q=80&w=2070&auto=format&fit=crop" alt="App Features" class="rounded-2xl shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- 9. Pricing Section -->
    <section id="pricing" class="section-padding bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h4 class="text-primary font-bold uppercase tracking-wider mb-2">Our Packages</h4>
                <h2 class="text-4xl font-bold mb-4">Completely Free During Early Access</h2>
                <p class="text-gray-600 text-lg">Join us now and get full access to all features at no cost.</p>
            </div>
            
            <div class="max-w-lg mx-auto">
                <div class="pricing-card active p-10 rounded-3xl shadow-2xl text-center relative transform hover:-translate-y-2 transition duration-300">
                    <div class="absolute top-0 right-0 bg-white text-primary text-xs font-bold px-4 py-2 rounded-bl-2xl rounded-tr-2xl uppercase tracking-wider">Limited Offer</div>
                    <h4 class="text-xl font-bold mb-4 opacity-90">Early Adopter</h4>
                    <h2 class="text-6xl font-extrabold mb-2">Free</h2>
                    <p class="mb-8 opacity-80">Forever access for early users</p>
                    
                    <ul class="text-left space-y-4 mb-10 opacity-90 mx-auto max-w-xs">
                        <li class="flex items-center gap-3"><i class="fas fa-check-circle"></i> Unlimited Orders</li>
                        <li class="flex items-center gap-3"><i class="fas fa-check-circle"></i> Full Inventory Management</li>
                        <li class="flex items-center gap-3"><i class="fas fa-check-circle"></i> Unlimited Staff Accounts</li>
                        <li class="flex items-center gap-3"><i class="fas fa-check-circle"></i> POS System Included</li>
                        <li class="flex items-center gap-3"><i class="fas fa-check-circle"></i> Advanced Analytics</li>
                    </ul>
                    
                    <a href="{{ route('register') }}" class="btn-outline inline-block w-full">Create Free Account</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. Testimonials -->
    <section id="testimonials" class="section-padding bg-[#f9f9f9]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl font-bold mb-4">What people say</h2>
                <p class="text-gray-600 text-lg">Don't just take our word for it. Here's what laundry owners are saying about LaundryMaster.</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Review 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition duration-300">
                    <div class="flex items-center gap-4 mb-6">
                        <img src="https://i.pravatar.cc/150?img=32" alt="User" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h4 class="font-bold text-[#322d49]">Sarah Jenkins</h4>
                            <p class="text-sm text-gray-500">Owner, Sparkle Clean</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"LaundryMaster changed how we operate. We used to use pen and paper, now everything is digital. The inventory alerts alone saved us thousands."</p>
                    <div class="flex text-yellow-400 mt-4 text-sm">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                </div>
                
                <!-- Review 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition duration-300">
                    <div class="flex items-center gap-4 mb-6">
                        <img src="https://i.pravatar.cc/150?img=11" alt="User" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h4 class="font-bold text-[#322d49]">Mike Ross</h4>
                            <p class="text-sm text-gray-500">Manager, City Laundry</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"The POS system is incredibly fast. We can process walk-ins in seconds, and the QR code receipts look very professional to our customers."</p>
                    <div class="flex text-yellow-400 mt-4 text-sm">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                </div>
                
                <!-- Review 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition duration-300">
                    <div class="flex items-center gap-4 mb-6">
                        <img src="https://i.pravatar.cc/150?img=5" alt="User" class="w-14 h-14 rounded-full object-cover">
                        <div>
                            <h4 class="font-bold text-[#322d49]">Elena Rodriguez</h4>
                            <p class="text-sm text-gray-500">Founder, Fresh & Fold</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"I love the staff management features. I can see who is doing what, and manage permissions easily. Highly recommended!"</p>
                    <div class="flex text-yellow-400 mt-4 text-sm">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 11. Integrations (Local Payment) -->
    <section class="py-16 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h4 class="text-gray-500 font-semibold uppercase tracking-wider mb-10">Seamless Payment Integration</h4>
            <div class="flex flex-wrap justify-center gap-12 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
                <div class="flex items-center gap-2 text-xl font-bold text-[#007DFE]"><i class="fas fa-mobile-alt text-3xl"></i> GCash</div>
                <div class="flex items-center gap-2 text-xl font-bold text-[#7B3F9F]"><i class="fas fa-wallet text-3xl"></i> Maya</div>
                <div class="flex items-center gap-2 text-xl font-bold text-[#00BFA5]"><i class="fas fa-landmark text-3xl"></i> GoTyme</div>
                <div class="flex items-center gap-2 text-xl font-bold text-[#1E88E5]"><i class="fas fa-university text-3xl"></i> Bank Transfer</div>
            </div>
        </div>
    </section>

    <!-- 12. Footer CTA -->
    <section class="py-20 bg-gradient-primary text-white text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="max-w-4xl mx-auto px-4 relative z-10">
            <h5 class="text-white/80 font-bold uppercase tracking-widest mb-4">Free Trial</h5>
            <h2 class="text-4xl font-bold mb-8">Start Your Free Early Access Today!</h2>
            <a href="{{ route('register') }}" class="bg-white text-primary px-10 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition shadow-xl inline-block transform hover:-translate-y-1">
                Create Free Account
            </a>
        </div>
    </section>

    <!-- 13. Footer -->
    <footer class="bg-[#2a263d] text-gray-400 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                <div>
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-10 h-10 rounded-full bg-gradient-primary flex items-center justify-center text-white font-bold text-xl">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <span class="font-bold text-2xl text-white">LaundryMaster</span>
                    </div>
                    <p class="text-sm leading-relaxed mb-6">Excellence decisively nay man yet impression for contrasted remarkably. There spoke happy for you are out.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-primary hover:text-white transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-primary hover:text-white transition"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-primary hover:text-white transition"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-6 text-lg">Quick Link</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="hover:text-primary transition">Home</a></li>
                        <li><a href="#" class="hover:text-primary transition">About us</a></li>
                        <li><a href="#" class="hover:text-primary transition">Features</a></li>
                        <li><a href="#" class="hover:text-primary transition">Pricing</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-primary transition">Login</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-6 text-lg">Community</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="hover:text-primary transition">Career</a></li>
                        <li><a href="#" class="hover:text-primary transition">Leadership</a></li>
                        <li><a href="#" class="hover:text-primary transition">Strategy</a></li>
                        <li><a href="#" class="hover:text-primary transition">Services</a></li>
                        <li><a href="#" class="hover:text-primary transition">History</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-6 text-lg">Contact Info</h4>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt mt-1 text-primary"></i>
                            <span>5919 Trussville Crossings Pkwy, Birmingham</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-envelope text-primary"></i>
                            <span>info@laundrymaster.com</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-phone text-primary"></i>
                            <span>+123 34598768</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm">© Copyright 2025. All Rights Reserved by LaundryMaster</p>
                <div class="flex space-x-6 text-sm">
                    <a href="#" class="hover:text-white transition">Terms</a>
                    <a href="#" class="hover:text-white transition">Privacy</a>
                    <a href="#" class="hover:text-white transition">Support</a>
                </div>
            </div>
        </div>
    </footer>

        <!-- Style Switcher -->
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
            document.documentElement.style.setProperty('--primary-light', light);
            
            // Save to localStorage
            localStorage.setItem('laundry_primary', color);
            localStorage.setItem('laundry_primary_hover', hover);
            localStorage.setItem('laundry_primary_light', light);
        }

        function resetTheme() {
            setPrimary('#6a49f2', '#5636d6', '#e0e7ff');
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
    </script>

    </body>
</html>
