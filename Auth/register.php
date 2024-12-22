<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Assets/style2.css">
</head>
<body>
    <form action="../Controller/RegisterController.php" method="post" enctype="multipart/form-data" >
        <div  class="form-content"> 
            <h1 class="title">Register Form </h1>

            <!-- Name -->
            <div class="input-main">
                <div  class="input-inside">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="fname">
                </div>

                <div class="input-inside2">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname">
                </div>
            </div>
            
            <!--Email or phone-->
            <div class="input-main">
                <div  class="input-inside">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email">
                </div>

                <div class="input-inside2">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone">
                </div>
            </div>

             <!--Date or File-->
             <div class="input-main">
                <div  class="input-inside">
                    <label for="date">Enter DOB</label>
                    <input type="date" id="date" name="dob">
                </div>

                
                <div class="input-inside2">
                    <label for="Password">Password</label>
                    <input type="Password" id="Password" name="Password">
                </div>
                
            </div>

            <div class="input-inside2">
                <label for="file">Upload Profile Picture</label>
                <input type="file" id="file" name="profile" required>
            </div>

            


            <div class="register-btn">
                <button type="submit" class="Register"> Register</button>
            </div>

            <div>
                <p>Have a member? <a href="#">Login Now</a></p>
            </div>
        </div>
    </form>
</body>
</html>