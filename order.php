<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shinkou Sushi-House | Checkout</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800&family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <style>
    .checkout-items { margin: 1rem 0; }
    .checkout-row { display: grid; grid-template-columns: 64px 1fr auto; gap: 0.85rem; align-items: center; padding: 0.85rem 0; border-bottom: 1px solid #eee; }
    .checkout-thumb { width: 64px; height: 56px; object-fit: cover; border-radius: 6px; background: #eee; }
    .checkout-row h4 { margin: 0 0 0.2rem; font-size: 1rem; color: #111; }
    .checkout-row p { margin: 0; font-size: 0.85rem; color: #444; }
    .checkout-row strong { color: #111; white-space: nowrap; }
    .totals-line { display: flex; justify-content: space-between; margin-bottom: 0.5rem; color: #222; }
    .totals-line strong { color: #111; }
    .totals-line.discount { color: #2e7d32; }
    .totals-line.grand { font-size: 1.25rem; border-top: 1px solid #e0e0e0; padding-top: 0.75rem; margin-top: 0.75rem; }
    .totals-line.grand span { font-weight: 700; color: #111; }
    .edit-cart-link { font-size: 0.9rem; font-weight: 700; color: #c82333; text-decoration: none; }
    .edit-cart-link:hover { text-decoration: underline; }
    .checkout-empty { text-align: center; padding: 2rem 0; color: #111; }
    .checkout-empty h4, .checkout-empty p { color: #111; }
    .payment-badge { cursor: pointer; border: 2px solid transparent; transition: border-color .2s, transform .1s; }
    .payment-badge:hover { transform: translateY(-2px); }
    .payment-badge.is-selected { border-color: #c82333; box-shadow: 0 0 0 3px rgba(200, 35, 51, .25); }
    .checkout-msg { margin-top: 1rem; padding: 0.8rem 1rem; border-radius: 6px; font-size: 0.9rem; display: none; }
    .checkout-msg.error { display: block; background: #fff3f3; border: 1px solid #8b2525; color: #8b2525; }
    .checkout-msg.success { display: block; background: #e8f5e9; border: 1px solid #2e7d32; color: #1b5e20; }
    .payment-hint { font-size: 0.85rem; margin-top: 0.75rem; }
  </style>
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
        <a class="is-active" href="order.php">Checkout</a>
        <a href="feedback.php">Feedback</a>
        <a href="registration.php">Register</a>
        <a href="cart.php">Cart</a>
      </nav>
    </div>
  </header>

  <main class="page-main">
    <section class="page-banner order-banner">
      <div class="section-shell">
        <p class="section-tag">Checkout</p>
        <h1>Review. Pay. Done.</h1>
        <p>
          Confirm your items, enter your details, and pick a payment method to
          finish your order.
        </p>
      </div>
    </section>

    <section class="order-section page-section-trim">
      <div class="section-shell">
        <div class="section-heading">
          <p class="section-tag">Checkout</p>
          <h2>Everything you ordered and what you owe, in one place.</h2>
        </div>

        <div class="order-layout">
          <form class="order-card registration-card" id="checkout-form" novalidate>
            <div class="card-heading">
              <p class="panel-label">Customer</p>
              <h3>Guest Details</h3>
            </div>

            <label for="name">Name</label>
            <input id="name" type="text" placeholder="Your full name" autocomplete="name">

            <label for="address">Address</label>
            <textarea id="address" rows="5" placeholder="Delivery address (optional for in-store pickup)" autocomplete="street-address"></textarea>

            <p class="inline-note">Need a lighter build? Request extra greens, a simpler roll, or a cleaner broth profile in-store.</p>

            <label class="checkbox-row" for="terms">
              <input id="terms" type="checkbox">
              <span>I agree to the <a href="terms.php" target="_blank" rel="noopener" style="text-decoration: underline;">Terms and Conditions</a>.</span>
            </label>
          </form>

          <div class="order-card cart-card">
            <div class="card-heading">
              <p class="panel-label">Your Order</p>
              <h3>Order Summary</h3>
            </div>

            <a class="edit-cart-link" href="cart.php">&larr; Edit cart</a>

            <div id="checkout-items" class="checkout-items"></div>

            <div id="checkout-empty" class="checkout-empty" style="display:none;">
              <h4>Your cart is empty</h4>
              <p>Add something from the menu to check out.</p>
              <a href="menu.php" class="button button-primary" style="margin-top:1rem; display:inline-block;">Browse Menu</a>
            </div>

            <div id="checkout-totals">
              <div class="totals-line">
                <span>Subtotal (<span id="item-count">0</span> items)</span>
                <strong id="t-subtotal">PHP 0</strong>
              </div>
              <div class="totals-line">
                <span>Delivery</span>
                <strong id="t-delivery">PHP 0</strong>
              </div>
              <div class="totals-line discount" id="t-discount-row" style="display:none;">
                <span>Discount (SHINKOU10)</span>
                <strong id="t-discount">-PHP 0</strong>
              </div>
              <div class="totals-line grand">
                <span>Total Amount Due</span>
                <strong id="t-total">PHP 0</strong>
              </div>
              <div class="totals-line" style="margin-top:.75rem;">
                <span>Estimated Time of Preparation</span>
                <strong>1 hr and 30 mins</strong>
              </div>
            </div>

            <button class="button button-primary button-wide" type="button" id="place-order-btn" style="margin-top:1.25rem;">Place Order</button>
            <a class="button button-secondary button-wide" href="cart.php" style="margin-top:.75rem; text-align:center; display:block;">Cancel &amp; Back to Cart</a>

            <div id="checkout-msg" class="checkout-msg" role="alert"></div>
          </div>
        </div>

        <div class="payment-card">
          <div class="card-heading">
            <p class="panel-label">Payment</p>
            <h3>Accepted Methods</h3>
          </div>

          <div class="payment-grid" id="payment-grid" role="radiogroup" aria-label="Payment methods">
            <div class="payment-badge payment-gcash" role="radio" aria-checked="false" tabindex="0" data-method="GCash"><span>GCash</span></div>
            <div class="payment-badge payment-cash" role="radio" aria-checked="false" tabindex="0" data-method="Maya"><span>Maya</span></div>
            <div class="payment-badge payment-qr" role="radio" aria-checked="false" tabindex="0" data-method="Cash"><span>Cash</span></div>
          </div>
          <p class="inline-note payment-hint" id="payment-hint">Select a payment method.</p>
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

  <script>
    (function () {
      var CART_KEY = 'shinkou_cart';
      var SUMMARY_KEY = 'shinkou_cart_summary';
      var selectedPayment = null;

      function load(key, fallback) {
        try { var v = JSON.parse(localStorage.getItem(key)); return v == null ? fallback : v; }
        catch (e) { return fallback; }
      }
      function esc(str) {
        return String(str).replace(/[&<>"']/g, function (c) {
          return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
        });
      }
      function php(n) { return 'PHP ' + Math.round(n).toLocaleString(); }

      var cart = load(CART_KEY, []);
      var summary = load(SUMMARY_KEY, { deliveryFee: 80, discountPct: 0 });

      var subtotal = cart.reduce(function (s, i) { return s + i.unitPrice * i.quantity; }, 0);
      var itemCount = cart.reduce(function (s, i) { return s + i.quantity; }, 0);
      var deliveryFee = subtotal > 0 ? Number(summary.deliveryFee) || 0 : 0;
      var discount = subtotal * (Number(summary.discountPct) || 0);
      var total = Math.max(0, subtotal + deliveryFee - discount);

      function render() {
        var list = document.getElementById('checkout-items');
        list.innerHTML = cart.map(function (i) {
          return '<div class="checkout-row">' +
            '<img class="checkout-thumb" src="' + esc(i.image) + '" alt="' + esc(i.name) + '">' +
            '<div><h4>' + esc(i.name) + '</h4><p>' + esc(i.variant) + ' &times; ' + i.quantity +
            ' &middot; ' + php(i.unitPrice) + ' each</p></div>' +
            '<strong>' + php(i.unitPrice * i.quantity) + '</strong></div>';
        }).join('');

        var empty = cart.length === 0;
        document.getElementById('checkout-empty').style.display = empty ? 'block' : 'none';
        document.getElementById('place-order-btn').disabled = empty;
        document.getElementById('item-count').textContent = itemCount;
        document.getElementById('t-subtotal').textContent = php(subtotal);
        document.getElementById('t-delivery').textContent = deliveryFee === 0 ? 'FREE' : php(deliveryFee);
        document.getElementById('t-discount-row').style.display = discount > 0 ? 'flex' : 'none';
        document.getElementById('t-discount').textContent = '-' + php(discount);
        document.getElementById('t-total').textContent = php(total);
      }

      function showMsg(type, text) {
        var el = document.getElementById('checkout-msg');
        el.className = 'checkout-msg ' + type;
        el.textContent = text;
      }

      function selectPayment(badge) {
        document.querySelectorAll('#payment-grid .payment-badge').forEach(function (b) {
          b.classList.remove('is-selected');
          b.setAttribute('aria-checked', 'false');
        });
        badge.classList.add('is-selected');
        badge.setAttribute('aria-checked', 'true');
        selectedPayment = badge.getAttribute('data-method');
        document.getElementById('payment-hint').textContent = 'Paying with: ' + selectedPayment;
      }

      document.querySelectorAll('#payment-grid .payment-badge').forEach(function (b) {
        b.addEventListener('click', function () { selectPayment(b); });
        b.addEventListener('keydown', function (e) {
          if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); selectPayment(b); }
        });
      });

      document.getElementById('place-order-btn').addEventListener('click', function () {
        var name = document.getElementById('name').value.trim();
        var address = document.getElementById('address').value.trim();
        if (cart.length === 0) return showMsg('error', 'Your cart is empty.');
        if (!name) return showMsg('error', 'Please enter your name.');
        if (deliveryFee > 0 && !address) return showMsg('error', 'Please enter your delivery address.');
        if (!selectedPayment) return showMsg('error', 'Please select a payment method.');
        if (!document.getElementById('terms').checked) return showMsg('error', 'Please agree to the Terms and Conditions.');

        var paidTotal = total;
        localStorage.removeItem(CART_KEY);
        localStorage.removeItem(SUMMARY_KEY);
        cart = []; subtotal = 0; itemCount = 0; deliveryFee = 0; discount = 0; total = 0;
        render();
        this.disabled = true;
        showMsg('success', 'Thank you, ' + name + '! Your order is placed. Total due: ' + php(paidTotal) + ' via ' + selectedPayment + '.');
      });

      render();
    })();
  </script>
</body>
</html>
