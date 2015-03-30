CREATE TABLE IF NOT EXISTS `pepemarket`.`users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `money` INT(0) UNSIGNED NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';




CREATE TABLE `pepemarket`.`pepes` (
  `idPepes` INT NOT NULL AUTO_INCREMENT,
  `Title` TINYTEXT NULL,
  `Description` MEDIUMTEXT NULL,
  `DateAdded` DATE NOT NULL,
  `WMLocation` TINYTEXT NULL,
  `CLRLocation` TINYTEXT NULL,
  `Price` INT(0) UNSIGNED NULL,
  `Owner` VARCHAR(64) NULL,
  PRIMARY KEY (`idPepes`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


CREATE TABLE `pepemarket`.`comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(64) NULL,
  `comment` LONGTEXT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
ALTER TABLE `pepemarket`.`comments` 
ADD COLUMN `listingid` INT NULL AFTER `date`;
