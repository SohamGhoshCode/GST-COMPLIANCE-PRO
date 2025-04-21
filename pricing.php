<!-- filepath: /Applications/XAMPP/xamppfiles/htdocs/Project/Frontend Project/GST-Compliance-Pro_web/pricing.php -->
<?php
session_start();

// Define the current page for active link highlighting
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing | GST Compliance Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .pricing-gradient {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
        }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-file-invoice-dollar text-indigo-600 text-2xl mr-2"></i>
                        <span class="text-xl font-bold text-indigo-600">GST Compliance Pro</span>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="index.php" class="<?= $current_page == 'index.php' ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Home
                        </a>
                        <a href="index.php" class="<?= $current_page == 'index.php' ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Features
                        </a>
                        <a href="pricing.php" class="<?= $current_page == 'pricing.php' ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Pricing
                        </a>
                        <a href="contact.php" class="<?= $current_page == 'contact.php' ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Contact
                        </a>
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="logout.php" class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                            Logout
                        </a>
                    <?php else: ?>
                        <a href="login.php" class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50">
                            Login
                        </a>
                        <a href="register.php" class="ml-4 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                            Register
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Pricing Header -->
    <div class="pricing-gradient">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
                    Simple, Transparent Pricing
                </h1>
                <p class="mt-5 text-xl text-gray-500">
                    Choose the perfect plan for your business needs
                </p>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Basic Plan -->
            <div class="border border-gray-200 rounded-lg shadow-sm divide-y divide-gray-200">
                <div class="p-6">
                    <h2 class="text-lg leading-6 font-medium text-gray-900">Basic</h2>
                    <p class="mt-4 text-sm text-gray-500">Perfect for small businesses just getting started with GST.</p>
                    <p class="mt-8">
                        <span class="text-4xl font-extrabold text-gray-900">₹1</span>
                        <span class="text-base font-medium text-gray-500">/month</span>
                    </p>
                    <form method="POST" action="payment.php">
                        <input type="hidden" name="plan" value="Basic">
                        <input type="hidden" name="amount" value="1">
                        <button type="submit" class="mt-8 w-full bg-indigo-600 text-white rounded-md py-2 px-4 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Get started
                        </button>
                    </form>
                </div>
                <div class="pt-6 pb-8 px-6">
                    <h3 class="text-xs font-medium text-gray-900 tracking-wide uppercase">What's included</h3>
                    <ul class="mt-6 space-y-4">
                        <li class="flex space-x-3">
                            <i class="fas fa-check text-green-500 flex-shrink-0"></i>
                            <span class="text-sm text-gray-500">Up to 100 invoices per month</span>
                        </li>
                        <li class="flex space-x-3">
                            <i class="fas fa-check text-green-500 flex-shrink-0"></i>
                            <span class="text-sm text-gray-500">Basic GST filing</span>
                        </li>
                        <li class="flex space-x-3">
                            <i class="fas fa-check text-green-500 flex-shrink-0"></i>
                            <span class="text-sm text-gray-500">Email support</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Professional Plan -->
            <div class="border border-gray-200 rounded-lg shadow-sm divide-y divide-gray-200">
                <div class="p-6">
                    <h2 class="text-lg leading-6 font-medium text-gray-900">Professional</h2>
                    <p class="mt-4 text-sm text-gray-500">For growing businesses with advanced needs.</p>
                    <p class="mt-8">
                        <span class="text-4xl font-extrabold text-gray-900">₹2,499</span>
                        <span class="text-base font-medium text-gray-500">/month</span>
                    </p>
                    <form method="POST" action="payment.php">
                        <input type="hidden" name="plan" value="Professional">
                        <input type="hidden" name="amount" value="2499">
                        <button type="submit" class="mt-8 w-full bg-indigo-600 text-white rounded-md py-2 px-4 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Get started
                        </button>
                    </form>
                </div>
                <div class="pt-6 pb-8 px-6">
                    <h3 class="text-xs font-medium text-gray-900 tracking-wide uppercase">What's included</h3>
                    <ul class="mt-6 space-y-4">
                        <li class="flex space-x-3">
                            <i class="fas fa-check text-green-500 flex-shrink-0"></i>
                            <span class="text-sm text-gray-500">Unlimited invoices</span>
                        </li>
                        <li class="flex space-x-3">
                            <i class="fas fa-check text-green-500 flex-shrink-0"></i>
                            <span class="text-sm text-gray-500">Advanced GST filing</span>
                        </li>
                        <li class="flex space-x-3">
                            <i class="fas fa-check text-green-500 flex-shrink-0"></i>
                            <span class="text-sm text-gray-500">Priority email & phone support</span>
                        </li>
                        <li class="flex space-x-3">
                            <i class="fas fa-check text-green-500 flex-shrink-0"></i>
                            <span class="text-sm text-gray-500">Real-time reconciliation</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Enterprise Plan -->
            <div class="border border-gray-200 rounded-lg shadow-sm divide-y divide-gray-200">
                <div class="p-6">
                    <h2 class="text-lg leading-6 font-medium text-gray-900">Enterprise</h2>
                    <p class="mt-4 text-sm text-gray-500">Custom solutions for large organizations.</p>
                    <p class="mt-8">
                        <span class="text-4xl font-extrabold text-gray-900">Custom</span>
                    </p>
                    <a href="contact.php" class="mt-8 w-full bg-indigo-600 text-white rounded-md py-2 px-4 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-center block">
                        Contact Sales
                    </a>
                </div>
                <div class="pt-6 pb-8 px-6">
                    <h3 class="text-xs font-medium text-gray-900 tracking-wide uppercase">What's included</h3>
                    <ul class="mt-6 space-y-4">
                        <li class="flex space-x-3">
                            <i class="fas fa-check text-green-500 flex-shrink-0"></i>
                            <span class="text-sm text-gray-500">Everything in Professional</span>
                        </li>
                        <li class="flex space-x-3">
                            <i class="fas fa-check text-green-500 flex-shrink-0"></i>
                            <span class="text-sm text-gray-500">Custom integrations</span>
                        </li>
                        <li class="flex space-x-3">
                            <i class="fas fa-check text-green-500 flex-shrink-0"></i>
                            <span class="text-sm text-gray-500">Dedicated account manager</span>
                        </li>
                        <li class="flex space-x-3">
                            <i class="fas fa-check text-green-500 flex-shrink-0"></i>
                            <span class="text-sm text-gray-500">24/7 premium support</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Product</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="features.php" class="text-base text-gray-300 hover:text-white">Features</a></li>
                        <li><a href="pricing.php" class="text-base text-gray-300 hover:text-white">Pricing</a></li>
                        <li><a href="#" class="text-base text-gray-300 hover:text-white">API</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Support</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-300 hover:text-white">Documentation</a></li>
                        <li><a href="#" class="text-base text-gray-300 hover:text-white">Guides</a></li>
                        <li><a href="contact.php" class="text-base text-gray-300 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Legal</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-300 hover:text-white">Privacy</a></li>
                        <li><a href="#" class="text-base text-gray-300 hover:text-white">Terms</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-8 md:flex md:items-center md:justify-between">
                <div class="flex space-x-6 md:order-2">
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-300">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">
                    &copy; <?= date('Y'); ?> GST Compliance Pro. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>