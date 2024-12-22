<?php

require_once '../DB/DbConnect.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Auth/login.php");
    exit(); 
}
$dbConnect = new Lallu\DB\DbConnect();
$conn = $dbConnect->getConnection();
$query = "SELECT * FROM users";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Start HTML table and fetch rows
    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
} else {
    $users = [];
}

$conn->close();



if (isset($_POST['logout'])) {
    session_unset();  // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: ../Auth/login.php");  // Redirect to login page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <link rel="stylesheet" href="../Assets/style.css">
</head>
<body>
    <div class="table"> 
    <form method="POST" action="">
            <button type="submit" name="logout" class="logout-btn">Logout</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php if (count($users) > 0): ?>
                    <?php foreach ($users as $index => $user): ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['phone']); ?></td>
                            <td>
                            <a href="../Controller/RegisterController.php?id=<?php echo htmlspecialchars($user['id']); ?>" class="edit-btn">Edit</a>
                            <a href="" class="delete-btn">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
