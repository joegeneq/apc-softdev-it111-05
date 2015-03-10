SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `asnd_lcmam` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `asnd_lcmam` ;

-- -----------------------------------------------------
-- Table `asnd_lcmam`.`event_determinant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asnd_lcmam`.`event_determinant` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `year` YEAR NOT NULL,
  `sunday_cycle` VARCHAR(45) NULL,
  `weekday_cycle` VARCHAR(45) NULL,
  `week_ot_before_lent` VARCHAR(45) NULL,
  `ash_wednesday` DATE NULL,
  `easter_sunday` DATE NULL,
  `penticost_sunday` DATE NULL,
  `week_ot_after_pentecost` VARCHAR(45) NULL,
  `first_sunday_of_advent` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asnd_lcmam`.`year`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asnd_lcmam`.`year` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `year` YEAR NOT NULL,
  `year_cycle` CHAR NOT NULL,
  `trigger_id` INT NOT NULL,
  PRIMARY KEY (`id`, `trigger_id`),
  INDEX `fk_year_trigger1_idx` (`trigger_id` ASC),
  CONSTRAINT `fk_year_trigger1`
    FOREIGN KEY (`trigger_id`)
    REFERENCES `asnd_lcmam`.`event_determinant` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asnd_lcmam`.`event`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asnd_lcmam`.`event` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `event_name` VARCHAR(45) NOT NULL,
  `event_type` VARCHAR(45) NOT NULL,
  `event_audio_link` VARCHAR(45) NOT NULL,
  `date` DATE NOT NULL,
  `year_id` INT NOT NULL,
  PRIMARY KEY (`id`, `year_id`),
  INDEX `fk_event_year1_idx` (`year_id` ASC),
  CONSTRAINT `fk_event_year1`
    FOREIGN KEY (`year_id`)
    REFERENCES `asnd_lcmam`.`year` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asnd_lcmam`.`sunday_reading`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asnd_lcmam`.`sunday_reading` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sunday_first_reading` VARCHAR(45) NULL,
  `sunday_first_audio` VARCHAR(45) NULL,
  `sunday_second_reading` VARCHAR(45) NULL,
  `sunday_second_audio` VARCHAR(45) NULL,
  `sunday_alleluia_verse` VARCHAR(45) NULL,
  `sunday_alleluia_audio` VARCHAR(45) NULL,
  `sunday_responsorial_psalm` VARCHAR(45) NULL,
  `sunday_responsorial_audio` VARCHAR(45) NULL,
  `sunday_gospel` VARCHAR(45) NULL,
  `sunday_gospel_audio` VARCHAR(45) NULL,
  `sunday_cycle_type` CHAR NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asnd_lcmam`.`weekday_reading`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asnd_lcmam`.`weekday_reading` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `weekday_first_reading` VARCHAR(45) NULL,
  `weekday_first_audio` VARCHAR(45) NULL,
  `weekday_alleluia_verse` VARCHAR(45) NULL,
  `weekday_alleluia_audio` VARCHAR(45) NULL,
  `weekday_responsorial_psalm` VARCHAR(45) NULL,
  `weekday_responsorial_audio` VARCHAR(45) NULL,
  `weekday_gospel` VARCHAR(45) NULL,
  `weekday_gospel_audio` VARCHAR(45) NULL,
  `weekday_cycle_num` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `asnd_lcmam`.`date`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asnd_lcmam`.`date` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date_month` INT(2) NOT NULL,
  `date_week_num` INT(2) NOT NULL,
  `date_day_num` INT(2) NOT NULL,
  `year_id` INT NOT NULL,
  PRIMARY KEY (`id`, `year_id`),
  INDEX `fk_date_year1_idx` (`year_id` ASC),
  CONSTRAINT `fk_date_year1`
    FOREIGN KEY (`year_id`)
    REFERENCES `asnd_lcmam`.`year` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
