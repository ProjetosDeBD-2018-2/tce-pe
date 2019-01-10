-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tce-razoavel
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tce-razoavel
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tce-razoavel` DEFAULT CHARACTER SET utf8 ;
USE `tce-razoavel` ;

-- -----------------------------------------------------
-- Table `tce-razoavel`.`unidadegestora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tce-razoavel`.`unidadegestora` (
  `id` INT NOT NULL,
  `id_unidade_gestora` INT NOT NULL,
  `cnpj` VARCHAR(14) NULL,
  `orgao` VARCHAR(200) NULL,
  `sigla` VARCHAR(20) NULL,
  `esfera` VARCHAR(10) NULL,
  `municipio` VARCHAR(40) NULL,
  `situacao` VARCHAR(40) NULL,
  `poder` VARCHAR(30) NULL,
  `unifed` VARCHAR(2) NULL,
  `natureza` VARCHAR(50) NULL,
  PRIMARY KEY (`id`, `id_unidade_gestora`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tce-razoavel`.`contrato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tce-razoavel`.`contrato` (
  `id` INT NOT NULL,
  `numerocontrato` VARCHAR(10) NOT NULL,
  `idunidadegestora` INT NULL,
  `codigoug` INT NOT NULL,
  `anocontrato` INT NOT NULL,
  `cpf_cnpj` VARCHAR(14) NULL,
  `vigencia` VARCHAR(63) NULL,
  `objeto` VARCHAR(106) NULL,
  `valorcontrato` DOUBLE NULL,
  `estagiocontrato` VARCHAR(15) NULL,
  `situacaocontrato` VARCHAR(50) NULL,
  `linkarquivo` VARCHAR(500) NULL,
  PRIMARY KEY (`id`, `numerocontrato`, `anocontrato`),
  INDEX `fk_contrato_unidadegestora1_idx` (`idunidadegestora` ASC, `codigoug` ASC),
  CONSTRAINT `fk_contrato_unidadegestora1`
    FOREIGN KEY (`idunidadegestora` , `codigoug`)
    REFERENCES `tce-razoavel`.`unidadegestora` (`id` , `id_unidade_gestora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tce-razoavel`.`termoaditivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tce-razoavel`.`termoaditivo` (
  `id` INT NOT NULL,
  `numerotermoaditivo` VARCHAR(10) NOT NULL,
  `idcontrato` INT NULL,
  `numerocontrato` VARCHAR(10) NOT NULL,
  `anocontrato` INT NOT NULL,
  `justificativatermoaditivo` VARCHAR(300) NULL,
  `valortermoaditivo` DOUBLE NULL,
  `valoracrescimo` DOUBLE NULL,
  `valorreducao` DOUBLE NULL,
  PRIMARY KEY (`id`, `numerotermoaditivo`),
  INDEX `fk_termoaditivo_contrato1_idx` (`idcontrato` ASC, `numerocontrato` ASC, `anocontrato` ASC),
  CONSTRAINT `fk_termoaditivo_contrato1`
    FOREIGN KEY (`idcontrato` , `numerocontrato` , `anocontrato`)
    REFERENCES `tce-razoavel`.`contrato` (`id` , `numerocontrato` , `anocontrato`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
