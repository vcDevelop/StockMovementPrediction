<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            padding: 10px;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 90vh;
            width: 100%;
            max-width: 1200px;
        }
        .box {
            background: #292b3b;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            color: #f3f4f7;
            width: 100%;
            max-width: 450px;
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
                padding: 15px;
                border-radius: 10px;
            }
            .form-box header {
                font-size: 20px;
            }
            .btn {
                height: 35px;
                font-size: 14px;
            }
            .form-box form .input input {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .form-box header {
                font-size: 18px;
            }
            .btn {
                font-size: 13px;
                height: 30px;
            }
            .form-box form .input input {
                padding: 0 8px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
            include("php/config.php");
            if (isset($_POST['submit'])) {
                $email = mysqli_real_escape_string($con, $_POST['Email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);
                $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email' AND Password='$password'") or die("Select Error");
                $row = mysqli_fetch_assoc($result);
                if (is_array($row) && !empty($row)) {
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['User_Name'];
                    $_SESSION['password'] = $row['Password'];
                    header("Location: ../Home.php");
                } else {
                    echo "<div class='message'>
                          <p>Wrong User Name or Password!!!!</p>
                          </div>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                }
            } else {
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="Email">Email</label>
                    <input type="text" name="Email" id="Email" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login">
                </div>
                <div class="links">
                    Don't have an account? <a href="register.php">Sign up</a>
                </div>
            </form>
            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
