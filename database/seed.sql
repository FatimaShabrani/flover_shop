USE flover_shop_test;
INSERT INTO categories (id, name, image) VALUES
(1, 'Test Flowers', 'bouquet-of-white-roses_1.webp'),
(2, 'Bouquets', 'باقة بيضا.jpg'),
(3, 'Graduation', 'تخرج.jpg'),
(4, 'Teddy Bears', 'دب ززرد.jpg'),
(5, 'Gift Boxes', 'ميلادg.jpg');



INSERT INTO products
(id, name, price, image, category, description, stock, category_id)
VALUES
(1, 'Rose Bouquet', 25.00,
'bouquet-of-white-roses_1.webp',
'Bouquets',
'A beautiful bouquet of fresh white roses, perfect for special occasions.',
6, 2),

(2, 'Red Rose Bouquet', 30.00,
'bouquets/Gemini_Generated_Image_6w7cub6w7cub6w7c-removebg-preview.png',
'Bouquets',
'A beautiful bouquet of fresh red roses',
7, 2);



INSERT INTO orders
(id, customer_name, phone, address, total, status)
VALUES
(1, 'Test Customer', '0790000000', 'Amman', 75.00, 'Pending');



INSERT INTO order_items
(id, order_id, product_id, quantity, price)
VALUES
(1, 1, 1, 3, 25.00);



