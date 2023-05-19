<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Account</title>
    <link rel="stylesheet" href="signup.css">
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const selectDrop = document.querySelector('#country');

            fetch('https://restcountries.com/v2/all').then(res => {
                return res.json();
            }).then(data => {
                let output = "";
                data.forEach(country => {
                    output += `<option>${country.name}</option>`;
                });
                
                selectDrop.innerHTML = output;
            }).catch(err => {
                console.log(err);
            })
        });
        
    </script>
</head>
<body>
    <div class="container">
        <div class="items">
            <form action="profile.php" method="post" enctype="multipart/form-data" class="signup">
                <h1>Create an Account</h1>
                
                <p style="color:white; margin-bottom: 0; padding-bottom: 0;">Full Name: </p>
                <input type="text" placeholder="Enter your full name here_" name="fullname" id="fullname" class="typed" required><br>

                <p style="color:white; margin-bottom: 0; padding-bottom: 0;">Email: </p>
                <input type="email" placeholder="Enter your email here_" name="email" id="email" class="typed" required><br>

                <p style="color:white; margin-bottom: 0; padding-bottom: 0;">Phone Number: </p>
                <input type="tel" placeholder="Enter your phone number" name="phonenumber" id="phonenumber" class="typed" required>

                <p style="color:white; margin-bottom: 0; padding-bottom: 0;">New Password: </p>
                <input type="password" placeholder="Enter a new password_" name="newpassword" id="newpassword" class="typed" required><br>

                <p style="color:white; margin-bottom: 0; padding-bottom: 0;">Comfirm New Password: </p>
                <input type="password" placeholder="Confirm your new password_" name="confirmpassword" id="confirmpassword" class="typed" required><br>
                <p style="color:white; margin-bottom: 0; padding-bottom: 0;">Date Of Birth: </p>
                <input type="date" name="dateOfBirth" id="dateOfBirth" class="typed"  required>

                <p style="color:white; margin-bottom: 0; padding-bottom: 0;">Country: </p>
                <select name="country" id="country" class="typed" style="height: 40px;"></select>

                <p style="color:white; margin-bottom: 0; padding-bottom: 0;">Select Your Gender: </p>
                <p>
                    <input type="radio" name="gender" id="male" class="gender" value="male" required>
                    <label for="male" name="gender">Male</label>

                    <input type="radio" name="gender" id="female" class="gender" value="female" required>
                    <label for="female" name="gender">Female</label>

                    <input type="radio" name="gender" id="other" class="gender" value="other" required>
                    <label for="other" name="gender">Other</label>
                </p>

                <p style="color:white; margin-bottom: 0; padding-bottom: 0;">Add a Profile Picture*: </p>
                <input type="file" accept="image/*" name="fileToUpload" id="fileToUpload" class="typed" style="background: white; color: black;" required>

                <br><br>
                <button type="submit" class="submit" name="submit">Sign Up</button>
                <button type="reset" class="reset">Reset</button>
            </form>
        </div>
    </div>
</body>
</html>


