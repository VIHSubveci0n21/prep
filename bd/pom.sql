-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema pom
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pom
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pom` DEFAULT CHARACTER SET utf8 ;
USE `pom` ;

-- -----------------------------------------------------
-- Table `pom`.`persona`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pom`.`persona` ;

CREATE TABLE IF NOT EXISTS `pom`.`persona` (
  `idPersona` INT NOT NULL,
  `tipoDocumento` VARCHAR(8) NULL,
  `documento` VARCHAR(16) NULL,
  `nombre` VARCHAR(32) NULL,
  `apellido` VARCHAR(32) NULL,
  `direccion` VARCHAR(64) NULL,
  `telefono` VARCHAR(12) NULL,
  `email` VARCHAR(64) NULL,
  PRIMARY KEY (`idPersona`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pom`.`rol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pom`.`rol` ;

CREATE TABLE IF NOT EXISTS `pom`.`rol` (
  `idRol` INT NOT NULL,
  `nombre` VARCHAR(32) NULL,
  `Descripcion` VARCHAR(64) NULL,
  PRIMARY KEY (`idRol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pom`.`catalogo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pom`.`catalogo` ;

CREATE TABLE IF NOT EXISTS `pom`.`catalogo` (
  `idCatalogo` INT NOT NULL,
  `codigo` VARCHAR(16) NULL,
  `nombre` VARCHAR(32) NULL,
  `descripcion` VARCHAR(64) NULL,
  `categoria` VARCHAR(32) NULL,
  PRIMARY KEY (`idCatalogo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pom`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pom`.`usuario` ;

CREATE TABLE IF NOT EXISTS `pom`.`usuario` (
  `idUsuario` INT NOT NULL,
  `Persona_id` INT NOT NULL,
  `Rol_id` INT NOT NULL,
  `usuario` VARCHAR(16) NULL,
  `pass` TEXT NULL,
  `estado` VARCHAR(45) NULL,
  `catalogo_idCatalogo` INT NOT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pom`.`poa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pom`.`poa` ;

CREATE TABLE IF NOT EXISTS `pom`.`poa` (
  `idPoa` INT NOT NULL,
  `Usuario_id` INT NOT NULL,
  `mes` INT NOT NULL,
  `departamento` INT NOT NULL,
  `municipio` INT NOT NULL,
  `nuevo` INT NULL,
  `recurrente` INT NULL,
  `subreceptor` INT NOT NULL,
  PRIMARY KEY (`idPoa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pom`.`promotor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pom`.`promotor` ;

CREATE TABLE IF NOT EXISTS `pom`.`promotor` (
  `idPromotor` INT NOT NULL,
  `codigo` VARCHAR(16) NULL,
  `persona_id` INT NOT NULL,
  `subreceptor` INT NOT NULL,
  PRIMARY KEY (`idPromotor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pom`.`insumo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pom`.`insumo` ;

CREATE TABLE IF NOT EXISTS `pom`.`insumo` (
  `idInsumo` INT NOT NULL,
  `actividad_id` INT NOT NULL,
  `cnatural` INT NULL,
  `csabor` INT NULL,
  `lubricante` INT NULL,
  `pruebaVIH` FLOAT NULL,
  `autoPrueba` FLOAT NULL,
  `reactivoE` FLOAT NULL,
  `sifilis` FLOAT NULL,
  PRIMARY KEY (`idInsumo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pom`.`pom`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pom`.`pom` ;

CREATE TABLE IF NOT EXISTS `pom`.`pom` (
  `idPom` INT NOT NULL,
  `poa_id` INT NOT NULL,
  `fecha` DATE NULL,
  `horaInicio` TIME NULL,
  `horaFin` TIME NULL,
  `lugar` VARCHAR(64) NULL,
  `promotor_id` INT NOT NULL,
  `pNuevo` INT NULL,
  `pRecurrente` INT NULL,
  `cnatural` INT NULL,
  `csabor` FLOAT NULL,
  `lubricante` FLOAT NULL,
  `pruebaVIH` FLOAT NULL,
  `autoprueba` FLOAT NULL,
  `reactivo` FLOAT NULL,
  `sifilis` FLOAT NULL,
  PRIMARY KEY (`idPom`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
