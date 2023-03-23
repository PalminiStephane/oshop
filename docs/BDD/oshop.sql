CREATE DATABASE IF NOT EXISTS `BRANDS` DEFAULT CHARACTER SET UTF8MB4 COLLATE utf8_general_ci;
USE `BRANDS`;

CREATE TABLE `BRAND` (
  `brand_code` VARCHAR(42),
  `brand_name` VARCHAR(42),
  PRIMARY KEY (`brand_code`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `CATEGORY` (
  `category_code` VARCHAR(42),
  `category_name` VARCHAR(42),
  `subtitle` VARCHAR(42),
  `picture` VARCHAR(42),
  `home_order` VARCHAR(42),
  PRIMARY KEY (`category_code`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `PRODUCT` (
  `product_code` VARCHAR(42),
  `product_name` VARCHAR(42),
  `description` VARCHAR(42),
  `picture` VARCHAR(42),
  `price` VARCHAR(42),
  `rate` VARCHAR(42),
  `status` VARCHAR(42),
  `brand_code` VARCHAR(42),
  `category_code` VARCHAR(42),
  `type_code` VARCHAR(42),
  PRIMARY KEY (`product_code`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `TYPE` (
  `type_code` VARCHAR(42),
  `type_name` VARCHAR(42),
  PRIMARY KEY (`type_code`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

ALTER TABLE `PRODUCT` ADD FOREIGN KEY (`type_code`) REFERENCES `TYPE` (`type_code`);
ALTER TABLE `PRODUCT` ADD FOREIGN KEY (`category_code`) REFERENCES `CATEGORY` (`category_code`);
ALTER TABLE `PRODUCT` ADD FOREIGN KEY (`brand_code`) REFERENCES `BRAND` (`brand_code`);