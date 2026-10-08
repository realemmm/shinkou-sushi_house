<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shinkou Sushi-House | Menu</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800&family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <style>
    .add-to-cart-wrap { display:flex; flex-wrap:wrap; gap:.5rem; align-items:center; margin-top:.9rem; }
    .size-select { flex:1 1 100%; padding:.55rem .6rem; border:1px solid #ccc; border-radius:4px; background:#fff; color:#111; font:inherit; font-size:.85rem; }
    .add-cart-btn { background:#c82333; color:#fff; border:none; border-radius:4px; padding:.6rem 1.1rem; font-weight:700; cursor:pointer; transition:background .2s, transform .1s; }
    .add-cart-btn:hover { background:#a71d2a; }
    .add-cart-btn:active { transform:scale(.97); }
    .add-cart-btn.added { background:#2e7d32; }
    .nav-cart-count { display:inline-block; min-width:1.3em; padding:0 .4em; margin-left:.35em; border-radius:999px; background:#c82333; color:#fff; font-size:.75rem; font-weight:700; text-align:center; line-height:1.5; }
    .cart-toast { position:fixed; bottom:2rem; right:2rem; background:#1e1e1e; border:1px solid #c82333; color:#fff; padding:1rem 1.5rem; border-radius:6px; box-shadow:0 8px 24px rgba(0,0,0,.3); display:flex; align-items:center; gap:1rem; z-index:1000; transform:translateY(150%); transition:transform .3s cubic-bezier(.175,.885,.32,1.275); }
    .cart-toast.active { transform:translateY(0); }
    .cart-toast a { background:#c82333; color:#fff; padding:.4rem .8rem; border-radius:4px; font-weight:700; text-decoration:none; }
  </style>
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
        <a class="is-active" href="menu.php">Menu</a>
        <a href="order.php">Checkout</a>
        <a href="feedback.php">Feedback</a>
        <a href="registration.php">Register</a>
        <a href="cart.php">Cart</a>
      </nav>
    </div>
  </header>

  <main class="page-main">
    <section class="page-banner page-banner-dark menu-banner">
      <div class="section-shell">
        <p class="section-tag">Menu</p>
        <h1>Fresh flavors. Easy picks. Clear choices.</h1>
        <p>
          Built for quick browsing on your devices, with ingredients and visuals upfront.
        </p>
      </div>
    </section>

    <section class="menu-section page-section-trim">
      <div class="section-shell">
        <div class="section-heading section-heading-light">
          <p class="section-tag">Menu Categories</p>
          <h2>Choose a category, explore your options, and order effortlessly.</h2>
        </div>

        <div class="transparency-grid">
          <article class="transparency-card">
            <p class="panel-label">Ingredient Transparency</p>
            <h3>Know the build before checkout.</h3>
            <div class="ingredient-tags">
              <span>Butaniku</span>
              <span>Ebi</span>
              <span>Sushi Rice</span>
              <span>Kani</span>
              <span>Nori</span>
              <span>Toriniku</span>
            </div>
          </article>

          <article class="transparency-card">
            <p class="panel-label">Quick nutrition overview</p>
            <div class="metric-row">
              <div>
                <strong>28g+</strong>
                <span>Protein in our signature bowls</span>
              </div>
              <div>
                <strong>3</strong>
                <span>Categories</span>
              </div>
              <div>
                <strong>Fast</strong>
                <span>Visual decision making</span>
              </div>
            </div>
          </article>

          <article class="transparency-card">
            <p class="panel-label">Utility First</p>
            <h3>Made for customers on the go.</h3>
            <p>Simple tabs, clear prices, and short descriptions make ordering easy even on small screens.</p>
          </article>
        </div>

        <div class="menu-tabs">
          <input type="radio" name="menu-tab" id="tab-platters" checked>
          <input type="radio" name="menu-tab" id="tab-rice">
          <input type="radio" name="menu-tab" id="tab-ramen">

          <div class="tab-labels" role="tablist" aria-label="Menu Categories">
  <label for="tab-platters">Sushi | Maki & Agemono Platters</label>
  <label for="tab-rice">Agemono | Rice Meals</label>
  <label for="tab-ramen">Ramens | Salads</label>
</div>

<div class="menu-panels">

  <section class="menu-panel platters-panel">
    <div class="menu-grid">
      <?php
      $sql = "SELECT * FROM menu_items WHERE category LIKE '%Platter%' OR category LIKE '%Sushi%' OR category LIKE '%Maki%'";
      $result = $conn->query($sql);
      if ($result && $result->num_rows > 0) {
          while($item = $result->fetch_assoc()) {
              ?>
              <article class="menu-card">
                <img src="images/<?php echo htmlspecialchars($item['image_url'] ?? 'home.jpg'); ?>" alt="<?php echo htmlspecialchars($item['item_name']); ?>">
                <div class="menu-card-copy">
                  <h4><?php echo htmlspecialchars($item['item_name']); ?></h4>
                  <p><?php echo htmlspecialchars($item['description'] ?? ''); ?></p>
                  <span class="price">PHP <?php echo number_format($item['price'], 2); ?></span>
                </div>
              </article>
              <?php
          }
      } else {
          echo "<p style='color: white;'>No platters found.</p>";
      }
      ?>
    </div>
  </section>

  <section class="menu-panel rice-panel">
    <div class="menu-grid">
      <?php
      $sql = "SELECT * FROM menu_items WHERE category LIKE '%Rice%' OR category LIKE '%Agemono%'";
      $result = $conn->query($sql);
      if ($result && $result->num_rows > 0) {
          while($item = $result->fetch_assoc()) {
              ?>
              <article class="menu-card">
                <img src="images/<?php echo htmlspecialchars($item['image_url'] ?? 'home.jpg'); ?>" alt="<?php echo htmlspecialchars($item['item_name']); ?>">
                <div class="menu-card-copy">
                  <h4><?php echo htmlspecialchars($item['item_name']); ?></h4>
                  <p><?php echo htmlspecialchars($item['description'] ?? ''); ?></p>
                  <span class="price">PHP <?php echo number_format($item['price'], 2); ?></span>
                </div>
              </article>
              <?php
          }
      } else {
          echo "<p style='color: white;'>No rice meals found.</p>";
      }
      ?>
    </div>
  </section>

  <section class="menu-panel ramen-panel">
    <div class="menu-grid">
      <?php
      $sql = "SELECT * FROM menu_items WHERE category LIKE '%Ramen%' OR category LIKE '%Salad%'";
      $result = $conn->query($sql);
      if ($result && $result->num_rows > 0) {
          while($item = $result->fetch_assoc()) {
              ?>
              <article class="menu-card">
                <img src="images/<?php echo htmlspecialchars($item['image_url'] ?? 'home.jpg'); ?>" alt="<?php echo htmlspecialchars($item['item_name']); ?>">
                <div class="menu-card-copy">
                  <h4><?php echo htmlspecialchars($item['item_name']); ?></h4>
                  <p><?php echo htmlspecialchars($item['description'] ?? ''); ?></p>
                  <span class="price">PHP <?php echo number_format($item['price'], 2); ?></span>
                </div>
              </article>
              <?php
          }
      } else {
          echo "<p style='color: white;'>No ramen or salads found.</p>";
      }
      ?>
    </div>
  </section>

</div>
  </section>
</div>
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
  <div id="cart-toast" class="cart-toast" role="status" aria-live="polite">
    <span id="cart-toast-msg">Added to cart.</span>
    <a href="cart.php">View Cart</a>
  </div>

  <script>
    (function () {
      var CART_KEY = 'shinkou_cart';
      var DEFAULT_MAX_STOCK = 10;
      var toastTimer = null;

      function loadCart() {
        try { return JSON.parse(localStorage.getItem(CART_KEY)) || []; }
        catch (e) { return []; }
      }
      function saveCart(cart) { localStorage.setItem(CART_KEY, JSON.stringify(cart)); }
      function toNumber(str) { return parseInt(String(str).replace(/,/g, ''), 10); }
      function slug(str) { return str.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, ''); }

      // Reads "S - PHP 530 | M - PHP 650" or "PHP 125" into [{label, price}]
      function parsePrices(text) {
        return text.replace(/\s+/g, ' ').trim().split('|').map(function (part) {
          part = part.trim();
          var multi = part.match(/^(.*?)\s+-\s+(?:PHP\s*)?([\d,]+)$/);
          if (multi) return { label: multi[1].trim(), price: toNumber(multi[2]) };
          var single = part.match(/^PHP\s*([\d,]+)$/);
          if (single) return { label: '', price: toNumber(single[1]) };
          return null;
        }).filter(Boolean);
      }

      function updateNavCount() {
        var link = document.querySelector('.site-nav a[href="cart.html"]');
        if (!link) return;
        var old = link.querySelector('.nav-cart-count');
        if (old) old.remove();
        var count = loadCart().reduce(function (n, i) { return n + i.quantity; }, 0);
        if (count > 0) {
          var badge = document.createElement('span');
          badge.className = 'nav-cart-count';
          badge.textContent = count;
          link.appendChild(badge);
        }
      }

      function showToast(msg) {
        var t = document.getElementById('cart-toast');
        document.getElementById('cart-toast-msg').textContent = msg;
        t.classList.add('active');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function () { t.classList.remove('active'); }, 3500);
      }

      function addToCart(product) {
        var cart = loadCart();
        var existing = cart.find(function (i) { return i.id === product.id; });
        if (existing) {
          if (existing.quantity >= existing.maxStock) {
            showToast('Max quantity reached for ' + product.name + '.');
            return;
          }
          existing.quantity += 1;
        } else {
          cart.push(product);
        }
        saveCart(cart);
        updateNavCount();
        showToast('Added "' + product.name + (product.variant !== 'Regular' ? ' (' + product.variant + ')' : '') + '" to cart.');
      }

      document.querySelectorAll('.menu-card').forEach(function (card) {
        var name = card.querySelector('h4').textContent.trim();
        var image = card.querySelector('img').getAttribute('src');
        var priceEl = card.querySelector('.price');
        var options = parsePrices(priceEl.textContent);
        if (!options.length) return;

        var wrap = document.createElement('div');
        wrap.className = 'add-to-cart-wrap';

        var select = null;
        if (options.length > 1) {
          select = document.createElement('select');
          select.className = 'size-select';
          select.setAttribute('aria-label', 'Choose size for ' + name);
          options.forEach(function (o, idx) {
            var opt = document.createElement('option');
            opt.value = idx;
            opt.textContent = o.label + ' - PHP ' + o.price.toLocaleString();
            select.appendChild(opt);
          });
          wrap.appendChild(select);
        }

        var btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'add-cart-btn';
        btn.textContent = 'Add to Cart';
        btn.addEventListener('click', function () {
          var choice = options[select ? parseInt(select.value, 10) : 0];
          var variant = choice.label || 'Regular';
          addToCart({
            id: slug(name + '-' + image + '-' + variant),
            name: name,
            variant: variant,
            image: image,
            unitPrice: choice.price,
            quantity: 1,
            maxStock: DEFAULT_MAX_STOCK,
            inStock: true,
            sameDayEligible: true
          });
          btn.classList.add('added');
          btn.textContent = 'Added ✓';
          setTimeout(function () { btn.classList.remove('added'); btn.textContent = 'Add to Cart'; }, 1200);
        });
        wrap.appendChild(btn);

        priceEl.parentNode.appendChild(wrap);
      });

      updateNavCount();
    })();
  </script>
</body>
</html>
