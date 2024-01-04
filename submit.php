<!-- submit.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];

    // Do something with the data (for example, print it)
    echo "Submitted data:\n";
    echo "Username: $username\n";
    echo "Email: $email\n";
} else {
    // Handle the case when the form is not submitted via POST
    echo "Form not submitted!";
}
?>
