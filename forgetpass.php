<?php
session_start();
$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $old_password = trim($_POST['old-password']);
    $new_password = trim($_POST['new-password']);
    $confirm_password = trim($_POST['confirm-password']);

    // Validate inputs
    if (empty($email) || empty($old_password) || empty($new_password) || empty($confirm_password)) {
        $error_message = 'Please fill in all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Please enter a valid email address.';
    } elseif ($new_password !== $confirm_password) {
        $error_message = 'New passwords do not match.';
    } elseif (strlen($new_password) < 8) {
        $error_message = 'New password must be at least 8 characters long.';
    } else {
        // Connect to the database
        $conn = new mysqli('localhost', 'root', '', 'project');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch the current password hash from the database using the email
        $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashed_password);
            $stmt->fetch();

            // Verify the old password
            if (password_verify($old_password, $hashed_password)) {
                // Hash the new password
                $new_hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

                // Update the password in the database
                $stmt->close();
                $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
                $stmt->bind_param("ss", $new_hashed_password, $email);

                if ($stmt->execute()) {
                    $success_message = 'Your password has been updated successfully.';
                } else {
                    $error_message = 'An error occurred. Please try again later.';
                }
            } else {
                $error_message = 'Your old password is incorrect.';
            }
        } else {
            $error_message = 'No account found with that email address.';
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password | GST Compliance Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('gst.jpg'); /* Replace with your image path */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .backdrop-blur {
            background-color: rgba(255, 255, 255, 0.85); /* Semi-transparent white overlay */
            backdrop-filter: blur(8px); /* Adds blur effect */
            -webkit-backdrop-filter: blur(8px); /* For Safari support */
        }
    </style>
</head>
<body class="font-sans antialiased min-h-screen flex flex-col">
    <div class="flex flex-1 items-center justify-left px-40">
        <div class="max-w-md w-full space-y-8 bg-white/80 backdrop-blur-xl rounded-xl shadow-lg p-8">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Change Your Password
            </h2>
            <?php if (!empty($error_message)): ?>
                <div class="mb-4 text-red-500 text-sm text-center">
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
            <?php elseif (!empty($success_message)): ?>
                <div class="mb-4 text-green-500 text-sm text-center">
                    <?php echo htmlspecialchars($success_message); ?>
                </div>
            <?php endif; ?>
            <form class="mt-8 space-y-6" method="POST" action="">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                        class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="old-password" class="block text-sm font-medium text-gray-700">Old Password</label>
                    <input id="old-password" name="old-password" type="password" autocomplete="current-password" required
                        class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="new-password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input id="new-password" name="new-password" type="password" autocomplete="new-password" required
                        class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                    <input id="confirm-password" name="confirm-password" type="password" required
                        class="appearance-none w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>