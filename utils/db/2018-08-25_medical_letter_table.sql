/**
 * Author:  stefa
 * Created: 25.07.2018
 */


CREATE TABLE `ecabcardio`.`medical_letter` (
  `id_medical_letter` INT(13) NOT NULL AUTO_INCREMENT,
  `id_consult` INT(13) NOT NULL,
  `letter` TEXT NULL,
  PRIMARY KEY (`id_medical_letter`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_romanian_ci;


ALTER TABLE `ecabcardio`.`medical_letter` 
ADD INDEX `fk_medica_letter_consult_id` (`id_consult` ASC);
ALTER TABLE `ecabcardio`.`medical_letter` 
ADD CONSTRAINT `medical_letter_consult_id`
  FOREIGN KEY (`id_consult`)
  REFERENCES `ecabcardio`.`consult` (`id_consult`)
  ON DELETE RESTRICT
  ON UPDATE CASCADE;

ALTER TABLE `clinic` ADD `phone` VARCHAR(20) NOT NULL AFTER `iban`, ADD `email` VARCHAR(128) NOT NULL AFTER `phone`, ADD `www` VARCHAR(64) NOT NULL AFTER `email`;

INSERT INTO `clinic` (`id_clinic`, `name`, `logo`, `fiscal_numbar`, `trade_number`, `address`, `bank`, `iban`, `phone`, `email`, `www`) VALUES
(1, 'eCabCardio', 'HealthyHeart.png', '258686868', 'J12/123456', 'bd. Eroilor, nr. 7-9', 'Banca Cabinetelor Medicale', 'RO89BCMR000123465785', '0264123456', 'contact@ecabcardio.ro', 'www.ecabcardio.ro');
COMMIT;


ALTER TABLE `ecabcardio`.`medical_letter` 
ADD COLUMN `id_employee` INT(5) NULL AFTER `id_consult`,
ADD INDEX `fk_medical_letter_employee_id` (`id_employee` ASC);

ALTER TABLE `ecabcardio`.`medical_letter` 
ADD CONSTRAINT `medical_letter_employee_id`
  FOREIGN KEY (`id_employee`)
  REFERENCES `ecabcardio`.`employee` (`id_employee`)
  ON DELETE RESTRICT
  ON UPDATE CASCADE;

ALTER TABLE `medical_letter` ADD UNIQUE(`id_consult`);