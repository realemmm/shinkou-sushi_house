<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shinkou Sushi-House | Feedback</title>
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
        <a href="registration.php">Register</a>
        <a href="cart.php">Cart</a>
        <a class="is-active" href="feedback.php">Feedback</a>
      </nav>
    </div>
  </header>

  <main class="page-main">
    <section class="page-banner page-banner-dark feedback-banner">
      <div class="section-shell">
        <p class="section-tag">Feedback</p>
        <h1>Real reactions from diners who care about speed and freshness.</h1>
        <p>
          Guest responses focus on the same things the brand promises: quick flow,
          bright food, and a cleaner, more confident dining experience.
        </p>
      </div>
    </section>

    <section class="feedback-section page-section-trim">
      <div class="section-shell">
        <div class="section-heading section-heading-light">
          <p class="section-tag">Guest Reactions</p>
          <h2>Read the sentiment first, then leave your own direct note.</h2>
        </div>

        <div class="feedback-layout">
          <div class="testimonial-grid">
            <article class="testimonial-card">
              <div class="stars stars-five" aria-label="5 out of 5 stars"></div>
              <p>
                "Masarap ang sushi nila. Legit ang wasabi. And masarap din ang mga ramen! 
                 Mas masarap pa sa mga nasa malls. Favorite Ramen and Sushi house na namin ito"
              </p>
              <strong>Leahren Sucaldito Madia | September 30, 2019</strong>
            </article>

            <article class="testimonial-card">
              <div class="stars stars-five" aria-label="5 out of 5 stars"></div>
              <p>
                "andami ko ng order, and they never failed to always serve me good. #morepower 
                #goforgold #goodcustomerservice #goosfood #rapsa"
              </p>
              <strong>Ed Dizon | December 8. 2018</strong>
            </article>

            <article class="testimonial-card">
              <div class="stars stars-four" aria-label="4 out of 5 stars"></div>
              <p>
                "sulit na sulit. sarap pa ng foods.
                  pati si roman mutuc"
              </p>
              <strong>Erica Magtibay Valonda | October 26, 2018</strong>
            </article>
          </div>

          <form class="comment-card">
            <div class="card-heading">
              <p class="panel-label">Leave a Comment</p>
              <h3>Tell us about your experience</h3>
            </div>

            <textarea rows="8" placeholder="Share your Shinkou experience, your favorite dish, or a suggestion for the next visit."></textarea>
            <button class="button button-primary" type="button">Submit Feedback</button>
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
      <p>BLK 6, LOT 6&8, St. Emmanuel Homes, Prenza II, Marilao, Bulacan | shinkousushihouse@gmail.com  |  09255310227</p>
    </div>
  </footer>
</body>
</html>
