<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the account and password are set
    if (isset($_POST['account']) && isset($_POST['password'])) {
        $account = $_POST['account'];
        $password = $_POST['password'];

        // In a real application, you should validate and sanitize user input.
        // For simplicity, we are not doing it here.

        // Example hardcoded credentials (replace this with database checks)
        $validAccount = 'ss';
        $validPassword = 'ss';

        // Check if the provided credentials are valid
        if ($account === $validAccount && $password === $validPassword) {
            echo 'Login successful!<br>';
            echo '//redirect to admin page with some proof';
            header("Location: ./backstage/admin.php");
        } else {
            echo 'Invalid account or password<br>';
            echo '// may be redirect to the login page again';

        }
    } else {
        echo 'Account and password must be set';
    }
} else {
    // If the form is not submitted via POST, redirect to the login page
    header('Location: index.php');
    exit();
}
?>
