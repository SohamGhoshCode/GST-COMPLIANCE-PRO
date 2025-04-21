<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// User is logged in, display the index
echo "Welcome, " . htmlspecialchars($_SESSION['email']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GST Compliance Pro - Simplify Your GST Filing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        .gradient-text {
            background: linear-gradient(45deg, #4F46E5, #7C3AED);
            -webkit-background-clip: text;
            background-clip: text;
            background-clip: text;
            background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
        }
        .feature-card {
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .floating-element {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .scroll-indicator {
            animation: bounce 2s infinite;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
        .stat-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .stat-card:hover {
            transform: scale(1.05);
        }
        .testimonial-card {
            transition: all 0.3s ease;
        }
        .testimonial-card:hover {
            transform: scale(1.02);
        }
        .cta-button {
            position: relative;
            overflow: hidden;
        }
        .cta-button::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }
        .cta-button:hover::after {
            left: 100%;
        }
        .feature-icon {
            font-size: 2.5rem;
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text; /* Add standard property for better browser support */    /* Removed invalid property 'text-fill-color' */
            margin-bottom: 1rem;
            display: inline-block; /* Ensure proper alignment and rendering */
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #EF4444;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .scroll-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #4F46E5;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 50;
        }

        .scroll-to-top.visible {
            opacity: 1;
        }

        /* .chat-widget {
            position: fixed;
            bottom: 20px;
            right: 80px;
            z-index: 50;
        } */

        .chat-button {
            background: #4F46E5;
            color: white;
            width: 60px;
            height: 100px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .chat-button:hover {
            transform: scale(1.1);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .feature-item {
            padding: 2rem;
            border-radius: 1rem;
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-10px);
        }

        .payment-link {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            font-size: 0.875rem;
            margin: 0.5rem 0.25rem;
            display: inline-flex;
            align-items: center;
            white-space: nowrap;
            transform: translateY(-1px);
        }
        
        .payment-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .payment-link i {
            font-size: 0.875rem;
            margin-right: 0.35rem;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full z-50 top-0">
        <div class="max-w-[95%] mx-auto px-6 sm:px-8 lg:px-12">
            <div class="flex justify-between h-20">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-file-invoice-dollar text-indigo-600 text-3xl mr-3"></i>
                        <span class="text-2xl font-bold gradient-text">GST Compliance Pro</span>
                    </div>
                    <div class="hidden sm:ml-8 sm:flex sm:space-x-10">
                        <a href="#home" class="border-indigo-500 text-gray-900 inline-flex items-center px-2 pt-1 border-b-2 text-base font-medium">
                            Home
                        </a>
                        <a href="#features" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-2 pt-1 border-b-2 text-base font-medium">
                            Features
                        </a>
                        <a href="#testimonials" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-2 pt-1 border-b-2 text-base font-medium">
                            Testimonials
                        </a>
                        <a href="pricing.php" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-2 pt-1 border-b-2 text-base font-medium">
                            Pricing
                        </a>
                        <a href="payment.php" class="payment-link inline-flex items-center text-base font-medium my-auto">
                            <i class="fas fa-credit-card mr-2"></i> Pay Now
                        </a>
                        <a href="contact.php" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-2 pt-1 border-b-2 text-base font-medium">
                            Contact
                        </a>
                    </div>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="login.php" class="text-gray-500 hover:text-gray-700 px-4 py-2 rounded-md text-base font-medium">Sign In</a>
                    <a href="register.php" class="bg-indigo-600 text-white px-6 py-2 rounded-md text-base font-medium hover:bg-indigo-700 transition duration-150 ease-in-out cta-button">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
        <section id="home" class="relative pt-24 pb-16 hero-gradient">
            <!-- Background Video -->
            <div class="absolute inset-0 overflow-hidden">
                <video autoplay muted loop playsinline class="w-full h-full object-cover">
                    <source src="gst.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Optional overlay for better text visibility -->
            </div>

            <!-- Content -->
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row items-center justify-between">
                    <div class="lg:w-1/2 text-white" data-aos="fade-right">
                        <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                            Simplify Your GST Compliance Journey
                        </h1>
                        <p class="text-xl mb-8 text-gray-100">
                            Automate your GST filing process with our intelligent platform. Save time, reduce errors, and ensure compliance.
                        </p>
                        <div class="flex space-x-4">
                            <a href="register.php" class="bg-indigo-600 text-white px-8 py-3 rounded-lg font-medium hover:bg-indigo-900 transition duration-150 ease-in-out cta-button">
                                Start Free Trial
                            </a>
                            <a href="#demo" class="border-2 border-white text-white px-8 py-3 rounded-lg font-medium hover:bg-white hover:text-indigo-600 transition duration-150 ease-in-out">
                                Watch Demo
                            </a>
                        </div>
                    </div>
                    <div class="lg:w-1/2 mt-12 lg:mt-0" data-aos="fade-left">
                        <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                            alt="GST Filing index" 
                            class="rounded-lg shadow-2xl floating-element">
                    </div>
                </div>
                <div class="text-center mt-16">
                    <div class="scroll-indicator text-white">
                        <i class="fas fa-chevron-down text-2xl"></i>
                    </div>
                </div>
            </div>
        </section>

    <!-- Stats Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="stat-card bg-white p-6 rounded-lg shadow-lg text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-4xl font-bold text-indigo-600 mb-2">10K+</div>
                    <div class="text-gray-600">Active Users</div>
                </div>
                <div class="stat-card bg-white p-6 rounded-lg shadow-lg text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl font-bold text-indigo-600 mb-2">99.9%</div>
                    <div class="text-gray-600">Filing Accuracy</div>
                </div>
                <div class="stat-card bg-white p-6 rounded-lg shadow-lg text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-4xl font-bold text-indigo-600 mb-2">5M+</div>
                    <div class="text-gray-600">Returns Filed</div>
                </div>
                <div class="stat-card bg-white p-6 rounded-lg shadow-lg text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-4xl font-bold text-indigo-600 mb-2">24/7</div>
                    <div class="text-gray-600">Support Available</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Integration Partners Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                    Trusted by Leading Businesses
                </h2>
                <p class="text-xl text-gray-600" data-aos="fade-up" data-aos-delay="100">
                    Seamlessly integrate with your favorite business tools
                </p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center justify-items-center" data-aos="fade-up">
                <img src="wmf-logo-2x.png" alt="Tally" class="h-20 grayscale hover:grayscale-0 transition-all duration-300">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/SAP_2011_logo.svg/2560px-SAP_2011_logo.svg.png" alt="SAP" class="h-16 grayscale hover:grayscale-0 transition-all duration-300">
                <img src="Unknown.png" alt="QuickBooks" class="h-40 grayscale hover:grayscale-0 transition-all duration-300">
                <img src="tallyfor-g-s-t-logo-y2w0ds3s5h1lt3cq-y2w0ds3s5h1lt3cq.jpg.png" alt="Zoho" class="h-14 grayscale hover:grayscale-0 transition-all duration-300">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                    Powerful Features for Your Business
                </h2>
                <p class="text-xl text-gray-600" data-aos="fade-up" data-aos-delay="100">
                    Everything you need to manage your GST compliance effectively
                </p>
            </div>
            <div class="features-grid">
                <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                    <i class="fas fa-robot feature-icon"></i>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Automated Filing</h3>
                    <p class="text-gray-600 mb-4">Automate your GST return filing process with our intelligent system.</p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Auto-populate returns
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Error validation
                        </li>
                    </ul>
                </div>
                <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-sync feature-icon"></i>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Real-time Reconciliation</h3>
                    <p class="text-gray-600 mb-4">Match your purchase and sales records in real-time.</p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Instant matching
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Discrepancy alerts
                        </li>
                    </ul>
                </div>
                <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                    <i class="fas fa-chart-line feature-icon"></i>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Analytics index</h3>
                    <p class="text-gray-600 mb-4">Get insights into your business with our powerful analytics tools.</p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Custom reports
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Data visualization
                        </li>
                    </ul>
                </div>
                <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
                    <i class="fas fa-shield-alt feature-icon"></i>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Data Security</h3>
                    <p class="text-gray-600 mb-4">Enterprise-grade security for your sensitive data.</p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            256-bit encryption
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Regular backups
                        </li>
                    </ul>
                </div>
                <div class="feature-item" data-aos="fade-up" data-aos-delay="500">
                    <i class="fas fa-users feature-icon"></i>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Multi-user Access</h3>
                    <p class="text-gray-600 mb-4">Collaborate with your team seamlessly.</p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Role-based access
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Activity tracking
                        </li>
                    </ul>
                </div>
                <div class="feature-item" data-aos="fade-up" data-aos-delay="600">
                    <i class="fas fa-mobile-alt feature-icon"></i>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Mobile Access</h3>
                    <p class="text-gray-600 mb-4">Manage GST compliance on the go.</p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            iOS & Android apps
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Real-time notifications
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Compliance Updates Section -->
    <section class="py-16 bg-gradient-to-br from-indigo-50 to-purple-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                    Stay Compliant with Latest Updates
                </h2>
                <p class="text-xl text-gray-600" data-aos="fade-up" data-aos-delay="100">
                    We keep you informed about the latest GST regulations and changes
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-sm text-indigo-600 mb-2">Latest Update</div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">GST Council Meeting Highlights</h3>
                    <p class="text-gray-600 mb-4">Key decisions and changes announced in the recent GST council meeting.</p>
                    <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium inline-flex items-center">
                        Read More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-sm text-indigo-600 mb-2">Compliance Alert</div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">New E-invoicing Guidelines</h3>
                    <p class="text-gray-600 mb-4">Updated guidelines for e-invoicing implementation and compliance.</p>
                    <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium inline-flex items-center">
                        Read More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-sm text-indigo-600 mb-2">Tax Calendar</div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Upcoming Due Dates</h3>
                    <p class="text-gray-600 mb-4">Important GST return filing and payment deadlines for this month.</p>
                    <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium inline-flex items-center">
                        View Calendar <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Resources Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                    Free Resources
                </h2>
                <p class="text-xl text-gray-600" data-aos="fade-up" data-aos-delay="100">
                    Everything you need to understand GST compliance
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-book text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">GST Guide</h3>
                    <p class="text-gray-600">Comprehensive guide for businesses</p>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-video text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Video Tutorials</h3>
                    <p class="text-gray-600">Step-by-step filing guides</p>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calculator text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">GST Calculator</h3>
                    <p class="text-gray-600">Calculate your tax liability</p>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-file-alt text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Templates</h3>
                    <p class="text-gray-600">Ready-to-use document templates</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                    Why Choose GST Compliance Pro?
                </h2>
                <p class="text-xl text-gray-600" data-aos="fade-up" data-aos-delay="100">
                    The most trusted GST compliance solution in India
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-indigo-600 text-4xl mb-4">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">100% Secure</h3>
                    <p class="text-gray-600">Bank-grade security with 256-bit encryption and ISO 27001 certification.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-indigo-600 text-4xl mb-4">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Expert Support</h3>
                    <p class="text-gray-600">Dedicated support team of CA and tax experts available 24/7.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-indigo-600 text-4xl mb-4">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Cloud-Based</h3>
                    <p class="text-gray-600">Access your data anytime, anywhere with our cloud infrastructure.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mobile App Section -->
    <section class="py-16 bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <div class="lg:w-1/2 mb-8 lg:mb-0" data-aos="fade-right">
                    <h2 class="text-3xl font-bold mb-4">GST Compliance Pro Mobile App</h2>
                    <p class="text-xl mb-8">Manage your GST compliance on the go with our mobile app.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="flex items-center bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-900 transition duration-300">
                            <i class="fab fa-apple text-2xl mr-2"></i>
                            <div>
                                <div class="text-xs">Download on the</div>
                                <div class="text-sm font-semibold">App Store</div>
                            </div>
                        </a>
                        <a href="#" class="flex items-center bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-900 transition duration-300">
                            <i class="fab fa-google-play text-2xl mr-2"></i>
                            <div>
                                <div class="text-xs">Get it on</div>
                                <div class="text-sm font-semibold">Google Play</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="lg:w-1/2" data-aos="fade-left">
                    <img src="App.jpg" 
                         alt="Mobile App" 
                         class="max-w-sm mx-auto floating-element">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                    What Our Clients Say
                </h2>
                <p class="text-xl text-gray-600" data-aos="fade-up" data-aos-delay="100">
                    Trusted by thousands of businesses across India
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="testimonial-card bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Client" class="w-12 h-12 rounded-full">
                        <div class="ml-4">
                            <div class="font-bold text-gray-900">Rajesh Kumar</div>
                            <div class="text-gray-600">Small Business Owner</div>
                        </div>
                    </div>
                    <p class="text-gray-600">"GST Compliance Pro has simplified our tax filing process. The automation features save us hours every month."</p>
                </div>
                <div class="testimonial-card bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/1.jpg" alt="Client" class="w-12 h-12 rounded-full">
                        <div class="ml-4">
                            <div class="font-bold text-gray-900">Priya Sharma</div>
                            <div class="text-gray-600">CFO, Tech Solutions</div>
                        </div>
                    </div>
                    <p class="text-gray-600">"The real-time reconciliation feature is a game-changer. We can spot and fix discrepancies instantly."</p>
                </div>
                <div class="testimonial-card bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="400">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/2.jpg" alt="Client" class="w-12 h-12 rounded-full">
                        <div class="ml-4">
                            <div class="font-bold text-gray-900">Amit Patel</div>
                            <div class="text-gray-600">Director, Retail Chain</div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Excellent customer support and regular updates keep us compliant with the latest GST regulations."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-8" data-aos="fade-up">
                Ready to Simplify Your GST Compliance?
            </h2>
            <div class="flex justify-center space-x-4" data-aos="fade-up" data-aos-delay="100">
                <a href="register.php" class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-medium hover:bg-gray-100 transition duration-150 ease-in-out cta-button">
                    Start Free Trial
                </a>
                <a href="contact.php" class="border-2 border-white text-white px-8 py-3 rounded-lg font-medium hover:bg-white hover:text-indigo-600 transition duration-150 ease-in-out">
                    Contact Sales
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">About Us</h3>
                    <p class="text-gray-400">Simplifying GST compliance for businesses across India with innovative technology solutions.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#features" class="text-gray-400 hover:text-white">Features</a></li>
                        <li><a href="pricing.php" class="text-gray-400 hover:text-white">Pricing</a></li>
                        <li><a href="#testimonials" class="text-gray-400 hover:text-white">Testimonials</a></li>
                        <li><a href="contact.php" class="text-gray-400 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><i class="fas fa-phone mr-2"></i> +91 (800) 123-4567</li>
                        <li><i class="fas fa-envelope mr-2"></i> support@gstpro.com</li>
                        <li><i class="fas fa-map-marker-alt mr-2"></i> Mumbai, India</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram text-xl"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 GST Compliance Pro. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Add Chat Widget -->
    <!-- <div class="chat-widget">
        <div class="chat-button" id="chatButton">
            <i class="fas fa-comments text-2xl"></i>
            <span class="notification-badge">1</span>
        </div>
    </div> -->

    <!-- Add Scroll to Top Button -->
    <div class="scroll-to-top" id="scrollToTop">
        <i class="fas fa-arrow-up"></i>
    </div>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('shadow-lg');
            } else {
                nav.classList.remove('shadow-lg');
            }
        });

        // Counter animation for stats
        const stats = document.querySelectorAll('.stat-card');
        const observerOptions = {
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-stats');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        stats.forEach(stat => observer.observe(stat));

        // Chat Widget
        // const chatButton = document.getElementById('chatButton');
        // chatButton.addEventListener('click', function() {
        //     alert('Chat support will be available soon!');
        //     chatButton.querySelector('.notification-badge').style.display = 'none';
        // });

        // Scroll to Top
        const scrollToTop = document.getElementById('scrollToTop');
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollToTop.classList.add('visible');
            } else {
                scrollToTop.classList.remove('visible');
            }
        });

        scrollToTop.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Enhanced Stats Animation
        function animateValue(element, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                const value = Math.floor(progress * (end - start) + start);
                element.textContent = value + (element.dataset.suffix || '');
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        const statElements = document.querySelectorAll('.stat-card .text-4xl');
        const observerStats = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    const endValue = parseInt(element.textContent);
                    element.textContent = '0';
                    animateValue(element, 0, endValue, 2000);
                    observerStats.unobserve(element);
                }
            });
        }, { threshold: 0.5 });

        statElements.forEach(stat => observerStats.observe(stat));
    </script>
    <div id="chatButton">
    <script src="//code.tidio.co/2jhcnur9otz8szn0pcq0irx2dk7cg5b5.js" async></script>
  </div>
</body>
</html>