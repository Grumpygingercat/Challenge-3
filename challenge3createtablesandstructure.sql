
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `contactformular` (
  contact_id timestamp PRIMARY KEY NOT NULL DEFAULT current_timestamp(),
  first_name varchar(50) NOT NULL,
  last_name varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  message varchar(2000) NOT NULL
);

CREATE TABLE `customer` (
  user_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  username varchar(16) NOT NULL,
  first_name varchar(50) NOT NULL,
  last_name varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  phone varchar(16) NOT NULL,
  address varchar(200) NOT NULL,
  password varchar(50) NOT NULL
);

CREATE TABLE `orders` (
  order_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  user_id int(11),
  ordertime timestamp NOT NULL DEFAULT current_timestamp(),
  t_shirt_id int(5)
);

CREATE TABLE cart (
  cart_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  user_id int(11),
  t_shirt_id int(5)
);

CREATE TABLE t_shirt (
 t_shirt_id int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
 title varchar(100) NOT NULL,
 pic longblob NOT NULL,
 size enum('S','M','L','XL') NOT NULL,
 price double NOT NULL
);

ALTER TABLE `orders`
  ADD FOREIGN KEY (`user_id`) REFERENCES customer(`user_id`);
ALTER TABLE orders
  ADD FOREIGN KEY (t_shirt_id) REFERENCES t_shirt(t_shirt_id);

ALTER TABLE cart  
  ADD FOREIGN KEY (user_id) REFERENCES customer(user_id);
ALTER TABLE cart  
  ADD FOREIGN KEY (t_shirt_id) REFERENCES t_shirt(t_shirt_id);
