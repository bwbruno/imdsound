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
CREATE SCHEMA IF NOT EXISTS `imdsound` DEFAULT CHARACTER SET utf8 ;
USE `imdsound` ;

-- -----------------------------------------------------
-- Table `imdsound`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`user` (
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NULL,
  `country` VARCHAR(45) NULL,
  `phone_number` VARCHAR(14) NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`admin` (
  `id_admin` INT NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_admin`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`artist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`artist` (
  `user_email` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `admin_id_admin` INT,
  PRIMARY KEY (`user_email`),
  INDEX `fk_Artist_Admin1_idx` (`admin_id_admin` ASC),
  INDEX `fk_Artist_User1_idx` (`user_email` ASC),
  CONSTRAINT `fk_Artist_Admin1`
    FOREIGN KEY (`admin_id_admin`)
    REFERENCES `imdsound`.`admin` (`id_admin`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Artist_User1`
    FOREIGN KEY (`user_email`)
    REFERENCES `imdsound`.`user` (`email`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`type` (
  `type_name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `value` DECIMAL(2) NOT NULL,
  PRIMARY KEY (`type_name`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`subscription`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`subscription` (
  `id_subscription` INT NOT NULL,
  `init_date` DATE NOT NULL,
  `expiration_date` DATE NOT NULL,
  `user_email` VARCHAR(45) NOT NULL,
  `type_type_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_subscription`),
  INDEX `fk_subscription_type1_idx` (`type_type_name` ASC),
  INDEX `fk_subscription_User1_idx` (`user_email` ASC),
  CONSTRAINT `fk_subscription_type1`
    FOREIGN KEY (`type_type_name`)
    REFERENCES `imdsound`.`type` (`type_name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_subscription_User1`
    FOREIGN KEY (`user_email`)
    REFERENCES `imdsound`.`user` (`email`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`feature`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`feature` (
  `feat_name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`feat_name`),
  UNIQUE INDEX `descrition_UNIQUE` (`feat_name` ASC))
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
  `data_create` DATE NOT NULL,
  PRIMARY KEY (`idmusic`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`music_genre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`music_genre` (
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`name`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`list`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`list` (
  `id_list` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `num_likes` INT NOT NULL,
  `duration_time` INT NOT NULL DEFAULT 0,
  `picture` TEXT NULL,
  PRIMARY KEY (`id_list`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`type_has_feature`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`type_has_feature` (
  `type_type_name` VARCHAR(45) NOT NULL,
  `feature_feat_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`type_type_name`, `feature_feat_name`),
  INDEX `fk_type_has_feature_feature1_idx` (`feature_feat_name` ASC),
  INDEX `fk_type_has_feature_type1_idx` (`type_type_name` ASC),
  CONSTRAINT `fk_type_has_feature_type1`
    FOREIGN KEY (`type_type_name`)
    REFERENCES `imdsound`.`type` (`type_name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_type_has_feature_feature1`
    FOREIGN KEY (`feature_feat_name`)
    REFERENCES `imdsound`.`feature` (`feat_name`)
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
    REFERENCES `imdsound`.`music_genre` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`list_has_genre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`list_has_genre` (
  `genre_name` VARCHAR(45) NOT NULL,
  `list_id_list` INT NOT NULL,
  PRIMARY KEY (`genre_name`, `list_id_list`),
  INDEX `fk_List_has_genre_genre1_idx` (`genre_name` ASC),
  INDEX `fk_List_has_genre_List1_idx` (`list_id_list` ASC),
  CONSTRAINT `fk_List_has_genre_List1`
    FOREIGN KEY (`list_id_list`)
    REFERENCES `imdsound`.`list` (`id_list`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_List_has_genre_genre1`
    FOREIGN KEY (`genre_name`)
    REFERENCES `imdsound`.`music_genre` (`name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`artist_cadastra_music`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`artist_cadastra_music` (
  `music_id_music` INT NOT NULL,
  `artist_user_email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`music_id_music`, `artist_user_email`),
  INDEX `fk_Artist_has_music_music1_idx` (`music_id_music` ASC),
  INDEX `fk_Artist_has_music_Artist1_idx` (`artist_user_email` ASC),
  CONSTRAINT `fk_Artist_has_music_Artist1`
    FOREIGN KEY (`artist_user_email`)
    REFERENCES `imdsound`.`artist` (`user_email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Artist_has_music_music1`
    FOREIGN KEY (`music_id_music`)
    REFERENCES `imdsound`.`music` (`idmusic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`album` (
  `list_id_list` INT NOT NULL,
  `data_cadastro` DATE NOT NULL,
  PRIMARY KEY (`list_id_list`),
  CONSTRAINT `fk_Album_List1`
    FOREIGN KEY (`list_id_list`)
    REFERENCES `imdsound`.`list` (`id_list`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`artist_cadastra_album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`artist_cadastra_album` (
  `artist_user_email` VARCHAR(45) NOT NULL,
  `album_list_id_list` INT NOT NULL,
  PRIMARY KEY (`artist_user_email`, `album_list_id_list`),
  INDEX `fk_Artist_has_Album_Album1_idx` (`album_list_id_list` ASC),
  INDEX `fk_Artist_has_Album_Artist1_idx` (`artist_user_email` ASC),
  CONSTRAINT `fk_Artist_has_Album_Artist1`
    FOREIGN KEY (`artist_user_email`)
    REFERENCES `imdsound`.`artist` (`user_email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Artist_has_Album_Album1`
    FOREIGN KEY (`album_list_id_list`)
    REFERENCES `imdsound`.`album` (`list_id_list`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`playlist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`playlist` (
  `list_id_list` INT NOT NULL,
  `visibilty` TINYINT NOT NULL,
  PRIMARY KEY (`list_id_list`),
  INDEX `fk_Playlist_List1_idx` (`list_id_list` ASC),
  CONSTRAINT `fk_Playlist_List1`
    FOREIGN KEY (`list_id_list`)
    REFERENCES `imdsound`.`list` (`id_list`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`playlist_has_music`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`playlist_has_music` (
  `playlist_list_id_list` INT NOT NULL,
  `music_id_music` INT NOT NULL,
  PRIMARY KEY (`playlist_list_id_list`, `music_id_music`),
  INDEX `fk_Playlist_has_music_music1_idx` (`music_id_music` ASC),
  INDEX `fk_Playlist_has_music_Playlist1_idx` (`playlist_list_id_list` ASC),
  CONSTRAINT `fk_Playlist_has_music_Playlist1`
    FOREIGN KEY (`playlist_list_id_list`)
    REFERENCES `imdsound`.`playlist` (`list_id_list`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Playlist_has_music_music1`
    FOREIGN KEY (`music_id_music`)
    REFERENCES `imdsound`.`music` (`idmusic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`user_has_playlist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`user_has_playlist` (
  `user_email` VARCHAR(45) NOT NULL,
  `playlist_list_id_list` INT NOT NULL,
  PRIMARY KEY (`user_email`, `playlist_list_id_list`),
  INDEX `fk_User_has_Playlist_Playlist1_idx` (`playlist_list_id_list` ASC),
  INDEX `fk_User_has_Playlist_User1_idx` (`user_email` ASC),
  CONSTRAINT `fk_User_has_Playlist_User1`
    FOREIGN KEY (`user_email`)
    REFERENCES `imdsound`.`user` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Playlist_Playlist1`
    FOREIGN KEY (`playlist_list_id_list`)
    REFERENCES `imdsound`.`playlist` (`list_id_list`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`user_listen_music`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`user_listen_music` (
  `user_email` VARCHAR(45) NOT NULL,
  `music_id_music` INT NOT NULL,
  `last_date_listen` DATE NOT NULL,
  PRIMARY KEY (`user_email`, `music_id_music`),
  INDEX `fk_User_has_music_music1_idx` (`music_id_music` ASC),
  INDEX `fk_User_has_music_User1_idx` (`user_email` ASC),
  CONSTRAINT `fk_User_has_music_User1`
    FOREIGN KEY (`user_email`)
    REFERENCES `imdsound`.`user` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_music_music1`
    FOREIGN KEY (`music_id_music`)
    REFERENCES `imdsound`.`music` (`idmusic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `imdsound`.`album_has_music`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imdsound`.`album_has_music` (
  `album_list_id_list` INT NOT NULL,
  `music_id_music` INT NOT NULL,
  PRIMARY KEY (`album_list_id_list`, `music_id_music`),
  INDEX `fk_Album_has_music_music1_idx` (`music_id_music` ASC),
  INDEX `fk_Album_has_music_Album1_idx` (`album_list_id_list` ASC),
  CONSTRAINT `fk_Album_has_music_Album1`
    FOREIGN KEY (`album_list_id_list`)
    REFERENCES `imdsound`.`album` (`list_id_list`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Album_has_music_music1`
    FOREIGN KEY (`music_id_music`)
    REFERENCES `imdsound`.`music` (`idmusic`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
