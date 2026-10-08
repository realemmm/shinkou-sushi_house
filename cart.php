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
  <style>
    .cart-layout {
      display: grid;
      grid-template-columns: 1fr 380px;
      gap: 2rem;
      align-items: start;
    }

    @media (max-width: 900px) {
      .cart-layout {
        grid-template-columns: 1fr;
      }
    }

    .alert-banner {
      background-color: #fff3f3;
      border: 1px solid #8b2525;
      color: #8b2525;
      padding: 1rem 1.25rem;
      border-radius: 6px;
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 0.95rem;
    }

    .alert-banner.hidden {
      display: none;
    }

    .cart-header-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-bottom: 1rem;
      border-bottom: 1px solid #e0e0e0;
      margin-bottom: 1.5rem;
    }

    .cart-header-bar h3 {
      color: #111;
    }

    .cart-table {
      width: 100%;
      border-collapse: collapse;
    }

    .cart-item-row {
      display: grid;
      grid-template-columns: 80px 1fr 110px 120px 110px 40px;
      gap: 1rem;
      align-items: center;
      padding: 1.25rem 0;
      border-bottom: 1px solid #eee;
    }

    @media (max-width: 650px) {
      .cart-item-row {
        grid-template-columns: 60px 1fr auto;
        grid-template-areas:
          "thumb info remove"
          "thumb qty subtotal";
        gap: 0.75rem;
      }
      .cart-thumb { grid-area: thumb; }
      .cart-item-info { grid-area: info; }
      .cart-qty-ctrl { grid-area: qty; }
      .cart-subtotal-col { grid-area: subtotal; text-align: right; }
      .cart-remove-col { grid-area: remove; justify-self: end; }
      .cart-unit-price-col { display: none; }
    }

    .cart-thumb {
      width: 100%;
      height: 70px;
      object-fit: cover;
      border-radius: 6px;
      background-color: #eee;
    }

    .cart-item-info h4 {
      margin: 0 0 0.25rem 0;
      font-size: 1.1rem;
      color: #111111;
    }

    .cart-item-variant {
      font-size: 0.85rem;
      color: #444444;
      margin-bottom: 0.35rem;
    }

    .badge-same-day {
      display: inline-block;
      font-size: 0.75rem;
      background: #e8f5e9;
      color: #1b5e20;
      border: 1px solid #2e7d32;
      padding: 2px 6px;
      border-radius: 4px;
      font-weight: 700;
    }

    .stock-warning {
      color: #d97706;
      font-size: 0.8rem;
      display: block;
      margin-top: 0.25rem;
      font-weight: bold;
    }

    .out-of-stock-tag {
      color: #dc2626;
      font-weight: bold;
      font-size: 0.85rem;
    }

    .qty-widget {
      display: inline-flex;
      align-items: center;
      border: 1px solid #ccc;
      border-radius: 4px;
      overflow: hidden;
      background: #fff;
    }

    .qty-btn {
      background: #f0f0f0;
      color: #111;
      border: none;
      width: 32px;
      height: 32px;
      font-size: 1.1rem;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.2s;
    }

    .qty-btn:hover:not(:disabled) {
      background: #c82333;
      color: #fff;
    }

    .qty-btn:disabled {
      opacity: 0.3;
      cursor: not-allowed;
    }

    .qty-input {
      width: 40px;
      height: 32px;
      background: transparent;
      border: none;
      color: #111;
      text-align: center;
      font-weight: bold;
      font-size: 0.95rem;
      -moz-appearance: textfield;
    }

    .qty-input::-webkit-outer-spin-button,
    .qty-input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .remove-btn {
      background: transparent;
      border: none;
      color: #222;
      font-size: 1.25rem;
      cursor: pointer;
      padding: 4px;
      transition: color 0.2s;
    }

    .remove-btn:hover {
      color: #dc2626;
    }

    .toast-notification {
      position: fixed;
      bottom: 2rem;
      right: 2rem;
      background: #1e1e1e;
      border: 1px solid #c82333;
      color: #fff;
      padding: 1rem 1.5rem;
      border-radius: 6px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.3);
      display: flex;
      align-items: center;
      gap: 1rem;
      z-index: 1000;
      transform: translateY(150%);
      transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .toast-notification.active {
      transform: translateY(0);
    }

    .toast-undo-btn {
      background: #c82333;
      color: #fff;
      border: none;
      padding: 0.4rem 0.8rem;
      border-radius: 4px;
      cursor: pointer;
      font-weight: bold;
    }

    .coupon-box {
      display: flex;
      gap: 0.5rem;
      margin: 1rem 0;
    }

    .coupon-box input {
      flex: 1;
      padding: 0.6rem;
      background: #fff;
      border: 1px solid #ccc;
      color: #111;
      border-radius: 4px;
      text-transform: uppercase;
    }

    .delivery-selector {
      margin: 1rem 0;
    }

    .zone-card {
      border: 1px solid #dcdcdc;
      border-radius: 6px;
      padding: 0.85rem;
      background: #fafafa;
      margin-bottom: 0.75rem;
    }

    .zone-title {
      font-weight: 700;
      font-size: 0.95rem;
      color: #111;
      margin-bottom: 0.25rem;
    }

    .zone-coverage {
      font-size: 0.8rem;
      color: #555;
      line-height: 1.35;
      margin-bottom: 0.6rem;
    }

    .delivery-option {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.5rem 0.6rem;
      border: 1px solid #e0e0e0;
      border-radius: 4px;
      margin-bottom: 0.35rem;
      cursor: pointer;
      background: #fff;
      color: #111;
      font-size: 0.85rem;
    }

    .delivery-option:last-child {
      margin-bottom: 0;
    }

    .delivery-option span,
    .delivery-option strong {
      color: #111111;
    }

    .delivery-option input {
      margin-right: 0.4rem;
    }

    .payment-tags {
      font-size: 0.75rem;
      color: #1b5e20;
      font-weight: 700;
      margin-top: 0.5rem;
      background: #e8f5e9;
      padding: 4px 8px;
      border-radius: 4px;
      display: inline-block;
    }

    .discount-line {
      color: #2e7d32;
    }

    .empty-cart-state {
      text-align: center;
      padding: 4rem 1rem;
      color: #111;
    }

    .empty-cart-state h3,
    .empty-cart-state p {
      color: #111;
    }

    .cart-summary span {
      color: #222222;
    }

    .cart-summary strong {
      color: #111111;
    }

    .panel-label {
      color: #333333;
    }
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
        <a href="order.php">Checkout</a>
        <a href="feedback.php">Feedback</a>
        <a href="registration.php">Register</a>
        <a class="is-active" href="cart.php">Cart</a>
      </nav>
    </div>
  </header>

  <main class="page-main">
    <section class="page-banner order-banner">
      <div class="section-shell">
        <p class="section-tag">Order Review</p>
        <h1>Your Shopping Cart</h1>
        <p>Review your fresh sushi, platters, and meals before heading to checkout.</p>
      </div>
    </section>

    <section class="order-section page-section-trim">
      <div class="section-shell">

        <div id="price-alert" class="alert-banner hidden">
          <span>⚠️ <strong>Notice:</strong> Prices for one or more items in your cart were recently updated to reflect current menu rates.</span>
          <button class="remove-btn" onclick="document.getElementById('price-alert').classList.add('hidden')">✕</button>
        </div>

        <div class="cart-layout">
          <div class="order-card">
            <div class="cart-header-bar">
              <h3 id="cart-item-count-heading" style="color: #111;">Shopping Cart (0 items)</h3>
              <button type="button" class="mini-button" onclick="clearCart()">Clear Cart</button>
            </div>

            <div id="cart-items-container">
            </div>

            <div id="empty-cart-view" class="empty-cart-state hidden">
              <h3>Your cart is empty</h3>
              <p>Looks like you haven't added any platters or ramen bowls yet.</p>
              <a href="menu.php" class="button button-primary" style="margin-top: 1rem; display: inline-block;">Browse Menu</a>
            </div>
          </div>

          <aside class="order-card summary-card">
            <div class="card-heading">
              <p class="panel-label">Summary</p>
              <h3 style="color: #111;">Order Details</h3>
            </div>

            <div class="delivery-selector">
              <p class="panel-label" style="margin-bottom: 0.5rem;">Select Delivery Zone</p>

              <div class="zone-card">
                <div class="zone-title">Zone 1: Primary Local Zone (Marilao, Bulacan)</div>
                <div class="zone-coverage"><strong>Coverage:</strong> Lahat ng barangay sa Marilao (Abangan Norte, Abangan Sur, Ibayo, Lias, Saog, Tabing Ilog, atbp.)</div>
                
                <label class="delivery-option">
                  <div>
                    <input type="radio" name="delivery_zone" value="80" checked onchange="updateCartTotals()">
                    <span>Same-Day Express Local Delivery</span>
                  </div>
                  <strong>PHP 80</strong>
                </label>

                <label class="delivery-option">
                  <div>
                    <input type="radio" name="delivery_zone" value="50" onchange="updateCartTotals()">
                    <span>Standard Local Delivery</span>
                  </div>
                  <strong>PHP 50</strong>
                </label>

                <label class="delivery-option">
                  <div>
                    <input type="radio" name="delivery_zone" value="0" onchange="updateCartTotals()">
                    <span>In-Store Pickup</span>
                  </div>
                  <strong>FREE</strong>
                </label>

                <div class="payment-tags">
                  Supported: COD, GCash, Maya, Cards
                </div>
              </div>

              <div class="zone-card">
                <div class="zone-title">Zone 2: Greater Metro Manila & Nearby Provinces</div>
                <div class="zone-coverage">
                  <strong>Bulacan:</strong> Meycauayan, Bocaue, SJDMC, Guiguinto, Balagtas, Malolos.<br>
                  <strong>Metro Manila (NCR):</strong> Valenzuela, QC, Manila, Caloocan, atbp.
                </div>

                <label class="delivery-option">
                  <div>
                    <input type="radio" name="delivery_zone" value="150" onchange="updateCartTotals()">
                    <span>Standard Regional Delivery</span>
                  </div>
                  <strong>PHP 150</strong>
                </label>
              </div>
            </div>

            <div>
              <p class="panel-label">Promo Code</p>
              <div class="coupon-box">
                <input type="text" id="coupon-code-input" placeholder="e.g. SHINKOU10">
                <button type="button" class="mini-button" onclick="applyCoupon()">Apply</button>
              </div>
              <p id="coupon-message" style="font-size: 0.8rem; margin-top: -0.5rem; margin-bottom: 1rem;"></p>
            </div>

            <hr style="border: none; border-top: 1px solid #e0e0e0; margin: 1rem 0;">

            <div class="cart-summary">
              <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                <span style="color: #222;">Subtotal</span>
                <strong id="summary-subtotal" style="color: #111;">PHP 0</strong>
              </div>
              <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                <span style="color: #222;">Estimated Delivery</span>
                <strong id="summary-delivery" style="color: #111;">PHP 80</strong>
              </div>
              <div id="discount-row" style="display: none; justify-content: space-between; margin-bottom: 0.5rem;" class="discount-line">
                <span>Discount Applied</span>
                <strong id="summary-discount">-PHP 0</strong>
              </div>
              <hr style="border: none; border-top: 1px solid #e0e0e0; margin: 0.75rem 0;">
              <div style="display: flex; justify-content: space-between; font-size: 1.2rem;">
                <span style="color: #111; font-weight: bold;">Estimated Total</span>
                <strong id="summary-grand-total" style="color: #111;">PHP 0</strong>
              </div>
            </div>

            <a href="order.php" id="checkout-cta-btn" class="button button-primary button-wide" style="margin-top: 1.5rem; text-align: center; display: block;">
              Proceed to Checkout
            </a>
          </aside>
        </div>
      </div>
    </section>
  </main>

  <div id="undo-toast" class="toast-notification">
    <span id="toast-message">Item removed from cart.</span>
    <button type="button" class="toast-undo-btn" onclick="undoRemoveItem()">Undo</button>
  </div>

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

  <script>
const PROMO_CODES = {
  'SHINKOU10':   { type: 'percent',  value: 10 },
  'CONRADABLE30': { type: 'fixed',    value: 50 },
  'LUISKANTU10':  { type: 'shipping', value: 80 }
};

let appliedDiscount = 0;

function parseCurrency(text) {
  return parseFloat(text.replace(/[^0-9.-]+/g, '')) || 0;
}

function updateSummary() {
  const subtotalEl = document.getElementById('summary-subtotal');
  const deliveryEl = document.getElementById('summary-delivery');
  
  const subtotalAmount = parseCurrency(subtotalEl.textContent);
  const deliveryAmount = parseCurrency(deliveryEl.textContent);

  const grandTotal = Math.max(0, subtotalAmount + deliveryAmount - appliedDiscount);

  document.getElementById('summary-discount').textContent = `-PHP ${appliedDiscount.toLocaleString()}`;
  document.getElementById('summary-grand-total').textContent = `PHP ${grandTotal.toLocaleString()}`;
}

function applyCoupon() {
  const inputEl = document.getElementById('coupon-code-input');
  const messageEl = document.getElementById('coupon-message');
  const discountRow = document.getElementById('discount-row');
  
  const code = inputEl.value.trim().toUpperCase();

  messageEl.textContent = '';
  messageEl.style.color = '';

  if (!code) {
    messageEl.textContent = 'Please enter a promo code.';
    messageEl.style.color = '#d9534f';
    return;
  }

  if (PROMO_CODES.hasOwnProperty(code)) {
    const promo = PROMO_CODES[code];
    const subtotalAmount = parseCurrency(document.getElementById('summary-subtotal').textContent);
    const deliveryAmount = parseCurrency(document.getElementById('summary-delivery').textContent);

    if (promo.type === 'percent') {
      appliedDiscount = (subtotalAmount * promo.value) / 100;
    } else if (promo.type === 'fixed') {
      appliedDiscount = promo.value;
    } else if (promo.type === 'shipping') {
      appliedDiscount = deliveryAmount;
    }

    discountRow.style.display = 'flex';
    messageEl.textContent = `Promo code "${code}" applied successfully!`;
    messageEl.style.color = '#28a745';
  } else {
    appliedDiscount = 0;
    discountRow.style.display = 'none';
    messageEl.textContent = 'Invalid promo code. Please try again.';
    messageEl.style.color = '#d9534f';
  }

  updateSummary();
}

document.addEventListener('DOMContentLoaded', updateSummary);
    const DEFAULT_CART_ITEMS = [
      {
        id: 'item-1',
        name: 'Combo Sushi Platter',
        variant: 'Large (60 pcs)',
        image: 'home menu 1.png',
        unitPrice: 1345,
        quantity: 1,
        maxStock: 5,
        inStock: true,
        sameDayEligible: true
      },
      {
        id: 'item-2',
        name: 'Tonkotsu Ramen',
        variant: 'Rich Pork Broth',
        image: 'tonkotsu ramen.jpg',
        unitPrice: 205,
        quantity: 2,
        maxStock: 10,
        inStock: true,
        sameDayEligible: true
      },
      {
        id: 'item-3',
        name: 'Pork Tonkatsu',
        variant: 'Solo Rice Meal',
        image: 'pork tonkatsu.jpg',
        unitPrice: 250,
        quantity: 1,
        maxStock: 3,
        inStock: true,
        sameDayEligible: true
      }
    ];

    let cart = [];
    let lastRemovedItem = null;
    let lastRemovedIndex = null;
    let toastTimeout = null;
    let appliedDiscountPercentage = 0;

    document.addEventListener('DOMContentLoaded', () => {
      const savedCart = localStorage.getItem('shinkou_cart');
      if (savedCart) {
        cart = JSON.parse(savedCart);
      } else {
        cart = DEFAULT_CART_ITEMS;
        saveCart();
      }

      checkPriceChanges();
      renderCart();
    });

    function saveCart() {
      localStorage.setItem('shinkou_cart', JSON.stringify(cart));
    }

    function checkPriceChanges() {
      const alertSeen = sessionStorage.getItem('shinkou_price_alert_ack');
      if (!alertSeen && cart.length > 0) {
        document.getElementById('price-alert').classList.remove('hidden');
        sessionStorage.setItem('shinkou_price_alert_ack', 'true');
      }
    }

    function renderCart() {
      const container = document.getElementById('cart-items-container');
      const emptyView = document.getElementById('empty-cart-view');
      const heading = document.getElementById('cart-item-count-heading');
      const checkoutBtn = document.getElementById('checkout-cta-btn');


      const totalItemCount = cart.reduce((sum, item) => sum + item.quantity, 0);
      heading.innerText = `Shopping Cart (${totalItemCount} item${totalItemCount !== 1 ? 's' : ''})`;

      if (cart.length === 0) {
        container.style.display = 'none';
        emptyView.classList.remove('hidden');
        checkoutBtn.style.opacity = '0.5';
        checkoutBtn.style.pointerEvents = 'none';
        updateCartTotals();
        return;
      }

      container.style.display = 'block';
      emptyView.classList.add('hidden');
      checkoutBtn.style.opacity = '1';
      checkoutBtn.style.pointerEvents = 'auto';

      cart.forEach((item, index) => {
        const itemSubtotal = item.unitPrice * item.quantity;

        const row = document.createElement('div');
        row.className = 'cart-item-row';

          <img src="${item.image}" alt="${item.name}" class="cart-thumb">
          <div class="cart-item-info">
            <h4>${item.name}</h4>
            <div class="cart-item-variant">${item.variant}</div>
            ${item.sameDayEligible ? '<span class="badge-same-day">Marilao Same-Day</span>' : ''}
            ${!item.inStock ? '<span class="out-of-stock-tag">Out of Stock</span>' : ''}
            ${item.quantity >= item.maxStock ? `<span class="stock-warning">Max stock reached (${item.maxStock} max)</span>` : ''}
          </div>
          <div class="cart-unit-price-col">
            <span style="color:#555; font-size:0.85rem;">Unit Price</span><br>
            <strong style="color:#111;">PHP ${item.unitPrice}</strong>
          </div>
          <div class="cart-qty-ctrl">
            <div class="qty-widget">
              <button type="button" class="qty-btn" onclick="adjustQty(${index}, -1)" ${item.quantity <= 1 || !item.inStock ? 'disabled' : ''}>-</button>
              <input type="number" class="qty-input" value="${item.quantity}" min="1" max="${item.maxStock}" onchange="manualQtyInput(${index}, this.value)" ${!item.inStock ? 'disabled' : ''}>
              <button type="button" class="qty-btn" onclick="adjustQty(${index}, 1)" ${item.quantity >= item.maxStock || !item.inStock ? 'disabled' : ''}>+</button>
            </div>
          </div>
          <div class="cart-subtotal-col">
            <span style="color:#555; font-size:0.85rem;">Total</span><br>
            <strong style="color:#111;">PHP ${itemSubtotal.toLocaleString()}</strong>
          </div>
          <div class="cart-remove-col">
            <button type="button" class="remove-btn" onclick="removeItem(${index})" title="Remove item">✕</button>
          </div>
        `;

        container.appendChild(row);
      });

      updateCartTotals();
    }

    function adjustQty(index, change) {
      const item = cart[index];
      const newQty = item.quantity + change;

      if (newQty >= 1 && newQty <= item.maxStock) {
        item.quantity = newQty;
        saveCart();
        renderCart();
      }
    }

    function manualQtyInput(index, value) {
      let qty = parseInt(value, 10);
      const item = cart[index];

      if (isNaN(qty) || qty < 1) {
        qty = 1;
      } else if (qty > item.maxStock) {
        qty = item.maxStock;
      }

      item.quantity = qty;
      saveCart();
      renderCart();
    }

    function removeItem(index) {
      lastRemovedItem = cart[index];
      lastRemovedIndex = index;

      cart.splice(index, 1);
      saveCart();
      renderCart();

      showUndoToast(`Removed "${lastRemovedItem.name}" from cart.`);
    }

    function undoRemoveItem() {
      if (lastRemovedItem !== null && lastRemovedIndex !== null) {
        cart.splice(lastRemovedIndex, 0, lastRemovedItem);
        saveCart();
        renderCart();

        lastRemovedItem = null;
        lastRemovedIndex = null;
        hideUndoToast();
      }
    }

    function showUndoToast(msg) {
      const toast = document.getElementById('undo-toast');
      document.getElementById('toast-message').innerText = msg;
      toast.classList.add('active');

      if (toastTimeout) clearTimeout(toastTimeout);
      toastTimeout = setTimeout(() => {
        hideUndoToast();
      }, 5000);
    }

    function hideUndoToast() {
      document.getElementById('undo-toast').classList.remove('active');
    }

    function clearCart() {
      if (cart.length === 0) return;
      if (confirm('Are you sure you want to empty your shopping cart?')) {
        cart = [];
        saveCart();
        renderCart();
      }
    }

    function applyCoupon() {
      const codeInput = document.getElementById('coupon-code-input').value.trim().toUpperCase();
      const msg = document.getElementById('coupon-message');

      if (codeInput === 'SHINKOU10') {
        appliedDiscountPercentage = 0.10;
        msg.style.color = '#2e7d32';
        msg.innerText = 'Coupon "SHINKOU10" applied (10% Off)!';
      } else if (codeInput === '') {
        appliedDiscountPercentage = 0;
        msg.innerText = '';
      } else {
        appliedDiscountPercentage = 0;
        msg.style.color = '#dc2626';
        msg.innerText = 'Invalid promo code.';
      }

      updateCartTotals();
    }

    function updateCartTotals() {
      const subtotal = cart.reduce((sum, item) => sum + (item.unitPrice * item.quantity), 0);

      const deliveryZoneRadio = document.querySelector('input[name="delivery_zone"]:checked');
      const deliveryFee = subtotal > 0 && deliveryZoneRadio ? parseFloat(deliveryZoneRadio.value) : 0;

      const discountAmount = subtotal * appliedDiscountPercentage;
      
      const grandTotal = Math.max(0, subtotal + deliveryFee - discountAmount);

      document.getElementById('summary-subtotal').innerText = `PHP ${subtotal.toLocaleString()}`;
      document.getElementById('summary-delivery').innerText = deliveryFee === 0 ? 'FREE' : `PHP ${deliveryFee.toLocaleString()}`;

      const discountRow = document.getElementById('discount-row');
      if (discountAmount > 0) {
        discountRow.style.display = 'flex';
        document.getElementById('summary-discount').innerText = `-PHP ${discountAmount.toLocaleString()}`;
      } else {
        discountRow.style.display = 'none';
      }

      document.getElementById('summary-grand-total').innerText = `PHP ${grandTotal.toLocaleString()}`;
    }
  </script>
</body>
</html>