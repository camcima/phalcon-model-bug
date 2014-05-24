CREATE  TABLE `orders` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `hash` CHAR(32) NOT NULL ,
  `order_number` INT NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) );

CREATE  TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `hash` CHAR(32) NOT NULL ,
  `name` VARCHAR(100) NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) );

CREATE  TABLE `vouchers` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `hash` CHAR(32) NOT NULL ,
  `code` VARCHAR(100) NOT NULL ,
  `amount` FLOAT NOT NULL ,
  `order_id` INT NULL ,
  `user_id` INT NULL ,
  `created_at` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fkey_orders_idx` (`order_id` ASC) ,
  INDEX `fkey_users_idx` (`user_id` ASC) ,
  CONSTRAINT `fkey_orders`
    FOREIGN KEY (`order_id` )
    REFERENCES `orders` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkey_users`
    FOREIGN KEY (`user_id` )
    REFERENCES `users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

