-- MySQL Script generated by MySQL Workbench
-- Tue Jun 22 21:07:27 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema receitas
-- -----------------------------------------------------
-- Base de dados de receitas.

-- -----------------------------------------------------
-- Schema receitas
--
-- Base de dados de receitas.
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `receitas` DEFAULT CHARACTER SET utf8 ;
USE `receitas` ;

-- -----------------------------------------------------
-- Table `receitas`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `receitas`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Chave primária de auto incremento que identifica cada registro de categoria de receita.',
  `titulo` VARCHAR(50) NOT NULL COMMENT 'Campo de texto não nulo que armazena o nome da categoria de receita.',
  `slug` VARCHAR(60) NOT NULL COMMENT 'Campo de texto não nulo que armazena a parte da URL que pode ser legível tanto para humanos quanto para mecanismos de busca. É a versão amigável da URL.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'Entidade que armazena as categorias de receitas.';


-- -----------------------------------------------------
-- Table `receitas`.`receita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `receitas`.`receita` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Chave primária de auto incremento que identifica cada registro de receita.',
  `titulo` VARCHAR(100) NOT NULL COMMENT 'Campo de texto não nulo que armazena o nome da receita.',
  `slug` VARCHAR(120) NOT NULL COMMENT 'Campo de texto não nulo que armazena a parte da URL que pode ser legível tanto para humanos quanto para mecanismos de busca. É a versão amigável da URL.',
  `linha_fina` VARCHAR(250) NOT NULL COMMENT 'Campo de texto não nulo que armazena uma breve descrição da receita.',
  `descricao` TEXT NOT NULL COMMENT 'Campo de texto não nulo que armazena o modo de preparo da receita.',
  `categoria_id` INT NOT NULL COMMENT 'Chave estrangeira de auto incremento que identifica o registro de categoria de receita.',
  PRIMARY KEY (`id`),
  INDEX `fk_receita_categoria_idx` (`categoria_id` ASC) VISIBLE,
  CONSTRAINT `fk_receita_categoria`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `receitas`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Entidade que armazena as receitas.';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
