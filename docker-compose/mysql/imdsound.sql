-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema imdsound
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema imdsound
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `imdsound` ;
USE `imdsound` ;

-- -----------------------------------------------------
-- Table `imdsound`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`User` (
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NULL,
  `country` VARCHAR(45) NULL,
  `phone_number` VARCHAR(14) NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`Admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`Admin` (
  `idAdmin` INT NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idAdmin`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`Artist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`Artist` (
  `User_email` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `Admin_idAdmin` INT NOT NULL,
  PRIMARY KEY (`User_email`),
  INDEX `fk_Artist_Admin1_idx` (`Admin_idAdmin` ASC),
  INDEX `fk_Artist_User1_idx` (`User_email` ASC),
  CONSTRAINT `fk_Artist_Admin1`
    FOREIGN KEY (`Admin_idAdmin`)
    REFERENCES `imdsound`.`Admin` (`idAdmin`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Artist_User1`
    FOREIGN KEY (`User_email`)
    REFERENCES `imdsound`.`User` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`type` (
  `typeName` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `value` DECIMAL(2) NOT NULL,
  PRIMARY KEY (`typeName`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`subscription`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`subscription` (
  `id_subscription` INT NOT NULL,
  `init_date` DATE NOT NULL,
  `expiration_date` DATE NOT NULL,
  `User_email` VARCHAR(45) NOT NULL,
  `type_typeName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_subscription`),
  INDEX `fk_subscription_type1_idx` (`type_typeName` ASC),
  INDEX `fk_subscription_User1_idx` (`User_email` ASC),
  CONSTRAINT `fk_subscription_type1`
    FOREIGN KEY (`type_typeName`)
    REFERENCES `imdsound`.`type` (`typeName`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_subscription_User1`
    FOREIGN KEY (`User_email`)
    REFERENCES `imdsound`.`User` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`feature`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`feature` (
  `featName` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`featName`),
  UNIQUE INDEX `descrition_UNIQUE` (`featName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`music`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`music` (
  `idmusic` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `duration_time` INT NOT NULL,
  `num_likes` INT NOT NULL DEFAULT 0,
  `lyrics` VARCHAR(45) NULL,
  PRIMARY KEY (`idmusic`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`musicGenre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`musicGenre` (
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`name`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`List`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`List` (
  `idList` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `num_likes` INT NOT NULL,
  `duration_time` INT NOT NULL DEFAULT 0,
  `picture` TEXT NULL,
  PRIMARY KEY (`idList`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`type_has_feature`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`type_has_feature` (
  `type_typeName` VARCHAR(45) NOT NULL,
  `feature_featName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`type_typeName`, `feature_featName`),
  INDEX `fk_type_has_feature_feature1_idx` (`feature_featName` ASC),
  INDEX `fk_type_has_feature_type1_idx` (`type_typeName` ASC),
  CONSTRAINT `fk_type_has_feature_type1`
    FOREIGN KEY (`type_typeName`)
    REFERENCES `imdsound`.`type` (`typeName`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_type_has_feature_feature1`
    FOREIGN KEY (`feature_featName`)
    REFERENCES `imdsound`.`feature` (`featName`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`music_has_genre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`music_has_genre` (
  `music_idmusic` INT NOT NULL,
  `genre_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`music_idmusic`, `genre_name`),
  INDEX `fk_music_has_genre_genre1_idx` (`genre_name` ASC),
  INDEX `fk_music_has_genre_music1_idx` (`music_idmusic` ASC),
  CONSTRAINT `fk_music_has_genre_music1`
    FOREIGN KEY (`music_idmusic`)
    REFERENCES `imdsound`.`music` (`idmusic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_music_has_genre_genre1`
    FOREIGN KEY (`genre_name`)
    REFERENCES `imdsound`.`musicGenre` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`List_has_genre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`List_has_genre` (
  `genre_name` VARCHAR(45) NOT NULL,
  `List_idList` INT NOT NULL,
  PRIMARY KEY (`genre_name`, `List_idList`),
  INDEX `fk_List_has_genre_genre1_idx` (`genre_name` ASC),
  INDEX `fk_List_has_genre_List1_idx` (`List_idList` ASC),
  CONSTRAINT `fk_List_has_genre_List1`
    FOREIGN KEY (`List_idList`)
    REFERENCES `imdsound`.`List` (`idList`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_List_has_genre_genre1`
    FOREIGN KEY (`genre_name`)
    REFERENCES `imdsound`.`musicGenre` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`Artist_cadastra_music`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`Artist_cadastra_music` (
  `music_idmusic` INT NOT NULL,
  `Artist_User_email` VARCHAR(45) NOT NULL,
  `date_cadastro` DATE NOT NULL,
  PRIMARY KEY (`music_idmusic`, `Artist_User_email`),
  INDEX `fk_Artist_has_music_music1_idx` (`music_idmusic` ASC),
  INDEX `fk_Artist_has_music_Artist1_idx` (`Artist_User_email` ASC),
  CONSTRAINT `fk_Artist_has_music_Artist1`
    FOREIGN KEY (`Artist_User_email`)
    REFERENCES `imdsound`.`Artist` (`User_email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Artist_has_music_music1`
    FOREIGN KEY (`music_idmusic`)
    REFERENCES `imdsound`.`music` (`idmusic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`Album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`Album` (
  `List_idList` INT NOT NULL,
  `data_cadastro` DATE NOT NULL,
  PRIMARY KEY (`List_idList`),
  CONSTRAINT `fk_Album_List1`
    FOREIGN KEY (`List_idList`)
    REFERENCES `imdsound`.`List` (`idList`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`Artist_cadastra_Album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`Artist_cadastra_Album` (
  `Artist_User_email` VARCHAR(45) NOT NULL,
  `Album_List_idList` INT NOT NULL,
  PRIMARY KEY (`Artist_User_email`, `Album_List_idList`),
  INDEX `fk_Artist_has_Album_Album1_idx` (`Album_List_idList` ASC),
  INDEX `fk_Artist_has_Album_Artist1_idx` (`Artist_User_email` ASC),
  CONSTRAINT `fk_Artist_has_Album_Artist1`
    FOREIGN KEY (`Artist_User_email`)
    REFERENCES `imdsound`.`Artist` (`User_email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Artist_has_Album_Album1`
    FOREIGN KEY (`Album_List_idList`)
    REFERENCES `imdsound`.`Album` (`List_idList`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`Playlist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`Playlist` (
  `List_idList` INT NOT NULL,
  `visibilty` TINYINT NOT NULL,
  PRIMARY KEY (`List_idList`),
  INDEX `fk_Playlist_List1_idx` (`List_idList` ASC),
  CONSTRAINT `fk_Playlist_List1`
    FOREIGN KEY (`List_idList`)
    REFERENCES `imdsound`.`List` (`idList`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`Playlist_has_music`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`Playlist_has_music` (
  `Playlist_List_idList` INT NOT NULL,
  `music_idmusic` INT NOT NULL,
  PRIMARY KEY (`Playlist_List_idList`, `music_idmusic`),
  INDEX `fk_Playlist_has_music_music1_idx` (`music_idmusic` ASC),
  INDEX `fk_Playlist_has_music_Playlist1_idx` (`Playlist_List_idList` ASC),
  CONSTRAINT `fk_Playlist_has_music_Playlist1`
    FOREIGN KEY (`Playlist_List_idList`)
    REFERENCES `imdsound`.`Playlist` (`List_idList`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Playlist_has_music_music1`
    FOREIGN KEY (`music_idmusic`)
    REFERENCES `imdsound`.`music` (`idmusic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`User_has_Playlist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`User_has_Playlist` (
  `User_email` VARCHAR(45) NOT NULL,
  `Playlist_List_idList` INT NOT NULL,
  PRIMARY KEY (`User_email`, `Playlist_List_idList`),
  INDEX `fk_User_has_Playlist_Playlist1_idx` (`Playlist_List_idList` ASC),
  INDEX `fk_User_has_Playlist_User1_idx` (`User_email` ASC),
  CONSTRAINT `fk_User_has_Playlist_User1`
    FOREIGN KEY (`User_email`)
    REFERENCES `imdsound`.`User` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Playlist_Playlist1`
    FOREIGN KEY (`Playlist_List_idList`)
    REFERENCES `imdsound`.`Playlist` (`List_idList`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`User_listen_music`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`User_listen_music` (
  `User_email` VARCHAR(45) NOT NULL,
  `music_idmusic` INT NOT NULL,
  `last_date_listen` DATE NOT NULL,
  PRIMARY KEY (`User_email`, `music_idmusic`),
  INDEX `fk_User_has_music_music1_idx` (`music_idmusic` ASC),
  INDEX `fk_User_has_music_User1_idx` (`User_email` ASC),
  CONSTRAINT `fk_User_has_music_User1`
    FOREIGN KEY (`User_email`)
    REFERENCES `imdsound`.`User` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_music_music1`
    FOREIGN KEY (`music_idmusic`)
    REFERENCES `imdsound`.`music` (`idmusic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`Album_has_music`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`Album_has_music` (
  `Album_List_idList` INT NOT NULL,
  `music_idmusic` INT NOT NULL,
  PRIMARY KEY (`Album_List_idList`, `music_idmusic`),
  INDEX `fk_Album_has_music_music1_idx` (`music_idmusic` ASC),
  INDEX `fk_Album_has_music_Album1_idx` (`Album_List_idList` ASC),
  CONSTRAINT `fk_Album_has_music_Album1`
    FOREIGN KEY (`Album_List_idList`)
    REFERENCES `imdsound`.`Album` (`List_idList`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Album_has_music_music1`
    FOREIGN KEY (`music_idmusic`)
    REFERENCES `imdsound`.`music` (`idmusic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
