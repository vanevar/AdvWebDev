-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema agile_tool
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema agile_tool
-- -----------------------------------------------------
-- CREATE SCHEMA IF NOT EXISTS `agile_tool` DEFAULT CHARACTER SET utf8 ;
-- USE `agile_tool` ;

-- -----------------------------------------------------
-- Table `agile_tool`.`member`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agile_tool`.`member` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL DEFAULT 'encrypted value',
  `first_name` VARCHAR(30) NOT NULL,
  `last_name` VARCHAR(30) NOT NULL,
  `created_at` DATETIME NULL,
  `confirmed_at` DATETIME NULL,
  `token` VARCHAR(45) NULL DEFAULT 'to confirm sign up, or renew password\'',
  `token_expiring_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `member_name_firs_name_unique` (`first_name` ASC, `last_name` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agile_tool`.`project`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agile_tool`.`project` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `administrator_id` INT(10) UNSIGNED NOT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_project_member3_idx` (`administrator_id` ASC),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC),
  CONSTRAINT `fk_project_member3`
    FOREIGN KEY (`administrator_id`)
    REFERENCES `agile_tool`.`member` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agile_tool`.`user_role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agile_tool`.`user_role` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agile_tool`.`iteration`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agile_tool`.`iteration` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `deadline` DATE NOT NULL,
  `project_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_iteration_project1_idx` (`project_id` ASC),
  UNIQUE INDEX `deadline_UNIQUE` (`deadline` ASC),
  CONSTRAINT `fk_iteration_project1`
    FOREIGN KEY (`project_id`)
    REFERENCES `agile_tool`.`project` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agile_tool`.`feature`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agile_tool`.`feature` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `functionality` VARCHAR(255) NOT NULL,
  `benefit` VARCHAR(255) NOT NULL,
  `priority` INT(11) NULL,
  `iteration_id` INT(10) UNSIGNED NULL,
  `project_id` INT(10) UNSIGNED NOT NULL,
  `user_role_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_feature_project1_idx` (`project_id` ASC),
  INDEX `fk_feature_user_role1_idx` (`user_role_id` ASC),
  UNIQUE INDEX `title_UNIQUE` (`title` ASC),
  INDEX `fk_feature_iteration1_idx` (`iteration_id` ASC),
  UNIQUE INDEX `functionality_UNIQUE` (`functionality` ASC),
  CONSTRAINT `fk_feature_project1`
    FOREIGN KEY (`project_id`)
    REFERENCES `agile_tool`.`project` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_feature_user_role1`
    FOREIGN KEY (`user_role_id`)
    REFERENCES `agile_tool`.`user_role` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_feature_iteration1`
    FOREIGN KEY (`iteration_id`)
    REFERENCES `agile_tool`.`iteration` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agile_tool`.`task_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agile_tool`.`task_status` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agile_tool`.`task`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agile_tool`.`task` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `estimated_duration` INT(10) UNSIGNED NULL,
  `actual_duration` INT(10) UNSIGNED NULL,
  `feature_id` INT(10) UNSIGNED NOT NULL,
  `status_id` INT(10) UNSIGNED NOT NULL,
  `owner_id` INT(10) UNSIGNED NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_task_feature1_idx` (`feature_id` ASC),
  INDEX `fk_task_status1_idx` (`status_id` ASC),
  INDEX `fk_task_member1_idx` (`owner_id` ASC),
  CONSTRAINT `fk_task_feature1`
    FOREIGN KEY (`feature_id`)
    REFERENCES `agile_tool`.`feature` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_task_status1`
    FOREIGN KEY (`status_id`)
    REFERENCES `agile_tool`.`task_status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_task_member1`
    FOREIGN KEY (`owner_id`)
    REFERENCES `agile_tool`.`member` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agile_tool`.`acceptance_test`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agile_tool`.`acceptance_test` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(255) NOT NULL,
  `test_result` TEXT NULL DEFAULT NULL,
  `feature_id` INT(10) UNSIGNED NOT NULL,
  `bug_id` INT(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_acceptance_test_feature1_idx` (`feature_id` ASC),
  INDEX `fk_acceptance_test_task1_idx` (`bug_id` ASC),
  CONSTRAINT `fk_acceptance_test_feature`
    FOREIGN KEY (`feature_id`)
    REFERENCES `agile_tool`.`feature` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_acceptance_test_task`
    FOREIGN KEY (`bug_id`)
    REFERENCES `agile_tool`.`task` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agile_tool`.`tag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agile_tool`.`tag` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `label_UNIQUE` (`name` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agile_tool`.`feature_tag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agile_tool`.`feature_tag` (
  `feature_id` INT(10) UNSIGNED NOT NULL,
  `tag_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`feature_id`, `tag_id`),
  INDEX `fk_feature_has_tag_tag1_idx` (`tag_id` ASC),
  INDEX `fk_feature_has_tag_feature1_idx` (`feature_id` ASC),
  CONSTRAINT `fk_feature_has_tag_feature1`
    FOREIGN KEY (`feature_id`)
    REFERENCES `agile_tool`.`feature` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_feature_has_tag_tag1`
    FOREIGN KEY (`tag_id`)
    REFERENCES `agile_tool`.`tag` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agile_tool`.`project_role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agile_tool`.`project_role` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agile_tool`.`project_member`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agile_tool`.`project_user` (
  `user_id` INT(10) UNSIGNED NOT NULL,
  `project_id` INT(10) UNSIGNED NOT NULL,
  `role_id` INT(10) UNSIGNED NOT NULL,
  `added_at` DATETIME NOT NULL,
  `token` VARCHAR(45) NULL,
  PRIMARY KEY (`user_id`, `project_id`),
  INDEX `fk_member_has_project_project1_idx` (`project_id` ASC),
  INDEX `fk_member_has_project_member_idx` (`user_id` ASC),
  INDEX `fk_project_member_Role1_idx` (`role_id` ASC),
  CONSTRAINT `fk_member_has_project_member`
    FOREIGN KEY (`user_id`)
    REFERENCES `agile_tool`.`member` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_member_has_project_project1`
    FOREIGN KEY (`project_id`)
    REFERENCES `agile_tool`.`project` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_project_member_Role1`
    FOREIGN KEY (`role_id`)
    REFERENCES `agile_tool`.`project_role` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agile_tool`.`acceptance_test_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agile_tool`.`acceptance_test_status` (
  `iteration_id` INT(10) UNSIGNED NOT NULL,
  `acceptance_test_id` INT(10) UNSIGNED NOT NULL,
  `is_satisfied` TINYINT(1) NULL,
  PRIMARY KEY (`iteration_id`, `acceptance_test_id`),
  INDEX `fk_iteration_has_acceptance_test_acceptance_test1_idx` (`acceptance_test_id` ASC),
  INDEX `fk_iteration_has_acceptance_test_iteration1_idx` (`iteration_id` ASC),
  CONSTRAINT `fk_iteration_has_acceptance_test_iteration1`
    FOREIGN KEY (`iteration_id`)
    REFERENCES `agile_tool`.`iteration` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_iteration_has_acceptance_test_acceptance_test1`
    FOREIGN KEY (`acceptance_test_id`)
    REFERENCES `agile_tool`.`acceptance_test` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
