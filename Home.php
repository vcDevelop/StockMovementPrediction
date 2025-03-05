<?php
session_start();
include("SignIN_SignUP\php\config.php");
require_once('Nav-bar.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Predictor</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <style>
      /* General Reset */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
      }

      /* Body Styles */
      body {
        background-color: #f1f5f9;
        font-family: 'Poppins', sans-serif;
      }

      /* Header Styles */
      header {
        background-color: #1f2937; /* Dark theme for header */
        padding: 15px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .navigation {
        list-style: none;
        display: flex;
        margin: 0;
      }

      .navigation a {
        text-decoration: none;
        color: #fff;
        margin-right: 20px;
        font-size: 1.1em;
        transition: color 0.3s ease;
      }

      .navigation a:hover {
        color: #42d1f5; /* Hover effect on links */
      }

      /* Main Content Styles */
      .content {
        text-align: center;
        padding: 50px 20px;
        max-width: 1200px;
        margin: 0 auto;
      }

      .info h2 {
        font-size: 2.8em;
        color: #1f2937;
        margin-bottom: 20px;
        font-weight: 600;
      }

      .info h2 span {
        color: #42d1f5; /* Accent color for span text */
      }

      .info p {
        font-size: 1.2em;
        color: #666;
        margin-bottom: 30px;
        line-height: 1.6;
      }

      .info-btn {
        padding: 12px 25px;
        background-color: #42d1f5;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-size: 1.1em;
        transition: all 0.3s ease;
      }

      .info-btn:hover {
        background-color: #1f2937;
      }

      /* Footer Styles */
      .footer {
        background-color: #1f2937;
        color: #fff;
        text-align: center;
        padding: 15px;
        position: fixed;
        bottom: 0;
        width: 100%;
      }

      /* Responsive Design */
      @media (max-width: 768px) {
        .info h2 {
          font-size: 2.2em;
        }

        .info p {
          font-size: 1.1em;
        }

        .info-btn {
          padding: 10px 20px;
          font-size: 1em;
        }

        .content {
          padding: 40px 15px;
        }

        .navigation {
          flex-direction: column;
          align-items: center;
        }

        .navigation a {
          margin-bottom: 10px;
          font-size: 1em;
        }
      }

      @media (max-width: 480px) {
        .info h2 {
          font-size: 1.8em;
        }

        .info p {
          font-size: 1.1em;
        }

        .info-btn {
          padding: 10px 18px;
          font-size: 0.95em;
        }

        /* Adjust footer text size */
        .footer {
          font-size: 0.9em;
          padding: 10px;
        }
      }
    </style>
  </head>
  <body>
    <div class="content">
      <div class="info">
        <h2>Stock Predictor <br><span>Be Creative!</span></h2>
        <p>“The stock market is a device to transfer money from the impatient to the patient.”<br>- Warren Buffett</p>
        <a href="searchbox\SearchBox.html" class="info-btn">Predict Stocks</a>
      </div>
    </div>

    <footer class="footer">
        &copy; 2022 KKW
    </footer>
  </body>
</html>
