-- =========================
-- DATABASE
-- =========================
USE uniq_db;

-- =========================
-- ADMINS & USERS
-- =========================

INSERT INTO admins (username, password_hash, email, role) VALUES
('admin', '$2y$12$wTvJXqcfg1e6df0RtRUFB.7vkDvRWdCHJlO/S/6veiGYCJIar5khG', 'admin@example.com', 'admin');

INSERT INTO users (username, email, password_hash, status) VALUES
('jdoe', 'jdoe@example.com', 'hash123', 'active'),
('asmith', 'asmith@example.com', 'hash456', 'active'),
('user', 'user@example.com', '$2y$12$tW18cOPvKn62DrDoDScuR./jixT2aYZzxa4XB7XtaUFhEuvscIUlC', 'active');

INSERT INTO user_profiles (user_id, name, surname, birthdate, gender, phone, biography, profile_img_url) VALUES
(1, 'John', 'Doe', '1980-01-01', 'male', '123-456-7890', 'Biography of John Doe', 'profile_images/john_doe.jpg'),
(2, 'Anna', 'Smith', '1990-02-02', 'female', '234-567-8901', 'Biography of Anna Smith', 'profile_images/anna_smith.jpg'),
(3, 'Regular', 'User', '2000-03-03', 'male', '345-678-9012', 'Biography of Regular User', '/uploads/profile_images/test_user.jpg');

INSERT INTO user_addresses (user_id, address_type, country, city, zip_code, street, street_number) VALUES
(1, 'billing', 'USA', 'New York', '10001', '5th Avenue', '1'),
(1, 'shipping', 'USA', 'New York', '10001', 'Madison Ave', '10'),
(2, 'billing', 'Germany', 'Berlin', '10115', 'Unter den Linden', '5'),
(3, 'shipping', 'France', 'Paris', '75002', 'Boulevard Montmartre', '18'),
(3, 'billing', 'France', 'Paris', '75001', 'Rue de Rivoli', '12');

-- =========================
-- CATEGORIES
-- =========================

INSERT INTO categories (name, slug, image_url, is_promotional, parent_id) VALUES
('Electronics', 'electronics', 'uploads/product_images/USB-C_Charger.jpg', FALSE,  NULL),     -- 1
('Clothing', 'clothing', 'uploads/product_images/Hoodie.jpg', FALSE, NULL),           -- 2
('Smartphones', 'smartphones', 'uploads/product_images/iPhone15.jpg', TRUE, 1),        -- 3
('Laptops', 'laptops', 'uploads/product_images/macm2.jpg', TRUE, 1),                -- 4
('Accessories', 'accessories', 'uploads/product_images/UVGlasses.jpg', TRUE, 1),        -- 5
('Men Clothing', 'men-clothing', 'uploads/product_images/Jacket.jpg', FALSE, 2),      -- 6
('Women Clothing', 'women-clothing', 'uploads/product_images/skirt.jpg', FALSE, 2),  -- 7
('Shoes', 'shoes', 'uploads/product_images/sneakers.jpg', FALSE, 2);                    -- 8

-- =========================
-- ATTRIBUTES
-- =========================

INSERT INTO attributes (name, unit, data_type) VALUES
('Color', 'hexCode', 'string'),     -- 1
('Size', 'inches', 'number'),      -- 2
('Storage', 'GB', 'number'),   -- 3
('RAM', 'GB', 'number'),       -- 4
('Version', 'text', 'string'),
('Material', 'text', 'string'),
('Skirt Length', 'cm', 'number'),
('Brand', 'text', 'string');

INSERT INTO category_attributes (category_id, attribute_id, is_required, is_filterable) VALUES
(3, 3, true, true),   -- Smartphone storage
(3, 4, true, true),   -- Smartphone RAM
(4, 3, true, true),   -- Laptop storage
(4, 4, true, true),   -- Laptop RAM
(2, 1, false, true),
(2, 2, true, true),
(8, 2, true, true);

-- =========================
-- PRODUCTS (22 TOTAL)
-- =========================

INSERT INTO products (title, description, image_url, price, discount_percentage, stock_quantity, is_promotional, status) VALUES
('iPhone 15', 'Latest Apple smartphone', 'uploads/product_images/iPhone15.jpg', 999.99, 10, 100, TRUE, 'active'),        -- 1
('Samsung Galaxy S23', 'Flagship Android phone', 'uploads/product_images/samsungs23u.jpg', 899.99, 5, 200, TRUE, 'active'),-- 2
('Google Pixel 8', 'Pure Android experience', 'uploads/product_images/pixel8.jpg', 799.99, 0, 150, TRUE, 'active'),   -- 3
('MacBook Air M2', 'Apple laptop with M2 chip', 'uploads/product_images/macm2.jpg', 1199.99, 0, 100, TRUE, 'active'),-- 4
('Dell XPS 13', 'Premium ultrabook', 'uploads/product_images/dell13.jpg', 1099.99, 0, 100, FALSE, 'active'),            -- 5
('Lenovo ThinkPad X1', 'Business laptop', 'uploads/product_images/LenovoX1.jpg', 1299.99, 0, 100, TRUE, 'active'),      -- 6
('USB-C Charger', 'Fast charging adapter', 'uploads/product_images/USB-C_Charger.jpg', 29.99, 0, 300, FALSE, 'active'),       -- 7
('Wireless Mouse', 'Ergonomic mouse', 'uploads/product_images/Wireless_Mouse.jpg', 39.99, 0, 200, TRUE, 'active'),            -- 8
('Bluetooth Headphones', 'Noise cancelling', 'uploads/product_images/BLHead.jpg', 149.99, 0, 150, TRUE, 'active'),   -- 9
('T-Shirt', 'Cotton T-shirt', 'uploads/product_images/T-Shirt.jpg', 19.99, 0, 500, TRUE, 'active'),                    -- 10
('Jeans', 'Slim fit jeans',  'uploads/product_images/Jeans.jpg', 49.99, 0, 300, FALSE, 'active'),                      -- 11
('Hoodie', 'Warm hoodie', 'uploads/product_images/Hoodie.jpg', 59.99, 0, 200, FALSE, 'active'),                        -- 12
('Jacket', 'Winter jacket', 'uploads/product_images/Jacket.jpg', 129.99, 0, 150, TRUE, 'active'),                     -- 13
('Sneakers', 'Running shoes',  'uploads/product_images/sneakers.jpg', 89.99, 0, 250, TRUE, 'active'),                   -- 14
('Leather Shoes', 'Formal shoes', 'uploads/product_images/shoes_12445_.jpg', 119.99, 0, 100, TRUE, 'active'),               -- 15
('Dress', 'Elegant evening dress', 'uploads/product_images/dress.jpg', 149.99, 0, 100, TRUE, 'active'),              -- 16
('Skirt', 'Casual skirt', 'uploads/product_images/skirt.jpg', 39.99, 0, 200, TRUE, 'active'),                        -- 17
('Smartwatch', 'Fitness tracking watch', 'uploads/product_images/Fwatch.jpg', 199.99, 0, 150, FALSE, 'active'),        -- 18
('Tablet', '10-inch Android tablet', 'uploads/product_images/AndroidTablet.jpg', 299.99, 0, 100, TRUE, 'active'),            -- 19
('Gaming Laptop', 'High performance gaming laptop', 'uploads/product_images/gaming_laptop.jpg', 1799.99, 0, 100, TRUE, 'active'), -- 20
('Backpack', 'Laptop backpack', 'uploads/product_images/lbackpack.jpg', 69.99, 0, 100, TRUE, 'active'),                  -- 21
('Sunglasses', 'UV protection glasses', 'uploads/product_images/UVGlasses.jpg', 59.99, 0, 100, TRUE, 'active');          -- 22

-- =========================
-- PRODUCT CATEGORIES
-- =========================

INSERT INTO product_categories (product_id, category_id) VALUES
(1, 3), (2, 3), (3, 3),
(4, 4), (5, 4), (6, 4), (20, 4),
(7, 5), (8, 5), (9, 5), (18, 5), (21, 5), (22, 5),
(10, 6), (11, 6), (12, 6), (13, 6),
(14, 8), (15, 8),
(16, 7), (17, 7);

-- =========================
-- PRODUCT ATTRIBUTES
-- =========================

INSERT INTO product_attributes (product_id, attribute_id, value) VALUES
(1, 3, '256'), (1, 4, '8'),
(2, 3, '256'), (2, 4, '8'),
(3, 3, '128'), (3, 4, '8'),
(4, 3, '512'), (4, 4, '16'),
(5, 3, '512'), (5, 4, '16'),
(6, 3, '1024'), (6, 4, '32'),
(10, 1, 'Black'), (10, 2, 'L'),
(11, 1, 'Blue'), (11, 2, 'M'),
(14, 2, '42'),
(16, 1, 'Red'), (16, 2, 'S');

-- =========================
-- LIKES & RATINGS
-- =========================

INSERT INTO product_likes (product_id, user_id) VALUES
(1, 1), 
(2, 2), 
(4, 3), 
(10, 1), 
(14, 2),
(3, 3),
(6, 3),
(14, 3),
(18, 3),
(22, 3);

INSERT INTO product_ratings (product_id, user_id, rating, review_text) VALUES
(1, 1, 5, 'Excellent phone'),
(2, 2, 4, 'Great Android device'),
(4, 3, 5, 'Very fast laptop'),
(10, 1, 4, 'Good quality fabric'),
(14, 2, 5, 'Very comfortable'),
(3, 3, 4, 'Clean Android experience, very smooth'),
(6, 3, 5, 'Perfect business laptop'),
(18, 3, 3, 'Good features but battery could be better'),
(22, 3, 4, 'Stylish and lightweight');

-- =========================
-- CARTS
-- =========================

INSERT INTO carts (user_id, currency) VALUES
(1, 'USD'),
(2, 'EUR'),
(3, 'EUR');

INSERT INTO cart_items (cart_id, product_id, quantity, unit_price) VALUES
(1, 1, 1, 999.99),
(1, 10, 2, 19.99),
(2, 14, 1, 89.99),
(3, 4, 1, 1199.99),  -- MacBook Air M2
(3, 8, 2, 39.99),    -- Wireless Mouse
(3, 21, 1, 69.99);   -- Backpack

-- =========================
-- WISHLISTS
-- =========================

INSERT INTO wishlists (user_id) VALUES
(2),
(3);

INSERT INTO wishlist_items (wishlist_id, product_id, quantity) VALUES
(1, 4, 1),
(1, 18, 1),
(2, 20, 1),
(2, 1, 1),   -- iPhone 15
(2, 9, 1),   -- Bluetooth Headphones
(2, 13, 1);  -- Jacket

-- =========================
-- ORDERS
-- =========================

INSERT INTO orders (
    user_id, status, total_amount, currency,
    billing_address_id, shipping_address_id,
    bl_address_snapshot, sh_address_snapshot
) VALUES
(
    1, 'paid', 1039.97, 'USD', 1, 2,
    '{"city":"New York","street":"5th Avenue"}',
    '{"city":"New York","street":"Madison Ave"}'
),
(
    2, 'shipped', 239.98, 'EUR', 3, 3,
    '{"city":"Berlin","street":"Unter den Linden"}',
    '{"city":"Berlin","street":"Unter den Linden"}'
),
(
    3, 'pending', 239.97, 'EUR',
    4, 5,
    '{"city":"Paris","street":"Rue de Rivoli"}',
    '{"city":"Paris","street":"Boulevard Montmartre"}'
),
(
    3, 'delivered', 139.98, 'EUR',
    4, 5,
    '{"city":"Paris","street":"Rue de Rivoli"}',
    '{"city":"Paris","street":"Boulevard Montmartre"}'
);

INSERT INTO order_items (
    order_id, product_id, quantity, unit_price, status, product_snapshot
) VALUES
(1, 1, 1, 999.99, 'fulfilled', '{"title":"iPhone 15","price":999.99}'),
(1, 10, 2, 19.99, 'fulfilled', '{"title":"T-Shirt","price":19.99}'),
(2, 14, 2, 89.99, 'fulfilled', '{"title":"Sneakers","price":89.99}'),
(3, 9, 1, 149.99, 'pending', '{"title":"Bluetooth Headphones","price":149.99}'),
(3, 21, 1, 69.99, 'pending', '{"title":"Backpack","price":69.99}'),
(4, 12, 1, 59.99, 'fulfilled', '{"title":"Hoodie","price":59.99}'),
(4, 17, 2, 39.99, 'fulfilled', '{"title":"Skirt","price":39.99}');

-- =========================
-- PAYMENTS
-- =========================

INSERT INTO payments (
    order_id, provider, transaction_id, amount, status, paid_at
) VALUES
(1, 'Stripe', 'txn_123456', 1039.97, 'success', CURRENT_TIMESTAMP),
(2, 'PayPal', 'txn_654321', 239.98, 'success', CURRENT_TIMESTAMP),
(4, 'Stripe', 'txn_user3_001', 139.98, 'success', CURRENT_TIMESTAMP),
(3, 'Stripe', 'txn_user3_002', 239.97, 'pending', CURRENT_TIMESTAMP);

INSERT INTO payment_events (payment_id, type) VALUES
(1, 'created'), 
(1, 'authorized'), 
(1, 'captured'),
(2, 'created'), 
(2, 'captured'),
(3, 'created'),
(3, 'authorized'),
(4, 'created'),
(4, 'authorized'),
(4, 'captured');


