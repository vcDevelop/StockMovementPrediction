<?php
session_start();
require_once('Nav-bar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            padding: 40px 20px;
            justify-items: center;
            justify-content: center; /* Ensures center alignment of the grid */
        }

        .card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            max-width: 350px;
            width: 100%;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .card img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid #4285f4;
        }

        .card h2 {
            font-size: 22px;
            color: #333;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 16px;
            color: #777;
            margin-bottom: 20px;
        }

        .contact a {
            display: inline-block;
            margin-top: 10px;
            font-size: 14px;
            color: #4285f4;
            text-decoration: none;
            transition: color 0.3s;
        }

        .contact a:hover {
            color: #007bff;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .card {
                padding: 20px;
            }

            .card h2 {
                font-size: 20px;
            }

            .card p {
                font-size: 14px;
            }

            .footer {
                position: relative;
                margin-top: 20px;
            }
        }

        @media (max-width: 480px) {
            .container {
                grid-template-columns: 1fr; /* Stacks the cards in a single column */
                gap: 15px;
            }

            .footer {
                font-size: 12px;
                padding: 5px 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <img src="images/Vivek.jpg" alt="Vivek">
            <h2>Vivek Chaudhari</h2>
            <p>Backend Developer</p>
            <div class="contact">
                <a href="mailto:vivekchaudhari8573@gmail.com">vivekchaudhari8573@gmail.com</a>
            </div>
        </div>

        <div class="card">
            <img src="images/Adinath.jpeg" alt="Team member">
            <h2>Adinath Khairnar</h2>
            <p>Frontend Developer</p>
            <div class="contact">
                <a href="mailto:adinath230@gmail.com">adinath230@gmail.com</a>
            </div>
        </div>

        <div class="card">
            <img src="images/Harsh.jpeg" alt="Harsh">
            <h2>Harsh Mawalkar</h2>
            <p>Designer</p>
            <div class="contact">
                <a href="mailto:iharshmawalkar8@gmail.com">iharshmawalkar8@gmail.com</a>
            </div>
        </div>
    </div>

    <div class="footer">
        &copy; 2022 KKW
    </div>
</body>

</html>
