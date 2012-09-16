SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `local_booking` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

USE `local_booking`;

CREATE  TABLE IF NOT EXISTS `local_booking`.`usuarios` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `id_grupo` INT(11) NOT NULL COMMENT 'Tabla de usuarios para administracion' ,
  PRIMARY KEY (`id_usuario`) ,
  INDEX `fk_usuarios_grupos` (`id_grupo` ASC) ,
  CONSTRAINT `fk_usuarios_grupos`
    FOREIGN KEY (`id_grupo` )
    REFERENCES `local_booking`.`grupos` (`id_grupo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `local_booking`.`grupos` (
  `id_grupo` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Grupos de usuarios para restricciones de acceso' ,
  PRIMARY KEY (`id_grupo`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `local_booking`.`habitaciones` (
  `id_habitacion` INT(11) NOT NULL AUTO_INCREMENT ,
  `numero_habitacion` VARCHAR(5) NOT NULL ,
  `id_tipo` INT(11) NOT NULL ,
  `descripcion` TEXT NOT NULL ,
  `max_adultos` INT(11) NOT NULL DEFAULT 1 ,
  `max_menores` INT(11) NULL DEFAULT NULL ,
  `total_disponibles` INT(11) NOT NULL DEFAULT 1 ,
  `precio_habitacion` FLOAT(11) NULL DEFAULT NULL ,
  `precio_adultos` FLOAT(11) NULL DEFAULT NULL ,
  `precio_menores` FLOAT(11) NULL DEFAULT NULL ,
  `por_noche` TINYINT(1) NOT NULL DEFAULT 1 ,
  `por_persona` TINYINT(1) NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`id_habitacion`) ,
  UNIQUE INDEX `numero_habitacion_UNIQUE` (`numero_habitacion` ASC) ,
  INDEX `fk_habitaciones_tipos` (`id_tipo` ASC) ,
  CONSTRAINT `fk_habitaciones_tipos`
    FOREIGN KEY (`id_tipo` )
    REFERENCES `local_booking`.`tipos` (`id_tipo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `local_booking`.`tipos` (
  `id_tipo` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_tipo`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `local_booking`.`fotos` (
  `id_foto` INT(11) NOT NULL AUTO_INCREMENT ,
  `foto_file_path` VARCHAR(255) NOT NULL ,
  `foto_file_name` VARCHAR(255) NOT NULL ,
  `foto_file_size` INT(11) NOT NULL ,
  `foto_content_type` VARCHAR(255) NOT NULL ,
  `id_habitacion` INT(11) NOT NULL ,
  PRIMARY KEY (`id_foto`) ,
  INDEX `fk_fotos_habitaciones` (`id_habitacion` ASC) ,
  CONSTRAINT `fk_fotos_habitaciones`
    FOREIGN KEY (`id_habitacion` )
    REFERENCES `local_booking`.`habitaciones` (`id_habitacion` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `local_booking`.`clientes` (
  `id_cliente` VARCHAR(100) NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `telefono` VARCHAR(45) NOT NULL ,
  `nacionalidad` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_cliente`) ,
  UNIQUE INDEX `id_cliente_UNIQUE` (`id_cliente` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `local_booking`.`reservaciones` (
  `id_reservacion` INT(11) NOT NULL AUTO_INCREMENT ,
  `id_cliente` VARCHAR(100) NOT NULL ,
  `checkin` DATETIME NOT NULL ,
  `checkout` DATETIME NOT NULL ,
  `sub_total` FLOAT(11) NOT NULL ,
  `impuesto` FLOAT(11) NOT NULL ,
  `total` FLOAT(11) NOT NULL ,
  `deposito` FLOAT(11) NOT NULL ,
  `id_estado` INT(11) NOT NULL ,
  `numero_deposito` FLOAT(11) NULL DEFAULT NULL ,
  `banco_deposito` VARCHAR(45) NULL DEFAULT NULL ,
  `fecha_deposito` DATE NULL DEFAULT NULL ,
  `notas` TEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`id_reservacion`) ,
  INDEX `fk_reservaciones_estados` (`id_estado` ASC) ,
  INDEX `fk_reservaciones_clientes` (`id_cliente` ASC) ,
  CONSTRAINT `fk_reservaciones_estados`
    FOREIGN KEY (`id_estado` )
    REFERENCES `local_booking`.`estados` (`id_estado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservaciones_clientes`
    FOREIGN KEY (`id_cliente` )
    REFERENCES `local_booking`.`clientes` (`id_cliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `local_booking`.`estados` (
  `id_estado` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_estado`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `local_booking`.`detalle_reservaciones` (
  `id_detalle_reservacion` INT(11) NOT NULL AUTO_INCREMENT ,
  `id_habitacion` INT(11) NOT NULL ,
  `id_reservacion` INT(11) NOT NULL ,
  `total_adultos` INT(11) NOT NULL DEFAULT 1 ,
  `total_menores` INT(11) NULL DEFAULT NULL ,
  `total` FLOAT(11) NOT NULL ,
  PRIMARY KEY (`id_detalle_reservacion`) ,
  INDEX `fk_detalle_reservaciones_reservacion` (`id_reservacion` ASC) ,
  INDEX `fk_detalle_reservaciones_habitaciones` (`id_habitacion` ASC) ,
  CONSTRAINT `fk_detalle_reservaciones_reservacion`
    FOREIGN KEY (`id_reservacion` )
    REFERENCES `local_booking`.`reservaciones` (`id_reservacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_reservaciones_habitaciones`
    FOREIGN KEY (`id_habitacion` )
    REFERENCES `local_booking`.`habitaciones` (`id_habitacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE  TABLE IF NOT EXISTS `local_booking`.`recordatorios` (
  `id_recordatorio` INT(11) NOT NULL AUTO_INCREMENT ,
  `id_usuario` INT(11) NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `fecha` DATETIME NOT NULL ,
  `intervalo` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_recordatorio`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
