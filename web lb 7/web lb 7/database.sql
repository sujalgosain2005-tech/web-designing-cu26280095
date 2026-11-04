CREATE DATABASE IF NOT EXISTS online_bookstore CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE online_bookstore;

CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL,
 email VARCHAR(190) NOT NULL UNIQUE,
 password VARCHAR(255) NOT NULL,
 role ENUM('customer','admin') NOT NULL DEFAULT 'customer',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE books (
 id INT AUTO_INCREMENT PRIMARY KEY,
 title VARCHAR(200) NOT NULL,
 author VARCHAR(150) NOT NULL,
 category VARCHAR(100) NOT NULL DEFAULT 'General',
 description TEXT,
 price DECIMAL(10,2) NOT NULL,
 stock INT NOT NULL DEFAULT 0,
 image VARCHAR(255) DEFAULT '',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE orders (
 id INT AUTO_INCREMENT PRIMARY KEY,
 user_id INT NOT NULL,
 total DECIMAL(10,2) NOT NULL,
 shipping_name VARCHAR(120) NOT NULL,
 shipping_address TEXT NOT NULL,
 shipping_phone VARCHAR(30) NOT NULL,
 status ENUM('Pending','Shipped','Delivered') NOT NULL DEFAULT 'Pending',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE order_items (
 id INT AUTO_INCREMENT PRIMARY KEY,
 order_id INT NOT NULL,
 book_id INT NOT NULL,
 quantity INT NOT NULL,
 unit_price DECIMAL(10,2) NOT NULL,
 FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
 FOREIGN KEY (book_id) REFERENCES books(id)
);

CREATE TABLE reviews (
 id INT AUTO_INCREMENT PRIMARY KEY,
 user_id INT NOT NULL,
 book_id INT NOT NULL,
 rating TINYINT NOT NULL CHECK (rating BETWEEN 1 AND 5),
 comment TEXT,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 UNIQUE KEY one_review_per_user_book (user_id, book_id),
 FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
 FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE
);

CREATE TABLE wishlist (
 user_id INT NOT NULL,
 book_id INT NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (user_id, book_id),
 FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
 FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE
);

-- Demo books
INSERT INTO books (title,author,category,description,price,stock,image) VALUES
('The Alchemist','Paulo Coelho','Fiction','A story about following your dreams.',299.00,12,''),
('Atomic Habits','James Clear','Self Help','Build good habits and break bad ones.',450.00,8,''),
('Clean Code','Robert C. Martin','Technology','A handbook of agile software craftsmanship.',650.00,5,''),
('Wings of Fire','A. P. J. Abdul Kalam','Biography','The autobiography of Dr. A. P. J. Abdul Kalam.',250.00,10,'');
