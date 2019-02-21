SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `Gebruikertype`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Gebruikertype` (
  `id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Traject`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Traject` (
  `id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Klas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Klas` (
  `id` INT NOT NULL ,
  `naam` VARCHAR(45) NULL ,
  `maxAantal` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Gebruiker`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Gebruiker` (
  `idGebruiker` INT NOT NULL ,
  `Traject_id` INT NULL ,
  `Klas_id` INT NULL ,
  `Gebruikertype_id` INT NOT NULL ,
  `voornaam` VARCHAR(45) NULL ,
  `achternaam` VARCHAR(45) NULL ,
  `passwoord` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  PRIMARY KEY (`idGebruiker`, `Traject_id`, `Klas_id`, `Gebruikertype_id`) ,
  INDEX `fk_Gebruiker_Gebruikertype1_idx` (`Gebruikertype_id` ASC) ,
  INDEX `fk_Gebruiker_Traject1_idx` (`Traject_id` ASC) ,
  INDEX `fk_Gebruiker_Klas1_idx` (`Klas_id` ASC) ,
  CONSTRAINT `fk_Gebruiker_Gebruikertype1`
    FOREIGN KEY (`Gebruikertype_id` )
    REFERENCES `Gebruikertype` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Gebruiker_Traject1`
    FOREIGN KEY (`Traject_id` )
    REFERENCES `Traject` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Gebruiker_Klas1`
    FOREIGN KEY (`Klas_id` )
    REFERENCES `Klas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Lokaal`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Lokaal` (
  `id` INT NOT NULL ,
  `naam` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Afspraak`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Afspraak` (
  `id` INT NOT NULL ,
  `Lokaal_id` INT NOT NULL ,
  `Gebruiker_studentId` INT NULL ,
  `Gebruiker_docentId` INT NOT NULL ,
  `tijdSlot` DATETIME NULL ,
  PRIMARY KEY (`id`, `Lokaal_id`, `Gebruiker_studentId`, `Gebruiker_docentId`) ,
  INDEX `fk_Afspraak_Lokaal1_idx` (`Lokaal_id` ASC) ,
  INDEX `fk_Afspraak_Gebruiker1_idx` (`Gebruiker_studentId` ASC) ,
  INDEX `fk_Afspraak_Gebruiker2_idx` (`Gebruiker_docentId` ASC) ,
  CONSTRAINT `fk_Afspraak_Lokaal1`
    FOREIGN KEY (`Lokaal_id` )
    REFERENCES `Lokaal` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_docentId`
    FOREIGN KEY (`Gebruiker_studentId` )
    REFERENCES `Gebruiker` (`Gebruikertype_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_studentId`
    FOREIGN KEY (`Gebruiker_docentId` )
    REFERENCES `Gebruiker` (`Gebruikertype_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Richting`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Richting` (
  `id` INT NOT NULL ,
  `naam` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Vak`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Vak` (
  `id` INT NOT NULL ,
  `Richting_id` INT NOT NULL ,
  `naam` VARCHAR(45) NULL ,
  `beschrijving` VARCHAR(45) NULL ,
  `studiepunt` INT NULL ,
  `fase` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`, `Richting_id`) ,
  INDEX `fk_Vak_Richting1_idx` (`Richting_id` ASC) ,
  CONSTRAINT `fk_Vak_Richting1`
    FOREIGN KEY (`Richting_id` )
    REFERENCES `Richting` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Lesmoment`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Lesmoment` (
  `id` INT NOT NULL ,
  `Richting_id` INT NOT NULL ,
  `Vak_id` INT NOT NULL ,
  `Vak_Richting_id` INT NOT NULL ,
  `maxAantal` INT NULL ,
  `lesblok` INT NULL ,
  `weekdag` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`, `Richting_id`, `Vak_id`, `Vak_Richting_id`) ,
  INDEX `fk_Lesmoment_Richting1_idx` (`Richting_id` ASC) ,
  INDEX `fk_Lesmoment_Vak1_idx` (`Vak_id` ASC, `Vak_Richting_id` ASC) ,
  CONSTRAINT `fk_Lesmoment_Richting1`
    FOREIGN KEY (`Richting_id` )
    REFERENCES `Richting` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Lesmoment_Vak1`
    FOREIGN KEY (`Vak_id` , `Vak_Richting_id` )
    REFERENCES `Vak` (`id` , `Richting_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Mail`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Mail` (
  `id` INT NOT NULL ,
  `onderwerp` VARCHAR(45) NULL ,
  `beschrijving` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Gebruiker_has_Lesmoment`
-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `Gebruiker_has_Lesmoment` (
  `Gebruiker_idGebruiker` INT NOT NULL ,
  `Gebruiker_Gebruikertype_id` INT NOT NULL ,
  `Lesmoment_id` INT NOT NULL ,
  PRIMARY KEY (`Gebruiker_idGebruiker`, `Gebruiker_Gebruikertype_id`, `Lesmoment_id`) ,
  INDEX `fk_Gebruiker_has_Lesmoment_Lesmoment1_idx` (`Lesmoment_id` ASC) ,
  INDEX `fk_Gebruiker_has_Lesmoment_Gebruiker1_idx` (`Gebruiker_idGebruiker` ASC, `Gebruiker_Gebruikertype_id` ASC) ,
  CONSTRAINT `fk_Gebruiker_has_Lesmoment_Gebruiker1` FOREIGN KEY (`Gebruiker_idGebruiker`) REFERENCES `Gebruiker` (`idGebruiker`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Gebruiker_has_Lesmoment_Gebruiker2` FOREIGN KEY (`Gebruiker_Gebruikertype_id` ) REFERENCES `Gebruiker` (`Gebruikertype_id` ) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Gebruiker_has_Lesmoment_Lesmoment1` FOREIGN KEY (`Lesmoment_id` ) REFERENCES `Lesmoment` (`id` ) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
