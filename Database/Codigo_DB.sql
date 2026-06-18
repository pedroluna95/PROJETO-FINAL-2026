-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Usuários`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuários` (
  `user_ID` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(60) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Senha` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`user_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Vagas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Vagas` (
  `Vaga_ID` INT NOT NULL,
  `Nome_vaga` VARCHAR(60) NOT NULL,
  `Desc_vaga` VARCHAR(45) NOT NULL,
  `Area_de_atuacao` VARCHAR(45) NOT NULL,
  `Requisitos` VARCHAR(150) NOT NULL,
  `Empresa` VARCHAR(45) NULL,
  PRIMARY KEY (`Vaga_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Atribuicoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Atribuicoes` (
  `Atribuicao_ID` INT NOT NULL,
  `Nome_atribuicao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Atribuicao_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuários_has_Atribuicoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuários_has_Atribuicoes` (
  `User_ID` INT NOT NULL,
  `Atribuicoes_ID` INT NOT NULL,
  PRIMARY KEY (`User_ID`, `Atribuicoes_ID`),
  INDEX `fk_Usuários_has_Atribuicoes_Atribuicoes1_idx` (`Atribuicoes_ID` ASC) VISIBLE,
  INDEX `fk_Usuários_has_Atribuicoes_Usuários_idx` (`User_ID` ASC) VISIBLE,
  CONSTRAINT `fk_Usuários_has_Atribuicoes_Usuários`
    FOREIGN KEY (`User_ID`)
    REFERENCES `mydb`.`Usuários` (`user_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuários_has_Atribuicoes_Atribuicoes1`
    FOREIGN KEY (`Atribuicoes_ID`)
    REFERENCES `mydb`.`Atribuicoes` (`Atribuicao_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
