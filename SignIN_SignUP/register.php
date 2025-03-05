<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap');
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background: #1e1e2f;
            color: #f3f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 10px; /* Added padding for small screens */
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 90vh;
            width: 100%; /* Adjusted width for mobile */
            max-width: 1200px;
        }
        .box {
            background: #292b3b;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            color: #f3f4f7;
            width: 100%; /* Adjusted width for mobile */
            max-width: 450px; /* Maintain a reasonable max width */
        }
        .form-box header {
            font-size: 25px;
            font-weight: 600;
            padding-bottom: 10px;
            border-bottom: 1px solid #3c3f54;
            color: #42d1f5;
        }
        .form-box form .field {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
            padding-top: 10px;
        }
        .form-box form .input input {
            height: 40px;
            width: 100%;
            font-size: 16px;
            padding: 0 10px;
            border-radius: 5px;
            border: 1px solid #555;
            outline: none;
            background: #2e2f47;
            color: #e0e0e0;
        }
        .btn {
            height: 40px;
            background-color: #ff7f50;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #ff5733;
        }
        .submit {
            width: 100%;
        }
        .links {
            margin-top: 15px;
            text-align: center;
        }
        .links a {
            color: #7ad0f5;
            text-decoration: none;
            transition: color 0.3s;
        }
        .links a:hover {
            color: #42d1f5;
        }
        .message {
            text-align: center;
            background: #f9eded;
            padding: 15px;
            border: 1px solid #d67d7d;
            border-radius: 5px;
            margin-bottom: 10px;
            color: #d67d7d;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .container {
                width: 100%;
            }
            .box {
                padding: 15px; /* Reduce padding for smaller screens */
                border-radius: 10px;
            }
            .form-box header {
                font-size: 20px; /* Smaller font size for header */
            }
            .btn {
                height: 35px; /* Smaller button height */
                font-size: 14px;
            }
            .form-box form .input input {
                font-size: 14px; /* Adjust font size for inputs */
            }
        }

        @media (max-width: 480px) {
            .form-box header {
                font-size: 18px; /* Further reduce font size for very small screens */
            }
            .btn {
                font-size: 13px;
                height: 30px;
            }
            .form-box form .input input {
                padding: 0 8px; /* Reduce padding for inputs */
                font-size: 13px;
            }
        }
    </style>
    <script>
        function validateEmail(email) {
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(email);
        }

        function validateForm() {
            const name = document.getElementById('Name').value;
            const email = document.getElementById('Email').value;
            const password = document.getElementById('password').value;

            if (name.trim() === '' || !validateEmail(email) || password.trim() === '') {
                alert('Please enter valid information in all fields.');
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
            include('php/config.php');
            if (isset($_POST['submit'])) {
                $username = $_POST['Name'];
                $email = $_POST['Email'];
                $password = $_POST['password'];

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<div class='message'>
                          <p>Please enter a valid email address.</p>
                          </div>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                } else {
                    $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");
                    if (mysqli_num_rows($verify_query) != 0) {
                        echo "<div class='message'>
                              <p>This email is used. Try another one, please!</p>
                              </div>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    } else {
                        mysqli_query($con, "INSERT INTO users(User_Name, Email, Password) VALUES('$username', '$email', '$password')") or die("Error!");
                        echo "<div class='message'>
                              <p>Registration Successfully!</p>
                              </div>";
                        echo "<a href='../index.php'><button class='btn'>Login</button>";
                    }
                }
            } else {
            ?>
            <header>Sign Up</header>
            <form action="" method="post" onsubmit="return validateForm()">
                <div class="field input">
                    <label for="Name">Name</label>
                    <input type="text" name="Name" id="Name" required>
                </div>
                <div class="field input">
                    <label for="Email">Email</label>
                    <input type="text" name="Email" id="Email" required>
                </div>
                <div class="field input">
                    <label for="password_1">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field input">
                    <label for="password_2">Confirm password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Create">
                </div>
                <div class="links">
                    Already have an account? <a href="Login.php">Log In</a>
                </div>
            </form>
            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
