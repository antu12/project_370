-- MySQL Script generated by MySQL Workbench
-- 08/06/15 00:25:39
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ChessMaestro
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ChessMaestro
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ChessMaestro` DEFAULT CHARACTER SET utf8 ;
USE `ChessMaestro` ;

-- -----------------------------------------------------
-- Table `ChessMaestro`.`Player`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ChessMaestro`.`Player` ;

CREATE TABLE IF NOT EXISTS `ChessMaestro`.`Player` (
  `PID` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `password` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `Name` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `email` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `country` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `rank` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `gamesPlayed` INT NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`PID`)  COMMENT '',
  UNIQUE INDEX `email_UNIQUE` (`email` ASC)  COMMENT '')
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;