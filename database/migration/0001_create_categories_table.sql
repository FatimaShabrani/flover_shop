-- -- if not exists
-- if not exists (select * from information_schema.tables where table_name = 'categories') then
--     create table orders (
--         id INT PRIMARY KEY AUTO_INCREMENT,
--     name VARCHAR(100) NOT NULL,
--     image VARCHAR(255) DEFAULT NULL
--     );
-- end if;


CREATE TABLE IF NOT EXISTS categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    image VARCHAR(255) DEFAULT NULL
);