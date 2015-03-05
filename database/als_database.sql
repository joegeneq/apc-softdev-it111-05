SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `als` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `als` ;

-- -----------------------------------------------------
-- Table `als`.`event`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `als`.`event` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '0,1,2,3...',
  `event_name` VARCHAR(45) NOT NULL COMMENT 'Feast of Saint Therese, Feast of Saint Alphonsus...',
  `event_type` VARCHAR(45) NOT NULL COMMENT 'Memorial, Solemnity, Moveable Feast, Special Feast',
  `event_audio_link` VARCHAR(45) NULL COMMENT 'http://audiolink.com, etc.',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `als`.`yearly_reading_set`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `als`.`yearly_reading_set` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '1,2,3,4,5...',
  `reading_type` VARCHAR(45) NOT NULL COMMENT 'Weekday Reading, Snday Reading',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `als`.`weekday_reading`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `als`.`weekday_reading` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '0,1,2,3...',
  `weekday_cycle_num` INT NOT NULL COMMENT '1 or 2...',
  `weekday_reading` VARCHAR(45) NOT NULL COMMENT 'Psalms 1:3, John 3:4...',
  `weekday_week_num` INT NOT NULL COMMENT '1,2,3...',
  `weekday_day` DATE NOT NULL COMMENT 'Monday, Tuesday, Wednesday...',
  `weekday_audio_link` VARCHAR(45) NOT NULL COMMENT 'http://audiolink.com, etc...',
  `yearly_reading_set_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_weekday_reading_yearly_reading_set1_idx` (`yearly_reading_set_id` ASC),
  CONSTRAINT `fk_weekday_reading_yearly_reading_set1`
    FOREIGN KEY (`yearly_reading_set_id`)
    REFERENCES `als`.`yearly_reading_set` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `als`.`sunday_reading`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `als`.`sunday_reading` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '0,1,2,3...',
  `sundayr_cycle_type` VARCHAR(45) NOT NULL COMMENT 'A,B or C...',
  `sunday_reading` VARCHAR(45) NOT NULL COMMENT 'Jonah 3:1, Proverbs 5:12...',
  `sunday_week_num` INT NOT NULL COMMENT '1,2,3,4...',
  `sunday_audio_link` VARCHAR(45) NOT NULL COMMENT 'http://audiolink.com, etc...',
  `yearly_reading_set_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_sunday_reading_yearly_reading_set1_idx` (`yearly_reading_set_id` ASC),
  CONSTRAINT `fk_sunday_reading_yearly_reading_set1`
    FOREIGN KEY (`yearly_reading_set_id`)
    REFERENCES `als`.`yearly_reading_set` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `als`.`year`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `als`.`year` (
  `year_year` YEAR NULL,
  `yearly_reading_set_id` INT NOT NULL,
  PRIMARY KEY (`year_year`),
  INDEX `fk_year_yearly_reading_set1_idx` (`yearly_reading_set_id` ASC),
  CONSTRAINT `fk_year_yearly_reading_set1`
    FOREIGN KEY (`yearly_reading_set_id`)
    REFERENCES `als`.`yearly_reading_set` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `als`.`date`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `als`.`date` (
  `id` INT NOT NULL,
  `date_month` VARCHAR(45) NULL,
  `date_week` VARCHAR(45) NULL,
  `date_day` VARCHAR(45) NULL,
  `year_year_year` YEAR NOT NULL,
  `event_id` INT NOT NULL,
  `weekday_reading_id` INT NOT NULL,
  `sunday_reading_id` INT NOT NULL,
  PRIMARY KEY (`id`, `year_year_year`),
  INDEX `fk_date_year1_idx` (`year_year_year` ASC),
  INDEX `fk_date_event1_idx` (`event_id` ASC),
  INDEX `fk_date_weekday_reading1_idx` (`weekday_reading_id` ASC),
  INDEX `fk_date_sunday_reading1_idx` (`sunday_reading_id` ASC),
  CONSTRAINT `fk_date_year1`
    FOREIGN KEY (`year_year_year`)
    REFERENCES `als`.`year` (`year_year`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_date_event1`
    FOREIGN KEY (`event_id`)
    REFERENCES `als`.`event` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_date_weekday_reading1`
    FOREIGN KEY (`weekday_reading_id`)
    REFERENCES `als`.`weekday_reading` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_date_sunday_reading1`
    FOREIGN KEY (`sunday_reading_id`)
    REFERENCES `als`.`sunday_reading` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;