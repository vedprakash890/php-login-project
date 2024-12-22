<?php
require_once '../DB/DbConnect.php'; // Include the file
use Lallu\DB\DbConnect;
class Register {
    private $db;

    public function __construct() {
        $dbConnect = new DbConnect(); 
        $this->db = $dbConnect->getConnection();
    }

    public function registerUser($data) {

     
        // Input sanitization
        $fname = $this->db->real_escape_string($data['fname']);
        $lname = $this->db->real_escape_string($data['lname']);
        $email = $this->db->real_escape_string($data['email']);
        $phone = $this->db->real_escape_string($data['phone']);
        $dob = $this->db->real_escape_string($data['dob']);
        $Password = $this->db->real_escape_string($data['Password']); 
        
        // File upload logic
  

        // SQL qery to insert data
        $query = "INSERT INTO users (first_name, last_name, email, phone, dob, Password) 
                  VALUES ('$fname', '$lname', '$email', '$phone', '$dob','$Password')";

        if ($this->db->query($query)) {
            return "Registration successful!";
        } else {
            return "Error: " . $this->db->error;
        }
    }

    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = $id";
        $result = $this->db->query($query);
    
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc(); 
        }

    }

    public function updateUser($id, $data) {

        $firstName = $this->db->real_escape_string($data['fname']);
        $lastName = $this->db->real_escape_string($data['lname']);
        $email = $this->db->real_escape_string($data['email']);
        $phone = $this->db->real_escape_string($data['phone']);
        $dob = $this->db->real_escape_string($data['dob']);

        $query = "UPDATE users 
                  SET first_name = '$firstName', 
                      last_name = '$lastName', 
                      email = '$email', 
                      phone = '$phone', 
                      dob = '$dob',
                  WHERE id = $id";
    
       
        if ($this->db->query($query)) {
            return true;
        } else {
            return "Error: " . $this->db->error; 
        }
    }
    
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $register = new Register();
    if ($_POST['userId']) {
        $userId = $_POST['userId'];
        $data = [
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'dob' => $_POST['dob'],
            'Password' => $_POST['Password']
        ];
        $result = $register->updateUser($userId, $data);
        if ($result === true) {
            header("Location: ../User/success.php?success=updated"); 
            exit();
        } else {
            echo $result;  
        }
    }
    else{
        $register->registerUser($_POST);
    }

   
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    if ($userId) {
        header("Location: ../User/edit.php?id=" . $userId);
        exit();
    } else {
        echo "User not found.";
    }
}
?>
