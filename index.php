<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nearing Parking Lot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        header {
            background-color: #4CAF50;
            padding: 10px;
            text-align: center;
            color: white;
        }

        h1 {
            margin: 0;
        }

        .admin-button {
            float: right;
            margin-top: -40px;
            margin-right: 20px;
            padding: 10px;
            background-color: #008CBA;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        form {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
    <h1>Nearing Parking Lot</h1>
    <a href="#" class="admin-button">Sign In (Admin)</a>
</header>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the data and show results

    // Retrieve form data
    $searchTerm = $_POST["searchTerm"];

    // Generate search results based on the search term
    $searchResults = generateSearchResults($searchTerm);

    // Display the results
    echo "<h2>Search Results for '$searchTerm'</h2>";
    echo $searchResults;
} else {
    // Show the search form
    echo "<h2>Search Form</h2>";
    echo "<form action='index.php' method='post'>";
    echo "  <label for='searchTerm'>Enter search term:</label>";
    echo "  <input type='text' id='searchTerm' name='searchTerm' required>";
    echo "  <br>";
    echo "  <input type='submit' value='Search'>";
    echo "</form>";
}

// Function to generate search results based on the search term
function generateSearchResults($searchTerm) {
    // You can customize this function to generate dynamic search results
    // For now, let's just return a simple message
    return "<p>Search results for '$searchTerm' are displayed here.</p>";
}
?>
</body>
</html>
