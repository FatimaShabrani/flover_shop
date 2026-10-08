CREATE TABLE IF NOT EXISTS products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255) NOT NULL,
    description TEXT NOT NULL DEFAULT '0',
    stock INT NOT NULL,
    category_id INT DEFAULT NULL,

    FOREIGN KEY (category_id) REFERENCES categories(id)
);