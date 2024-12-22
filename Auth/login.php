<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Assets/style.css">
</head>
<body>
    <form action="../Controller/AuthController.php" method="post">
        <div  class="form-content">
            <h1 class="title">Login Form </h1>
            <div  class="input-inside">
                <label for="phone">Email</label>
                <input type="text" id="phone" name="email">
            </div>

            <div class="input-inside2">
                <label for="Password">Password</label>
                <input type="Password" id="Password" name="password">
            </div>

            <div class="forget">
                <a href="#">Forget Password?</a>
            </div>

            <div>
                <button type="submit" class="login"> LOGIN</button>
            </div>

            <div>
                <p>Not a member? <a href="#">SignUp Now</a></p>
            </div>
        </div>
    </form>
</body>
</html>