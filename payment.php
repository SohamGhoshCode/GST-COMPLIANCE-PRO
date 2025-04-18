<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'project');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission from pricing.php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['plan']) && isset($_POST['amount'])) {
    // Retrieve the plan and amount from the POST request
    $plan = $_POST['plan'];
    $amount = $_POST['amount'];

    // Store the plan and amount in session for use in the payment summary
    $_SESSION['selected_plan'] = $plan;
    $_SESSION['selected_amount'] = $amount;
}

// Handle Razorpay payment response
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['razorpay_payment_id'])) {
    $user_id = $_SESSION['user_id'];
    $plan = $_SESSION['selected_plan'];
    $amount = $_SESSION['selected_amount'];
    $payment_id = $_POST['razorpay_payment_id'];
    $payment_status = 'success';

    // Insert payment details into the database
    $stmt = $conn->prepare("INSERT INTO payments (user_id, plan, amount, payment_id, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isiss", $user_id, $plan, $amount, $payment_id, $payment_status);

    if ($stmt->execute()) {
        // Payment successful
        $_SESSION['payment_success'] = "Payment successful! Your subscription is now active.";
        $stmt->close();
        header("Location: success.php");
        exit();
    } else {
        // Payment failed
        $_SESSION['payment_error'] = "Failed to record payment. Please contact support.";
        $stmt->close();
        header("Location: payment.php");
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment | GST Compliance Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
        /* Add your styles here */
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
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
                        <a href="contact.php" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Contact
                        </a>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="logout.php" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Notification -->
    <?php if (isset($_SESSION['payment_error'])): ?>
        <div class="notification error">
            <?= htmlspecialchars($_SESSION['payment_error']); ?>
            <?php unset($_SESSION['payment_error']); ?>
        </div>
    <?php endif; ?>

    <!-- Payment Section -->
    <div class="min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Payment Summary -->
            <div id="paymentSummary" class="payment-section">
                <div class="max-w-md mx-auto">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Payment Summary</h2>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Plan</span>
                                <span class="font-medium" id="summaryPlan"><?= htmlspecialchars($_SESSION['selected_plan'] ?? 'N/A'); ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Amount</span>
                                <span class="font-medium" id="summaryAmount">₹<?= htmlspecialchars($_SESSION['selected_amount'] ?? '0'); ?></span>
                            </div>
                            <div class="border-t pt-4">
                                <div class="flex justify-between">
                                    <span class="font-medium">Total</span>
                                    <span class="font-bold text-indigo-600" id="summaryTotal">₹<?= htmlspecialchars($_SESSION['selected_amount'] ?? '0'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 space-y-4">
                            <button onclick="initiatePayment()" class="w-full bg-indigo-600 text-white rounded-md py-3 px-4 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                Pay Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentAmount = <?= $_SESSION['selected_amount'] ?? 0; ?>; // Amount from session
        let currentPlan = '<?= $_SESSION['selected_plan'] ?? 'N/A'; ?>'; // Plan from session

        function initiatePayment() {
            const options = {
                key: 'rzp_test_NK1pYzPsoyInkd', // Replace with your Razorpay API key
                amount: currentAmount * 100,
                currency: 'INR',
                name: 'GST Compliance Pro',
                description: currentPlan + ' Subscription',
                handler: function(response) {
                    // Submit the payment details to the server
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'payment.php';

                    const paymentIdInput = document.createElement('input');
                    paymentIdInput.type = 'hidden';
                    paymentIdInput.name = 'Soham_payment_id';
                    paymentIdInput.value = response.razorpay_payment_id;

                    const planInput = document.createElement('input');
                    planInput.type = 'hidden';
                    planInput.name = 'plan';
                    planInput.value = currentPlan;

                    const amountInput = document.createElement('input');
                    amountInput.type = 'hidden';
                    amountInput.name = 'amount';
                    amountInput.value = currentAmount;

                    form.appendChild(paymentIdInput);
                    form.appendChild(planInput);
                    form.appendChild(amountInput);

                    document.body.appendChild(form);
                    form.submit();
                },
                prefill: {
                    name: '<?= $_SESSION['user_name'] ?? '' ?>',
                    email: '<?= $_SESSION['user_email'] ?? '' ?>',
                },
                theme: {
                    color: '#4F46E5'
                }
            };

            const rzp = new Razorpay(options);
            rzp.open();
        }
    </script>
</body>
</html>