
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | GST Compliance Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .contact-gradient {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
        }
    </style>
</head>
<body class="font-sans antialiased">
    <?php
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = htmlspecialchars($_POST['full-name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $message = htmlspecialchars($_POST['message']);

        // Validate inputs
        if (!empty($name) && !empty($email) && !empty($message)) {
            // Save to database or send email (example code below)
            $to = "support@gstcompliancepro.com";
            $subject = "New Contact Form Submission";
            $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message";
            $headers = "From: $email";

            if (mail($to, $subject, $body, $headers)) {
                $successMessage = "Thank you for your message. We will get back to you soon!";
            } else {
                $errorMessage = "There was an error sending your message. Please try again later.";
            }
        } else {
            $errorMessage = "Please fill in all required fields.";
        }
    }
    ?>

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
                        <a href="index.php" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Home
                        </a>
                        <a href="features.php" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Features
                        </a>
                        <a href="pricing.php" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Pricing
                        </a>
                        <a href="contact.php" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Contact
                        </a>
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <a href="login.php" class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50">
                        Login
                    </a>
                    <a href="register.php" class="ml-4 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contact Header -->
    <div class="contact-gradient">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
                    Get in Touch
                </h1>
                <p class="mt-5 text-xl text-gray-500">
                    We're here to help with your GST compliance needs
                </p>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="relative bg-white">
        <div class="absolute inset-0">
            <div class="absolute inset-y-0 left-0 w-1/2 bg-gray-50"></div>
        </div>
        <div class="relative max-w-7xl mx-auto lg:grid lg:grid-cols-5">
            <div class="bg-gray-50 py-16 px-4 sm:px-6 lg:col-span-2 lg:px-8 lg:py-24 xl:pr-12">
                <div class="max-w-lg mx-auto">
                    <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                        Contact Information
                    </h2>
                    <p class="mt-3 text-lg leading-6 text-gray-500">
                        Get in touch with us through any of these channels:
                    </p>
                    <dl class="mt-8 text-base text-gray-500">
                        <div class="mt-6">
                            <dt class="sr-only">Physical address</dt>
                            <dd class="flex">
                                <i class="fas fa-map-marker-alt flex-shrink-0 h-6 w-6 text-gray-400"></i>
                                <span class="ml-3">
                                    123 Business Avenue<br>
                                    Mumbai, Maharashtra 400001<br>
                                    India
                                </span>
                            </dd>
                        </div>
                        <div class="mt-3">
                            <dt class="sr-only">Phone number</dt>
                            <dd class="flex">
                                <i class="fas fa-phone flex-shrink-0 h-6 w-6 text-gray-400"></i>
                                <span class="ml-3">
                                    +91 (800) 123-4567
                                </span>
                            </dd>
                        </div>
                        <div class="mt-3">
                            <dt class="sr-only">Email</dt>
                            <dd class="flex">
                                <i class="fas fa-envelope flex-shrink-0 h-6 w-6 text-gray-400"></i>
                                <span class="ml-3">
                                    support@gstcompliancepro.com
                                </span>
                            </dd>
                        </div>
                    </dl>
                    <p class="mt-6 text-base text-gray-500">
                        Looking for careers?
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                            View our job openings
                        </a>
                    </p>
                </div>
            </div>
            <div class="bg-white py-16 px-4 sm:px-6 lg:col-span-3 lg:py-24 lg:px-8 xl:pl-12">
                <div class="max-w-lg mx-auto lg:max-w-none">
                    <?php if (isset($successMessage)): ?>
                        <div class="mb-4 p-4 text-green-700 bg-green-100 rounded-lg">
                            <?php echo $successMessage; ?>
                        </div>
                    <?php elseif (isset($errorMessage)): ?>
                        <div class="mb-4 p-4 text-red-700 bg-red-100 rounded-lg">
                            <?php echo $errorMessage; ?>
                        </div>
                    <?php endif; ?>
                    <form action="contact.php" method="POST" class="grid grid-cols-1 gap-y-6">
                        <div>
                            <label for="full-name" class="sr-only">Full name</label>
                            <input type="text" name="full-name" id="full-name" autocomplete="name" class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" placeholder="Full name" required>
                        </div>
                        <div>
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" autocomplete="email" class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" placeholder="Email" required>
                        </div>
                        <div>
                            <label for="phone" class="sr-only">Phone</label>
                            <input type="tel" name="phone" id="phone" autocomplete="tel" class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" placeholder="Phone">
                        </div>
                        <div>
                            <label for="message" class="sr-only">Message</label>
                            <textarea id="message" name="message" rows="4" class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" placeholder="Message" required></textarea>
                        </div>
                        <div>
                            <button type="submit" class="inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Send Message
                            </button>
                        </div>
                    </form>
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
                    &copy; 2024 GST Compliance Pro. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>