
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `contactformular` (
  `contact_id` timestamp NOT NULL DEFAULT current_timestamp(),
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `customer` (
  'user_id' int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  'phone' varchar(16) NOT NULL,
  'address' varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE 'orders' (
  'order_id' int(11) NOT NULL AUTO_INCREMENT,
  'user_id' int(11),
  'ordertime' timestamp NOT NULL DEFAULT current_timestamp(),
  'ordersize' varchar(4)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `contactformular`
  ADD PRIMARY KEY (`contact_id`);


ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

ALTER TABLE 'orders'
  ADD PRIMARY KEY ('order_id'),
  ADD FOREIGN KEY ('user_id') REFERENCES customer('user_id');

