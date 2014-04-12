-- Script de criação INICIAL da base de dados do sistema

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema lojaexemplozf
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `category` (
  `categoryId` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `parentId` INT(10) UNSIGNED NOT NULL,
  `ident` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`categoryId`),
  UNIQUE INDEX `ident` (`ident` ASC),
  INDEX `parent` (`parentId` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `page`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `page` (
  `pageId` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(200) NOT NULL,
  `body` TEXT NOT NULL,
  PRIMARY KEY (`pageId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `product` (
  `productId` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoryId` INT(10) UNSIGNED NOT NULL,
  `ident` VARCHAR(56) NOT NULL,
  `name` VARCHAR(64) NOT NULL,
  `description` TEXT NOT NULL,
  `shortDescription` VARCHAR(200) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `discountPercent` INT(3) NOT NULL,
  `taxable` ENUM('Yes','No') NOT NULL,
  PRIMARY KEY (`productId`),
  UNIQUE INDEX `ident` (`ident` ASC),
  INDEX `category` (`categoryId` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `productimage`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `productimage` (
  `imageId` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `productId` INT(10) UNSIGNED NOT NULL,
  `thumbnail` VARCHAR(200) NOT NULL,
  `full` VARCHAR(200) NOT NULL,
  `isDefault` ENUM('Yes','No') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`imageId`),
  INDEX `productId` (`productId` ASC),
  CONSTRAINT `fk_product`
    FOREIGN KEY (`productId`)
    REFERENCES `product` (`productId`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 22
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user` (
  `userId` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(10) NOT NULL,
  `firstname` VARCHAR(128) NOT NULL,
  `lastname` VARCHAR(128) NOT NULL,
  `email` VARCHAR(128) NOT NULL,
  `passwd` CHAR(40) NOT NULL,
  `salt` CHAR(32) NOT NULL,
  `role` VARCHAR(100) NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`userId`),
  INDEX `email_pass` (`email` ASC, `passwd` ASC),
  INDEX `email` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `category` (
  `categoryId` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `parentId` INT(10) UNSIGNED NOT NULL,
  `ident` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`categoryId`),
  UNIQUE INDEX `ident` (`ident` ASC),
  INDEX `parent` (`parentId` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contact` (
  `contactId` INT(10) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(200) NOT NULL,
  `message` TEXT NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `subject` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`contactId`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `page`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `page` (
  `pageId` INT(10) NOT NULL,
  `title` VARCHAR(200) NOT NULL,
  `body` TEXT NOT NULL,
  `section` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`pageId`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `product` (
  `productId` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoryId` INT(10) UNSIGNED NOT NULL,
  `ident` VARCHAR(56) NOT NULL,
  `name` VARCHAR(64) NOT NULL,
  `description` TEXT NOT NULL,
  `shortDescription` VARCHAR(200) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `discountPercent` INT(3) NOT NULL,
  `taxable` ENUM('Yes','No') NOT NULL,
  PRIMARY KEY (`productId`),
  UNIQUE INDEX `ident` (`ident` ASC),
  INDEX `category` (`categoryId` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `productimage`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `productimage` (
  `imageId` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `productId` INT(10) UNSIGNED NOT NULL,
  `thumbnail` VARCHAR(200) NOT NULL,
  `full` VARCHAR(200) NOT NULL,
  `isDefault` ENUM('Yes','No') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`imageId`),
  INDEX `productId` (`productId` ASC),
  CONSTRAINT `fk_product`
    FOREIGN KEY (`productId`)
    REFERENCES `product` (`productId`)
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 22
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user` (
  `userId` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(10) NOT NULL,
  `firstname` VARCHAR(128) NOT NULL,
  `lastname` VARCHAR(128) NOT NULL,
  `email` VARCHAR(128) NOT NULL,
  `passwd` CHAR(40) NOT NULL,
  `salt` CHAR(32) NOT NULL,
  `role` VARCHAR(100) NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`userId`),
  INDEX `email_pass` (`email` ASC, `passwd` ASC),
  INDEX `email` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `order` (
  `orderId` INT(10) NOT NULL,
  `insertionDate` DATETIME NOT NULL,
  `userId` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`orderId`),
  INDEX `fk_tb_order_user1_idx` (`userId` ASC),
  CONSTRAINT `fk_tb_order_user1`
    FOREIGN KEY (`userId`)
    REFERENCES `user` (`userId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `order_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `order_product` (
  `orderId` INT(10) NOT NULL,
  `productId` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`orderId`, `productId`),
  INDEX `fk_tb_order_has_product_product1_idx` (`productId` ASC),
  INDEX `fk_tb_order_has_product_tb_order1_idx` (`orderId` ASC),
  CONSTRAINT `fk_tb_order_has_product_tb_order1`
    FOREIGN KEY (`orderId`)
    REFERENCES `order` (`orderId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_order_has_product_product1`
    FOREIGN KEY (`productId`)
    REFERENCES `product` (`productId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
