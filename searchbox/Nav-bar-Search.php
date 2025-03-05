<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav-bar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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
            background: #226A80;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
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
            font-weight: bold;
            text-transform: uppercase;
            padding: 10px 15px;
            border-radius: 5px;
            transition: 0.3s;
        }

        nav a:hover {
            background-color: #f6f4ff;
            color: #226A80;
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
            background-color: #226A80;
            text-align: center;
            padding: 20px 0;
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
                gap: 10px;
                width: 100%;
                text-align: center;
                padding: 0;
            }

            nav ul li {
                margin: 10px 0;
            }
        }

    </style>
</head>

<body>
    <header>
        <div class="logo">
            <?php echo "Welcome " . $_SESSION['username']; ?>
        </div>
        <input type="checkbox" id="nav_check" hidden>
        <label for="nav_check" class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </label>
        <nav>
            <ul>
                <li><a href="../Home.php">Home</a></li>
                <li><a href="SearchBox.html">Search</a></li>
                <li><a href="../About.php">About</a></li>
                <li><a href="../portfolio.php">Watchlist</a></li>
            </ul>
        </nav>
    </header>

    <!-- Content of the page goes here -->
</body>

</html>
