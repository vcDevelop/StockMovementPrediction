<!DOCTYPE html>
<html>
<head>
  <title>Stock Predictions</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: #1e1e2f;
      color: #f3f4f7;
    }
    .container {
      width: 80%;
      max-width: 1200px;
      text-align: center;
    }
    header {
      margin-bottom: 30px;
    }
    h1 {
      font-size: 2.5em;
      margin: 0;
      color: #42d1f5;
    }
    p.subtitle {
      font-size: 1.2em;
      color: #bbb;
      margin-top: 10px;
    }
    .feature-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin-top: 30px;
    }
    .card {
      background: #292b3b;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
      transition: transform 0.2s;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .card h2 {
      color: #7ad0f5;
    }
    .card p {
      color: #e0e0e0;
    }
    .action-buttons {
      margin-top: 30px;
    }
    .button {
      display: inline-block;
      padding: 12px 30px;
      border-radius: 50px;
      margin: 10px;
      font-size: 1em;
      cursor: pointer;
      text-decoration: none;
      border: 2px solid transparent;
      transition: background 0.3s, border-color 0.3s;
    }
    .button-blue {
      background-color: #ff7f50;
      color: white;
    }
    .button-blue:hover {
      background-color: transparent;
      color: #ff7f50;
      border-color: #ff7f50;
    }
    .button-green {
      background-color: #5dd39e;
      color: white;
    }
    .button-green:hover {
      background-color: transparent;
      color: #5dd39e;
      border-color: #5dd39e;
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>Stock Predictions</h1>
      <p class="subtitle">Unlock smarter investment decisions with our advanced analytics.</p>
    </header>
    <section class="feature-grid">
      <div class="card">
        <h2>Trend Analysis</h2>
        <p>Leverage cutting-edge technology to monitor and predict market movements.</p>
      </div>
      <div class="card">
        <h2>Data-Driven Insights</h2>
        <p>Gain valuable insights from historical data and real-time trends.</p>
      </div>
    </section>
    <div class="action-buttons">
      <a href="SignIN_SignUP/Login.php" class="button button-blue">Log In</a>
      <a href="SignIN_SignUP/register.php" class="button button-green">Sign Up</a>
    </div>
  </div>
</body>
</html>
