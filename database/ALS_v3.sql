SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `ALS` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ALS` ;

-- -----------------------------------------------------
-- Table `ALS`.`EVENT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ALS`.`EVENT` (
  `Event_ID` INT NOT NULL AUTO_INCREMENT COMMENT '0,1,2,3...',
  `Event_Name` VARCHAR(45) NOT NULL COMMENT 'Feast of Saint Therese, Feast of Saint Alphonsus...',
  `Event_Type` VARCHAR(45) NOT NULL COMMENT 'Memorial, Solemnity, Moveable Feast, Special Feast',
  `Event_Audio_Link` VARCHAR(45) NULL COMMENT 'http://audiolink.com, etc.',
  PRIMARY KEY (`Event_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALS`.`YEARLY_READING_SET`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ALS`.`YEARLY_READING_SET` (
  `Reading_ID` INT NOT NULL AUTO_INCREMENT COMMENT '1,2,3,4,5...',
  `Reading_Type` VARCHAR(45) NOT NULL COMMENT 'Weekday Reading, Snday Reading',
  PRIMARY KEY (`Reading_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALS`.`WEEKDAY_READINGS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ALS`.`WEEKDAY_READINGS` (
  `Weekday_ID` INT NOT NULL AUTO_INCREMENT COMMENT '0,1,2,3...',
  `Weekday_CycleNum` INT NOT NULL COMMENT '1 or 2...',
  `Weekday_Wreading` VARCHAR(45) NOT NULL COMMENT 'Psalms 1:3, John 3:4...',
  `Weekday_WeekNum` INT NOT NULL COMMENT '1,2,3...',
  `Weekday_Day` DATE NOT NULL COMMENT 'Monday, Tuesday, Wednesday...',
  `YEARLY_READING_SET_Reading_ID` INT NOT NULL,
  `Weekday_AudioLink` VARCHAR(45) NOT NULL COMMENT 'http://audiolink.com, etc...',
  PRIMARY KEY (`Weekday_ID`),
  INDEX `fk_WEEKDAY_READINGS_YEARLY_READING_SET1_idx` (`YEARLY_READING_SET_Reading_ID` ASC),
  CONSTRAINT `fk_WEEKDAY_READINGS_YEARLY_READING_SET1`
    FOREIGN KEY (`YEARLY_READING_SET_Reading_ID`)
    REFERENCES `ALS`.`YEARLY_READING_SET` (`Reading_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALS`.`SUNDAY_READING`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ALS`.`SUNDAY_READING` (
  `Sundayr_ID` INT NOT NULL AUTO_INCREMENT COMMENT '0,1,2,3...',
  `Sundayr_CycleType` VARCHAR(45) NOT NULL COMMENT 'A,B or C...',
  `Sunday_Sreading` VARCHAR(45) NOT NULL COMMENT 'Jonah 3:1, Proverbs 5:12...',
  `Sunday_WeekNum` INT NOT NULL COMMENT '1,2,3,4...',
  `Sunday_AudioLink` VARCHAR(45) NOT NULL COMMENT 'http://audiolink.com, etc...',
  `YEARLY_READING_SET_Reading_ID` INT NOT NULL,
  PRIMARY KEY (`Sundayr_ID`),
  INDEX `fk_SUNDAY_READING_YEARLY_READING_SET1_idx` (`YEARLY_READING_SET_Reading_ID` ASC),
  CONSTRAINT `fk_SUNDAY_READING_YEARLY_READING_SET1`
    FOREIGN KEY (`YEARLY_READING_SET_Reading_ID`)
    REFERENCES `ALS`.`YEARLY_READING_SET` (`Reading_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALS`.`YEAR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ALS`.`YEAR` (
  `Year_Year` YEAR NULL,
  `YEARLY_READING_SET_Reading_ID` INT NOT NULL,
  PRIMARY KEY (`Year_Year`),
  INDEX `fk_YEAR_YEARLY_READING_SET1_idx` (`YEARLY_READING_SET_Reading_ID` ASC),
  CONSTRAINT `fk_YEAR_YEARLY_READING_SET1`
    FOREIGN KEY (`YEARLY_READING_SET_Reading_ID`)
    REFERENCES `ALS`.`YEARLY_READING_SET` (`Reading_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALS`.`DATE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ALS`.`DATE` (
  `Date_id` INT NOT NULL,
  `Date_Month` VARCHAR(45) NULL,
  `Date_Week` VARCHAR(45) NULL,
  `Date_Day` VARCHAR(45) NULL,
  `YEAR_Year_Year` YEAR NOT NULL,
  `WEEKDAY_READINGS_Weekday_ID` INT NOT NULL,
  `SUNDAY_READING_Sundayr_ID` INT NOT NULL,
  `EVENT_Event_ID` INT NOT NULL,
  PRIMARY KEY (`Date_id`, `YEAR_Year_Year`),
  INDEX `fk_DATE_YEAR1_idx` (`YEAR_Year_Year` ASC),
  INDEX `fk_DATE_WEEKDAY_READINGS1_idx` (`WEEKDAY_READINGS_Weekday_ID` ASC),
  INDEX `fk_DATE_SUNDAY_READING1_idx` (`SUNDAY_READING_Sundayr_ID` ASC),
  INDEX `fk_DATE_EVENT1_idx` (`EVENT_Event_ID` ASC),
  CONSTRAINT `fk_DATE_YEAR1`
    FOREIGN KEY (`YEAR_Year_Year`)
    REFERENCES `ALS`.`YEAR` (`Year_Year`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DATE_WEEKDAY_READINGS1`
    FOREIGN KEY (`WEEKDAY_READINGS_Weekday_ID`)
    REFERENCES `ALS`.`WEEKDAY_READINGS` (`Weekday_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DATE_SUNDAY_READING1`
    FOREIGN KEY (`SUNDAY_READING_Sundayr_ID`)
    REFERENCES `ALS`.`SUNDAY_READING` (`Sundayr_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DATE_EVENT1`
    FOREIGN KEY (`EVENT_Event_ID`)
    REFERENCES `ALS`.`EVENT` (`Event_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
