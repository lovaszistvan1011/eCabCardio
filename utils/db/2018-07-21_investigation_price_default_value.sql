-- Price default value 0.00
ALTER TABLE `consult_investigations` CHANGE `price` `price` DOUBLE(9,2) NOT NULL DEFAULT '0.00';

-- Removed price column from analiyzes
ALTER TABLE `consult_analyzes`
  DROP `price`;

-- `analyzes` table changed to InnoDB
ALTER TABLE `ecabcardio`.`analyzes` 
COLLATE = utf8_romanian_ci , ENGINE = InnoDB ;

-- `consult_analyzes` droped and recreated
DROP TABLE `ecabcardio`.`consult_analyzes`

CREATE TABLE `ecabcardio`.`consult_analyzes` (
  `id_consult` INT(9) NOT NULL,
  `id_analyzes` INT(9) NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_romanian_ci
COMMENT = 'Tabela de legătură înte consult și analyzes';

ALTER TABLE `ecabcardio`.`consult_analyzes` 
ADD INDEX `fk_consult_analyzes_analyzes` (`id_analyze` ASC),
ADD INDEX `fk_consult_analyzes_consult` (`id_consult` ASC);

ALTER TABLE `ecabcardio`.`consult_analyzes` 
ADD CONSTRAINT `consult_analyzes_consult`
  FOREIGN KEY (`id_consult`)
  REFERENCES `ecabcardio`.`consult` (`id_consult`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE `ecabcardio`.`consult_analyzes` 
ADD CONSTRAINT `consult_analyzes_analyzes`
  FOREIGN KEY (`id_analyze`)
  REFERENCES `ecabcardio`.`analyzes` (`id_analyze`)
  ON DELETE RESTRICT
  ON UPDATE CASCADE;











