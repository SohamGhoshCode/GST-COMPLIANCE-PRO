<!-- filepath: /Users/sohamghosh4099/Desktop/Front End/Frontend Project/GST-Compliance-Pro_web/features.php -->
<?php
// Define the current page for active link highlighting
$current_page = basename($_SERVER['PHP_SELF']);
?>

<div class="hidden sm:ml-6 sm:flex sm:space-x-8">
    <a href="index.php" class="<?= $current_page == 'index.php' ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
        Home
    </a>
    <a href="features.php" class="<?= $current_page == 'features.php' ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
        Features
    </a>
    <a href="pricing.php" class="<?= $current_page == 'pricing.php' ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
        Pricing
    </a>
    <a href="contact.php" class="<?= $current_page == 'contact.php' ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' ?> inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
        Contact
    </a>
</div>