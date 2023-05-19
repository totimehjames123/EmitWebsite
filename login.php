<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Into Your Account</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="items">
            <form action="login_remarks.php" class="login" method="post">
                <h1>Log Into Your Account</h1>
                <input type="tel" placeholder="Enter your phone number here_" name="phonenumber" id="phonenumber" required>
                <br>
                <input type="password" placeholder="Enter your password_" name="password" id="password" required>
                <br>
                <button type="submit" class="submit">Log In</button>
                <button type="reset" class="reset">Reset</button>
            </form>
            <form action="signup.php" class="signup">
                <p>OR</p>
                <p>Don't have an account?</p>
                <button type="submit">Create an Account</button>
            </form>
        </div>
    </div>
</body>
</html>