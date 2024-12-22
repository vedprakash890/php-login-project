<?php
require_once '../DB/DbConnect.php'; 
use Lallu\DB\DbConnect;

$dbConnect = new DbConnect();
$connection = $dbConnect->getConnection(); 

$userID = $_GET['id'];
$query = "SELECT * FROM users WHERE id = $userID";
$result = $connection->query($query);
$userData = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form <?php echo $userData['first_name'] . ' ' . $userData['last_name']; ?></title>
    <link rel="stylesheet" href="../Assets/style2.css">
</head>
<body>
    <form action="../Controller/RegisterController.php" method="post" enctype="multipart/form-data" >
        <div  class="form-content"> 
            <h1 class="title">Edit Form <?php echo $userData['first_name'] . ' ' . $userData['last_name']; ?>  </h1>
            <input type="hidden" name="userId" value="<?php echo $userData['id']  ?>">
            <!-- Name -->
            <div class="input-main">
                <div  class="input-inside">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" value="<?php echo $userData['first_name']  ?>">
                </div>

                <div class="input-inside2">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" value="<?php echo $userData['last_name']  ?>">
                </div>
            </div>
            
            <!--Email or phone-->
            <div class="input-main">
                <div  class="input-inside">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="<?php echo $userData['email']  ?>">
                </div>

                <div class="input-inside2">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo $userData['phone']  ?>">
                </div>
            </div>

             <!--Date or File-->
             <div class="input-main">
                <div  class="input-inside">
                    <label for="date">Enter DOB</label>
                    <input type="date" id="date" name="dob" value="<?php echo $userData['dob']  ?>">
                </div>

                <!-- <div class="input-inside2">
                <label for="file">Upload Profile Picture</label>
                <input type="file" id="file" name="profile" required>
                </div> -->
            </div>


            <div class="register-btn">
                <button type="submit" class="Register"> Update</button>
            </div>
        </div>
    </form>
</body>
</html>