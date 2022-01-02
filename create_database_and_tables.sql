-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema quantox_test_predrag_rakonjac
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema quantox_test_predrag_rakonjac
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `quantox_test_predrag_rakonjac` DEFAULT CHARACTER SET utf8 ;
USE `quantox_test_predrag_rakonjac` ;

-- -----------------------------------------------------
-- Table `quantox_test_predrag_rakonjac`.`students`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quantox_test_predrag_rakonjac`.`students` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `school_board` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Insert example data
-- -----------------------------------------------------
INSERT INTO `quantox_test_predrag_rakonjac`.`students` (`name`, `school_board`) VALUES ('Marko Markovic', 'CSM');
INSERT INTO `quantox_test_predrag_rakonjac`.`students` (`name`, `school_board`) VALUES ('Petar Petrovic', 'CSM');
INSERT INTO `quantox_test_predrag_rakonjac`.`students` (`name`, `school_board`) VALUES ('Janko Jankovic', 'CSMB');
INSERT INTO `quantox_test_predrag_rakonjac`.`students` (`name`, `school_board`) VALUES ('Mitar Mitrovic', 'CSMB');
INSERT INTO `quantox_test_predrag_rakonjac`.`students` (`name`, `school_board`) VALUES ('Pavle Pavlovic', 'CSMB');
INSERT INTO `quantox_test_predrag_rakonjac`.`students` (`name`, `school_board`) VALUES ('Goran Goranovic', 'CSMB');

-- -----------------------------------------------------
-- Table `quantox_test_predrag_rakonjac`.`student_grades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quantox_test_predrag_rakonjac`.`student_grades` (
  `student_id` INT NOT NULL,
  `school_class` VARCHAR(45) NOT NULL,
  `grade` TINYINT UNSIGNED NOT NULL,
  PRIMARY KEY (`student_id`, `school_class`),
  INDEX `fk_students_has_school_classes_students1_idx` (`student_id` ASC),
  CONSTRAINT `fk_students_has_school_classes_students1`
    FOREIGN KEY (`student_id`)
    REFERENCES `quantox_test_predrag_rakonjac`.`students` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Insert example data
-- -----------------------------------------------------
-- CSM polagao 3 predmeta, polozio
INSERT INTO `quantox_test_predrag_rakonjac`.`student_grades` (`student_id`, `school_class`, `grade`) VALUES (1, 'matematika', 6);
INSERT INTO `quantox_test_predrag_rakonjac`.`student_grades` (`student_id`, `school_class`, `grade`) VALUES (1, 'geografija', 7);
INSERT INTO `quantox_test_predrag_rakonjac`.`student_grades` (`student_id`, `school_class`, `grade`) VALUES (1, 'istorija', 8);
-- CSM polagao 3 predmeta, nije polozio
INSERT INTO `quantox_test_predrag_rakonjac`.`student_grades` (`student_id`, `school_class`, `grade`) VALUES (2, 'matematika', 6);
INSERT INTO `quantox_test_predrag_rakonjac`.`student_grades` (`student_id`, `school_class`, `grade`) VALUES (2, 'geografija', 6);
INSERT INTO `quantox_test_predrag_rakonjac`.`student_grades` (`student_id`, `school_class`, `grade`) VALUES (2, 'istorija', 7);
-- CSMB polagao 1 predmet, polozio
INSERT INTO `quantox_test_predrag_rakonjac`.`student_grades` (`student_id`, `school_class`, `grade`) VALUES (3, 'istorija', 9);
-- CSMB polagao 1 predmet, nije polozio
INSERT INTO `quantox_test_predrag_rakonjac`.`student_grades` (`student_id`, `school_class`, `grade`) VALUES (4, 'istorija', 8);
-- CSMB polagao 3 predmeta, polozio
INSERT INTO `quantox_test_predrag_rakonjac`.`student_grades` (`student_id`, `school_class`, `grade`) VALUES (5, 'matematika', 8);
INSERT INTO `quantox_test_predrag_rakonjac`.`student_grades` (`student_id`, `school_class`, `grade`) VALUES (5, 'geografija', 8);
INSERT INTO `quantox_test_predrag_rakonjac`.`student_grades` (`student_id`, `school_class`, `grade`) VALUES (5, 'istorija', 6);
-- CSMB polagao 3 predmeta, polozio
INSERT INTO `quantox_test_predrag_rakonjac`.`student_grades` (`student_id`, `school_class`, `grade`) VALUES (6, 'matematika', 9);
INSERT INTO `quantox_test_predrag_rakonjac`.`student_grades` (`student_id`, `school_class`, `grade`) VALUES (6, 'geografija', 8);
INSERT INTO `quantox_test_predrag_rakonjac`.`student_grades` (`student_id`, `school_class`, `grade`) VALUES (6, 'istorija', 6);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
