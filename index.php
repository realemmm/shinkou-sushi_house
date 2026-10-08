<?php
session_start();
$order_link = isset($_SESSION['user_id']) ? 'order.php' : 'registration.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shinkou Sushi-House | Home</title>
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
        <a class="is-active" href="index.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="menu.php">Menu</a>
        <a href="order.php">Checkout</a>
        <a href="feedback.php">Feedback</a>
        <a href="registration.php">Register</a>
        <a href="cart.php">Cart</a>
      </nav>
    </div>
  </header>

  <main class="page-main">
    <section class="hero section-shell" id="home">
      <div class="hero-copy">
        <p class="section-tag">Precision. Purity. Flavor.</p>
        <h1>Fresh sushi, hot ramen, and Tokyo street energy.</h1>
        <p class="hero-lead">
          Shinkou Sushi-House offers bright platters, clean bowls, and a fast, 
          urban-style Japanese menu designed for quick pickup orders—perfect for 
          lunch breaks and easy dinners.
        </p>

        <div class="hero-actions">
          <a class="button button-primary" href="<?php echo $order_link; ?>">Order Now</a>
          <a class="button button-secondary" href="menu.php">View Menu</a>
        </div>

        <div class="hero-fast-list">
          <span>Fast pickup</span>
          <span>Clean builds</span>
          <span>Authentic Sushi</span>
        </div>
      </div>

      <aside class="hero-panel">
        <p class="panel-label">Monday - Sunday</p>
        <h2>Quick lunch. Late dinner. Clean flavor all day.</h2>
        <p>
          Built for convenience, Shinkou Sushi-House operates as a 
          pickup-only kitchen, focusing on fast preparation, smooth ordering, 
          and meals ready right when you need them.
        </p>

        <div class="hero-stats">
          <div>
            <strong>22.8km</strong>
            <span>From Manila</span>
          </div>
          <div>
            <strong>Clean</strong>
            <span>Ingredient-first menu builds</span>
          </div>
        </div>
      </aside>
    </section>

    <section class="home-featured">
      <div class="section-shell">
        <div class="section-heading">
          <p class="section-tag">Signature Picks</p>
          <h2>Start with the house favorites people come back for.</h2>
        </div>

        <div class="home-feature-grid">
          <article class="home-food-card">
            <img src="images/home menu 1.png" alt="Combo Sushi Platter">
            <div class="home-food-copy">
              <p class="panel-label">Best Seller</p>
              <h3>Combo Sushi Platter</h3>
              <p>California Maki (30pcs) | Shrimp Tempura Maki (30pcs)</p>
              <span>PHP 1,385</span>
            </div>
          </article>

          <article class="home-food-card">
            <img src="images/home.jpg" alt="Medium Sushi Platter">
            <div class="home-food-copy">
              <p class="panel-label">Best Seller</p>
              <h3>Medium Sushi Platter</h3>
              <p>California Maki (12pcs) | Sesame California Maki (12pcs) | Futo Maki (4pcs) | Tamago Sushi (8pcs) | Kani Sushi (8pcs) | Shrimp Sushi (2pcs)</p>
              <span>PHP 630</span>
            </div>
          </article>

          <article class="home-food-card">
            <img src="images/home menu 3.png" alt="Agemono Combo Platter">
            <div class="home-food-copy">
              <p class="panel-label">Best Seller</p>
              <h3>Agemono Combo Platter</h3>
              <p>Tonkatsu (600g) | Shrimp Tempura (20pcs)</p>
              <span>PHP 1,620</span>
            </div>
          </article>
        </div>
      </div>
    </section>

    <section class="home-story">
      <div class="section-shell">
        <div class="home-story-layout">
          <div class="home-story-image">
            <img src="images/home menu 4.jpg" alt="Chef preparing sushi slices">
          </div>

          <div class="home-story-copy">
            <p class="section-tag">Why Shinkou</p>
            <h2>Fast-moving service with the detail of a dedicated sushi counter.</h2>
            <p>
              Shinkou Sushi-House brings together bright platters, clean bowls, and a pickup-first 
              experience built for fast orders, easy handoffs, and meals ready when you are.
            </p>

            <ul class="feature-list">
              <li>Fresh sushi platters for sharing and celebrations</li>
              <li>Rice meals designed for everyday lunch and dinner runs</li>
              <li>Ramen bowls with rich broths and clean finishing flavors</li>
              <li>Pickup only, and social-friendly plating that photographs well</li>
            </ul>

            <div class="home-quickfacts">
              <div>
                <strong>Monday - Saturday | Sunday</strong>
                <span>10:00 AM to 6:00 PM | 12:00 PM to 5:00 PM</span>
              </div>
              <div>
                <strong>Marilao, Bulacan</strong>
                <span>B6, L6&8, St. Emmanuel Homes</span>
              </div>
              <div>
                <strong>Fast Ordering</strong>
                <span>Pickup Only</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="home-cta-strip">
      <div class="section-shell">
        <div class="home-cta-card">
          <div>
            <p class="section-tag">Order Now</p>
            <h2>Ready for platters, bowls, and ramen that hit fast and clean?</h2>
            <p>
              Ready for platters, bowls, and ramen made for quick and clean pickup?
              Browse the full menu and place a fast pickup order—no dine-in available, just simple, 
              efficient takeaway from the house.
            </p>
          </div>

          <div class="home-cta-actions">
            <a class="button button-primary" href="menu.php">See Full Menu</a>
            <a class="button button-secondary" href="order.php">Start Your Order</a>
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
      <p>B6, L6&8, St. Emmanuel Homes, Prenza II, Marilao, Bulacan | shinkousushihouse@gmail.com | 09255310227</p>
    </div>
  </footer>
</body>
</html>
