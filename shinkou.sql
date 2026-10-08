-- Create Database
CREATE DATABASE IF NOT EXISTS shinkou_sushi_db;
USE shinkou_sushi_db;

-- 1. USERS & ACCOUNTS
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    phone VARCHAR(20) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    delivery_address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. MENU CATEGORIES
CREATE TABLE IF NOT EXISTS categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(50) NOT NULL,
    description TEXT
);

-- 3. PRODUCTS / MENU ITEMS
CREATE TABLE IF NOT EXISTS products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    product_name VARCHAR(100) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    is_available BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE CASCADE
);

-- 4. PRODUCT VARIANTS & PRICING
CREATE TABLE IF NOT EXISTS product_variants (
    variant_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    variant_label VARCHAR(50) DEFAULT 'Regular',
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT DEFAULT 10,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- 5. DELIVERY ZONES
CREATE TABLE IF NOT EXISTS delivery_zones (
    zone_id INT AUTO_INCREMENT PRIMARY KEY,
    zone_name VARCHAR(100) NOT NULL,
    service_type VARCHAR(100) NOT NULL,
    delivery_fee DECIMAL(10, 2) NOT NULL,
    coverage_details TEXT
);

-- 6. ORDERS
CREATE TABLE IF NOT EXISTS orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    customer_name VARCHAR(100) NOT NULL,
    delivery_address TEXT,
    order_type ENUM('Pickup', 'Delivery') DEFAULT 'Delivery',
    delivery_zone_id INT NULL,
    payment_method ENUM('Visa', 'Mastercard', 'GCash', 'Cash', 'QR Pay') NOT NULL,
    subtotal DECIMAL(10, 2) NOT NULL,
    delivery_fee DECIMAL(10, 2) DEFAULT 0.00,
    discount_amount DECIMAL(10, 2) DEFAULT 0.00,
    total_amount DECIMAL(10, 2) NOT NULL,
    order_status ENUM('Pending', 'Preparing', 'Ready for Pickup', 'Out for Delivery', 'Completed', 'Cancelled') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE SET NULL,
    FOREIGN KEY (delivery_zone_id) REFERENCES delivery_zones(zone_id) ON DELETE SET NULL
);

-- 7. ORDER ITEMS
CREATE TABLE IF NOT EXISTS order_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    variant_id INT NOT NULL,
    quantity INT NOT NULL,
    unit_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (variant_id) REFERENCES product_variants(variant_id)
);

-- 8. PROMO CODES / COUPONS
CREATE TABLE IF NOT EXISTS coupons (
    coupon_id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) UNIQUE NOT NULL,
    discount_percentage DECIMAL(5, 2) NOT NULL,
    is_active BOOLEAN DEFAULT TRUE
);

-- 9. CUSTOMER FEEDBACK & REVIEWS
CREATE TABLE IF NOT EXISTS feedback (
    feedback_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    comment TEXT NOT NULL,
    review_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- SAMPLE DATA INSERTION

-- Categories
INSERT INTO categories (category_name, description) VALUES
('Sushi | Maki & Agemono Platters', 'Ideal for sharing and solo, with balanced texture, color, and bite.')[cite: 2],
('Agemono | Rice Meals', 'Structured, comforting plates designed for lunch and late service.')[cite: 2],
('Ramens | Salads', 'Deep broths, confident toppings, and minimalist finishing.')[cite: 2];

-- Delivery Zones & Fees
INSERT INTO delivery_zones (zone_name, service_type, delivery_fee, coverage_details) VALUES
('Zone 1: Primary Local Zone (Marilao)', 'Same-Day Express Local Delivery', 80.00, 'Marilao barangays: Abangan Norte, Abangan Sur, Ibayo, Lias, etc.')[cite: 5],
('Zone 1: Primary Local Zone (Marilao)', 'Standard Local Delivery', 50.00, 'Marilao barangays')[cite: 5],
('Zone 1: Primary Local Zone (Marilao)', 'In-Store Pickup', 0.00, 'B6, L6&8, St. Emmanuel Homes, Prenza II, Marilao, Bulacan')[cite: 5],
('Zone 2: Greater Metro Manila & Nearby', 'Standard Regional Delivery', 150.00, 'Meycauayan, Bocaue, SJDMC, Valenzuela, QC, Manila, etc.')[cite: 5];

-- Coupons
INSERT INTO coupons (code, discount_percentage, is_active) VALUES
('SHINKOU10', 10.00, TRUE)[cite: 3, 5];

-- Products & Variants
INSERT INTO products (product_id, category_id, product_name, description, image_url) 
VALUES (1, 1, 'Mixed Sushi Platter', 'A combo of different variations of Sushi and Maki.', 'home.jpg')[cite: 2];

INSERT INTO product_variants (product_id, variant_label, price) VALUES
(1, 'S', 530.00)[cite: 2],
(1, 'M', 650.00)[cite: 2],
(1, 'L', 750.00)[cite: 2],
(1, 'XL', 1190.00)[cite: 2];

INSERT INTO products (product_id, category_id, product_name, description, image_url) 
VALUES (2, 3, 'Tonkotsu Ramen', 'Creamy, milky-white broth made by simmering pork bones for many hours.', 'tonkotsu ramen.jpg')[cite: 2];

INSERT INTO product_variants (product_id, variant_label, price) VALUES
(2, 'Regular', 205.00)[cite: 2];

INSERT INTO products (product_id, category_id, product_name, description, image_url) 
VALUES (3, 2, 'Pork Tonkatsu', 'Breaded, deep-fried pork cutlet with thick, crunchy panko exterior.', 'pork tonkatsu.jpg')[cite: 2];

INSERT INTO product_variants (product_id, variant_label, price) VALUES
(3, 'Solo Rice Meal', 250.00)[cite: 2];

-- Customer Feedback
INSERT INTO feedback (customer_name, rating, comment, review_date) VALUES
('Leahren Sucaldito Madia', 5, 'Masarap ang sushi nila. Legit ang wasabi. And masarap din ang mga ramen! Mas masarap pa sa mga nasa malls.', '2019-09-30')[cite: 6],
('Ed Dizon', 5, 'andami ko ng order, and they never failed to always serve me good. #morepower #goforgold #goodcustomerservice #goosfood #rapsa', '2018-12-08')[cite: 6],
('Erica Magtibay Valonda', 4, 'sulit na sulit. sarap pa ng foods. pati si roman mutuc', '2018-10-26')[cite: 6];