<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shinkou Sushi-House | Register</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800&family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header class="site-header">
    <div class="nav-shell section-shell">
      <a class="brand" href="index.php" aria-label="Shinkou Sushi-House Home">
        <img class="brand-mark" src="logo.jpg" alt="Shinkou Sushi-House logo">
        <span class="brand-copy">
          <strong>Shinkou Sushi-House</strong>
          <small>est. 2017</small>
        </span>
      </a>

      <nav class="site-nav" aria-label="Primary">
        <a href="index.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="menu.php">Menu</a>
        <a href="order.php">Checkout</a>
        <a href="feedback.php">Feedback</a>
        <a href="cart.php">Cart</a>
        <a class="is-active" href="register.php">Register</a>
      </nav>
    </div>
  </header>

  <main class="page-main">
    <section class="page-banner order-banner">
      <div class="section-shell">
        <p class="section-tag">Account Registration</p>
        <h1>Create your Shinkou account for faster checkout.</h1>
        <p>
          Register your account details to save delivery and pickup preferences for future orders.
        </p>
      </div>
    </section>

    <section class="order-section page-section-trim">
      <div class="section-shell">
        <div class="section-heading">
          <p class="section-tag">Join Shinkou</p>
          <h2>Fill in your details to get started.</h2>
        </div>

        <div class="order-layout">
          <form class="order-card registration-card" action="register_process.php" method="POST">
            <div class="card-heading">
              <p class="panel-label">User Account</p>
              <h3>Registration Details</h3>
            </div>

            <label for="fullname">Full Name</label>
            <input id="fullname" name="fullname" type="text" placeholder="e.g. Juan Dela Cruz" required>

            <label for="email">Email Address</label>
            <input id="email" name="email" type="email" placeholder="e.g. user@example.com" required>

            <label for="phone">Phone Number</label>
            <input id="phone" name="phone" type="tel" placeholder="e.g. 09123456789" required>

            <label for="password">Password</label>
            <input id="password" name="password" type="password" placeholder="Create a secure password" required>

            <label for="confirm_password">Confirm Password</label>
            <input id="confirm_password" name="confirm_password" type="password" placeholder="Re-enter your password" required>

            <label for="address">Default Address</label>
            <textarea id="address" name="address" rows="4" placeholder="House/Bldg No., Street, Barangay, City, Bulacan"></textarea>

            <label class="checkbox-row" for="terms">
  <input id="terms" name="terms" type="checkbox" required>
  <span>I agree to the <a href="terms.html" target="_blank" style="color: inherit; text-decoration: underline;">Terms and Conditions</a>.</span>
</label>

            <button type="submit" class="button button-primary">
              Create Account
            </button>
          </form>
        </div>
      </div>
    </section>
  </main>

  <footer class="page-footer">
    <div class="section-shell footer-shell">
      <div class="footer-brand">
        <img class="footer-logo" src="logo.jpg" alt="Shinkou Sushi-House logo">
        <div>
          <strong>Shinkou Sushi-House</strong>
          <p>Taste the Tradition</p>
        </div>
      </div>
      <p>BLK 6, LOT 6&8, St. Emmanuel Homes, Prenza II, Marilao, Bulacan | shinkousushihouse@gmail.com | 09255310227</p>
    </div>
  </footer>
</body>
</html>