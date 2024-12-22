<<?php
// Success message to be displayed when the user is redirected after a successful update
if (isset($_GET['success']) && $_GET['success'] === 'updated') {
    $message = "User details updated successfully!";
} else {
    $message = "An error occurred, please try again.";
}
?>

<!DOCTYPE html>
<html lang="en">
    <style>
        /* Success Page Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.success-message {
    background-color: #28a745;
    color: white;
    padding: 20px 30px;
    border-radius: 10px;
    text-align: center;
    width: 400px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.success-message h1 {
    margin: 0;
    font-size: 24px;
    font-weight: bold;
}

.go-back-btn {
    display: inline-block;
    margin-top: 20px;
    background-color: white;
    color: #28a745;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

.go-back-btn:hover {
    background-color: #f0f0f0;
    color: #218838;
}

    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Success</title>
    <link rel="stylesheet" href="success.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="success-message">
        <h1><?php echo $message; ?></h1>
        <a href="../User/user.php" class="go-back-btn">Go Back to User List</a>
    </div>
</body>
</html>
