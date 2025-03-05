<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Edit Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="Home.php">Stock</p></a>
        </div>
        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="logout.php">
                <button class="btn">Log out</button>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="box form-box">
            <header>Edit Profile</header>
             <form action="" method="post">
                <div class="field input">
                     <label for="Name">Name</label>
                     <input type="text" name="username" id="username" required>
                </div>
                <div class="field input">
                    <label for="Email">Email</label>
                    <input type="text" name="username" id="username" required>
               </div>
                <div class="field input">
                    <label for="password_1">Password</label>
                    <input type="text" name="password" id="password" required>
               </div>
               <div class="field input">
                <label for="password_2">Confirm password</label>
                <input type="text" name="password" id="password" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Update" required>
               </div>
             </form>
        </div>
    </div>
</body>
</html>