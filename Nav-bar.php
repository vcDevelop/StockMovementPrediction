<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock-Predictor</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            font-family: "Poppins", sans-serif;
        }

        body {
            margin: 0;
            display: block;
            background-color: #f9f9f9;
        }

        header {
            background: #333;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
            position: relative;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 26px;
            font-weight: bold;
            color: #fff;
        }

        nav {
            display: flex;
            align-items: center;
        }

        nav ul {
            display: flex;
            gap: 30px;
        }

        nav li {
            margin: 0;
        }

        nav a {
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 1em;
            transition: 0.3s ease;
        }

        nav a:hover {
            background-color: #007bff;
            color: #fff;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
        }

        .logout-form {
            margin: 0;
            display: flex;
            align-items: center;
        }

        .logout-btn {
            background-color: #f44336;
            padding: 10px 20px;
            border-radius: 5px;
            transition: 0.3s;
            border: none;
            color: #fff;
            cursor: pointer;
            font-weight: 600;
        }

        .logout-btn:hover {
            background-color: #ff6659;
        }

        .logout-btn:focus {
            outline: none;
        }

        /* Hamburger Menu */
        #nav_check {
            display: none;
        }

        #nav_check:checked~nav ul {
            display: block;
            position: absolute;
            top: 60px;
            left: 0;
            right: 0;
            background-color: #333;
            text-align: center;
            padding: 20px 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        #nav_check:checked~nav ul li {
            margin: 10px 0;
        }

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
            background-color: transparent;
            border: none;
        }

        .hamburger span {
            width: 30px;
            height: 4px;
            background-color: #fff;
            border-radius: 5px;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .hamburger {
                display: flex;
            }

            nav ul {
                display: none;
                flex-direction: column;
                gap: 0;
                width: 100%;
                text-align: center;
                padding: 0;
            }

            nav ul li {
                margin: 10px 0;
            }

            .logout-form {
                display: none;
            }
        }

    </style>
</head>

<body>
    <header>
        <div class="logo">
            <?php echo "Welcome " . $_SESSION['username'] ?>
        </div>
        <input type="checkbox" id="nav_check" hidden>
        <label for="nav_check" class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </label>
        <nav>
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="searchbox\SearchBox.html">Search</a></li>
                <li><a href="About.php">About</a></li>
                <li><a href="portfolio.php">Watchlist</a></li>
            </ul>
            <form action="index.php" class="logout-form">
                <button id="logout" type="submit" class="logout-btn">Logout</button>
            </form>
        </nav>
    </header>
</body>

</html>
