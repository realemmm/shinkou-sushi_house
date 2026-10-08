<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shinkou Sushi-House | Shopping Cart</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800&family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header class="site-header">
    <div class="nav-shell section-shell">
      <a class="brand" href="index.php" aria-label="Shinkou Sushi-House Home">
        <img class="brand-mark" src="images/logo.jpg" alt="Shinkou Sushi-House logo">
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
        <a href="registration.php">Register</a>
        <a class="is-active" href="cart.php">Cart</a>
      </nav>
    </div>
  </header>

  <main class="page-main">
    <section class="page-banner cart-banner">
      <div class="section-shell">
        <p class="section-tag">Order Review</p>
        <h1>Your Shopping Cart</h1>
        <p>Review your fresh sushi, platters, and meals before heading to checkout.</p>
      </div>
    </section>

    <section class="cart-section page-section-trim">
      <div class="section-shell">
        <div class="cart-layout" style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
          <div class="cart-items-card" style="background: #fff; padding: 1.5rem; border-radius: 12px; border: 1px solid #eee;">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 1rem;">
              <h3>Shopping Cart (0 items)</h3>
              <button class="button button-secondary button-sm">Clear Cart</button>
            </div>

            <div style="text-align: center; padding: 4rem 1rem;">
              <h4>Your cart is empty</h4>
              <p style="color: #666;">Looks like you haven't added any platters or ramen bowls yet.</p>
              <br>
              <a href="menu.php" class="button button-primary">Browse Menu</a>
            </div>
          </div>

          <div class="cart-summary-card" style="background: #fff; padding: 1.5rem; border-radius: 12px; border: 1px solid #eee;">
            <p class="panel-label">Summary</p>
            <h3>Order Details</h3>

            <div style="margin: 1rem 0;">
              <label><strong>Select Delivery Zone</strong></label>
              <div style="margin-top: 0.5rem;">
                <p><strong>Zone 1: Primary Local Zone (Marilao, Bulacan)</strong></p>
                <p><small>Coverage: Lahat ng barangay sa Marilao</small></p>
              </div>
            </div>

            <div style="margin: 1rem 0;">
              <input type="text" placeholder="E.G. SHINKOU10" style="width: 70%; padding: 0.5rem;">
              <button class="button button-secondary" style="width: 25%;">Apply</button>
            </div>

            <div style="border-top: 1px solid #eee; padding-top: 1rem; margin-top: 1rem;">
              <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                <span>Subtotal</span>
                <strong>PHP 0</strong>
              </div>
              <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                <span>Estimated Delivery</span>
                <strong>PHP 80</strong>
              </div>
              <div style="display: flex; justify-content: space-between; font-size: 1.2rem; font-weight: bold; margin-top: 1rem;">
                <span>Estimated Total</span>
                <span>PHP 0</span>
              </div>
            </div>

            <a href="order.php" class="button button-primary button-block" style="margin-top: 1.5rem; text-align: center; display: block; text-decoration: none;">Proceed to Checkout</a>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="page-footer">
    <div class="section-shell footer-shell">
      <div class="footer-brand">
        <img class="footer-logo" src="images/logo.jpg" alt="Shinkou Sushi-House logo">
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
