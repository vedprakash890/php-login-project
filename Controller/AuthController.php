<?php
session_start();
require_once '../DB/DbConnect.php';
use Lallu\DB\DbConnect;

class AuthController {
    private $db;

    public function __construct() {
        $dbConnect = new DbConnect(); 
        $this->db = $dbConnect->getConnection();
    }

    public function Login($data) {
        // Prepare and execute the query to check the email
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $data['email']);
        $stmt->execute();
        $result = $stmt->get_result();
    
        // If email exists, check password
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc(); 
            
            // Verify the hashed password
            if ($data['password'] ==  $user['Password']) {
                // Login success, set session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                return "Login successful!";
            } else {
                return "Incorrect password.";
            }
        } else {
            // Email not found
            return "Email address not found.";
        }
    }
}

// Check if the form is submitted and handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $data = [
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ];

    // Initialize the login controller
    $login = new AuthController();
    
    // Call the Login function
    $response = $login->Login($data);
    
    // Check if login was successful
    if ($response == "Login successful!") {
        // Redirect to success page after successful login
        header("Location: ../User/user.php"); 
        exit();
    } else {
        // If login failed, display the error message
        echo $response;  
    }
}
?>
