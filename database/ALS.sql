SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `ALS` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ALS` ;

-- -----------------------------------------------------
-- Table `ALS`.`YEARLY_READING_SET`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ALS`.`YEARLY_READING_SET` (
  `Reading_ID` INT NOT NULL AUTO_INCREMENT ,
  `Reading_Type` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`Reading_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALS`.`CALENDAR`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ALS`.`CALENDAR` (
  `Calendar_ID` INT NOT NULL AUTO_INCREMENT ,
  `Calendar_Year` YEAR NOT NULL ,
  `Calendar_Month` DATE NOT NULL ,
  `Calendar_Date` DATE NOT NULL ,
  `YEARLY_READING_SET_Reading_ID` INT NOT NULL ,
  PRIMARY KEY (`Calendar_ID`, `YEARLY_READING_SET_Reading_ID`) ,
  INDEX `fk_CALENDAR_YEARLY_READING_SET1_idx` (`YEARLY_READING_SET_Reading_ID` ASC) ,
  CONSTRAINT `fk_CALENDAR_YEARLY_READING_SET1`
    FOREIGN KEY (`YEARLY_READING_SET_Reading_ID` )
    REFERENCES `ALS`.`YEARLY_READING_SET` (`Reading_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALS`.`DAY`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ALS`.`DAY` (
  `Day_ID` INT NOT NULL AUTO_INCREMENT ,
  `Day_Month` DATE NOT NULL ,
  `Day_Date` DATE NOT NULL ,
  `CALENDAR_Calendar_ID` INT NOT NULL ,
  PRIMARY KEY (`Day_ID`, `CALENDAR_Calendar_ID`) ,
  INDEX `fk_DAY_CALENDAR1_idx` (`CALENDAR_Calendar_ID` ASC) ,
  CONSTRAINT `fk_DAY_CALENDAR1`
    FOREIGN KEY (`CALENDAR_Calendar_ID` )
    REFERENCES `ALS`.`CALENDAR` (`Calendar_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALS`.`EVENT`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ALS`.`EVENT` (
  `Event_ID` INT NOT NULL AUTO_INCREMENT ,
  `Event_Name` VARCHAR(45) NOT NULL ,
  `Event_Type` VARCHAR(45) NOT NULL ,
  `DAY_Day_ID` INT NOT NULL ,
  PRIMARY KEY (`Event_ID`, `DAY_Day_ID`) ,
  INDEX `fk_EVENT_DAY_idx` (`DAY_Day_ID` ASC) ,
  CONSTRAINT `fk_EVENT_DAY`
    FOREIGN KEY (`DAY_Day_ID` )
    REFERENCES `ALS`.`DAY` (`Day_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALS`.`MOVEABLE_FEAST`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ALS`.`MOVEABLE_FEAST` (
  `Feast_ID` INT NOT NULL AUTO_INCREMENT ,
  `Feast_ScriptCondition` VARCHAR(45) NOT NULL ,
  `EVENT_Event_ID` INT NOT NULL ,
  `EVENT_DAY_Day_ID` INT NOT NULL ,
  PRIMARY KEY (`Feast_ID`, `EVENT_Event_ID`, `EVENT_DAY_Day_ID`) ,
  INDEX `fk_MOVEABLE_FEAST_EVENT1_idx` (`EVENT_Event_ID` ASC, `EVENT_DAY_Day_ID` ASC) ,
  CONSTRAINT `fk_MOVEABLE_FEAST_EVENT1`
    FOREIGN KEY (`EVENT_Event_ID` , `EVENT_DAY_Day_ID` )
    REFERENCES `ALS`.`EVENT` (`Event_ID` , `DAY_Day_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALS`.`WEEKDAY_READINGS`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ALS`.`WEEKDAY_READINGS` (
  `Weekday_ID` INT NOT NULL AUTO_INCREMENT ,
  `Weekday_CycleNum` INT NOT NULL ,
  `Weekday_Wreading` VARCHAR(45) NOT NULL ,
  `YEARLY_READING_SET_Reading_ID` INT NOT NULL ,
  PRIMARY KEY (`Weekday_ID`, `YEARLY_READING_SET_Reading_ID`) ,
  INDEX `fk_WEEKDAY_READINGS_YEARLY_READING_SET1_idx` (`YEARLY_READING_SET_Reading_ID` ASC) ,
  CONSTRAINT `fk_WEEKDAY_READINGS_YEARLY_READING_SET1`
    FOREIGN KEY (`YEARLY_READING_SET_Reading_ID` )
    REFERENCES `ALS`.`YEARLY_READING_SET` (`Reading_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALS`.`SOLEMNITIES`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ALS`.`SOLEMNITIES` (
  `Solemnity_ID` INT NOT NULL AUTO_INCREMENT ,
  `Solemnity_ScriptCondition` VARCHAR(45) NOT NULL ,
  `EVENT_Event_ID` INT NOT NULL ,
  `EVENT_DAY_Day_ID` INT NOT NULL ,
  PRIMARY KEY (`Solemnity_ID`, `EVENT_Event_ID`, `EVENT_DAY_Day_ID`) ,
  INDEX `fk_SOLEMNITIES_EVENT1_idx` (`EVENT_Event_ID` ASC, `EVENT_DAY_Day_ID` ASC) ,
  CONSTRAINT `fk_SOLEMNITIES_EVENT1`
    FOREIGN KEY (`EVENT_Event_ID` , `EVENT_DAY_Day_ID` )
    REFERENCES `ALS`.`EVENT` (`Event_ID` , `DAY_Day_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALS`.`SPECIAL_FEAST`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ALS`.`SPECIAL_FEAST` (
  `Special_ID` INT NOT NULL AUTO_INCREMENT ,
  `Special_DateOfFeast` VARCHAR(45) NOT NULL ,
  `EVENT_Event_ID` INT NOT NULL ,
  `EVENT_DAY_Day_ID` INT NOT NULL ,
  PRIMARY KEY (`Special_ID`, `EVENT_Event_ID`, `EVENT_DAY_Day_ID`) ,
  INDEX `fk_SPECIAL_FEAST_EVENT1_idx` (`EVENT_Event_ID` ASC, `EVENT_DAY_Day_ID` ASC) ,
  CONSTRAINT `fk_SPECIAL_FEAST_EVENT1`
    FOREIGN KEY (`EVENT_Event_ID` , `EVENT_DAY_Day_ID` )
    REFERENCES `ALS`.`EVENT` (`Event_ID` , `DAY_Day_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALS`.`MEMORIALS`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ALS`.`MEMORIALS` (
  `Memorial_ID` INT NOT NULL AUTO_INCREMENT ,
  `Memorial_ScriptCondition` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`Memorial_ID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALS`.`SUNDAY_READING`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ALS`.`SUNDAY_READING` (
  `Sundayr_ID` INT NOT NULL AUTO_INCREMENT ,
  `Sundayr_CycleType` VARCHAR(45) NOT NULL ,
  `Sunday_Sreading` VARCHAR(45) NOT NULL ,
  `YEARLY_READING_SET_Reading_ID` INT NOT NULL ,
  PRIMARY KEY (`Sundayr_ID`, `YEARLY_READING_SET_Reading_ID`) ,
  INDEX `fk_SUNDAY_READING_YEARLY_READING_SET1_idx` (`YEARLY_READING_SET_Reading_ID` ASC) ,
  CONSTRAINT `fk_SUNDAY_READING_YEARLY_READING_SET1`
    FOREIGN KEY (`YEARLY_READING_SET_Reading_ID` )
    REFERENCES `ALS`.`YEARLY_READING_SET` (`Reading_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALS`.`SOLEMNITIES_has_MEMORIALS`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ALS`.`SOLEMNITIES_has_MEMORIALS` (
  `SOLEMNITIES_Solemnity_ID` INT NULL ,
  `SOLEMNITIES_EVENT_Event_ID` INT NULL ,
  `SOLEMNITIES_EVENT_DAY_Day_ID` INT NULL ,
  `MEMORIALS_Memorial_ID` INT NULL ,
  PRIMARY KEY (`SOLEMNITIES_Solemnity_ID`, `SOLEMNITIES_EVENT_Event_ID`, `SOLEMNITIES_EVENT_DAY_Day_ID`, `MEMORIALS_Memorial_ID`) ,
  INDEX `fk_SOLEMNITIES_has_MEMORIALS_MEMORIALS1_idx` (`MEMORIALS_Memorial_ID` ASC) ,
  INDEX `fk_SOLEMNITIES_has_MEMORIALS_SOLEMNITIES1_idx` (`SOLEMNITIES_Solemnity_ID` ASC, `SOLEMNITIES_EVENT_Event_ID` ASC, `SOLEMNITIES_EVENT_DAY_Day_ID` ASC) ,
  CONSTRAINT `fk_SOLEMNITIES_has_MEMORIALS_SOLEMNITIES1`
    FOREIGN KEY (`SOLEMNITIES_Solemnity_ID` , `SOLEMNITIES_EVENT_Event_ID` , `SOLEMNITIES_EVENT_DAY_Day_ID` )
    REFERENCES `ALS`.`SOLEMNITIES` (`Solemnity_ID` , `EVENT_Event_ID` , `EVENT_DAY_Day_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SOLEMNITIES_has_MEMORIALS_MEMORIALS1`
    FOREIGN KEY (`MEMORIALS_Memorial_ID` )
    REFERENCES `ALS`.`MEMORIALS` (`Memorial_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
