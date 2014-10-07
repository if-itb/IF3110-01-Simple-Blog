SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `simple_blog`.`post`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `simple_blog`.`post` (
  `id_post` INT NOT NULL AUTO_INCREMENT ,
  `judul` VARCHAR(200) NULL ,
  `tanggal` DATETIME NULL ,
  `content` TEXT NULL ,
  PRIMARY KEY (`id_post`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `simple_blog`.`komentar`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `simple_blog`.`komentar` (
  `id_komentar` INT NOT NULL AUTO_INCREMENT ,
  `nama` VARCHAR(100) NULL ,
  `email` VARCHAR(100) NULL ,
  `tanggal` DATETIME NULL ,
  `isi_komentar` TEXT NULL ,
  `id_post` INT NOT NULL ,
  PRIMARY KEY (`id_komentar`) ,
  INDEX `fk_komentar_post_idx` (`id_post` ASC) ,
  CONSTRAINT `fk_komentar_post`
    FOREIGN KEY (`id_post` )
    REFERENCES `simple_blog`.`post` (`id_post` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
