RENAME TABLE `ecabcardio`.`analyzes` TO `ecabcardio`.`investigations`;

ALTER TABLE `investigations` CHANGE `id_analyzes` `id_investigations` INT(5) NOT NULL AUTO_INCREMENT;

ALTER TABLE `employee` CHANGE `pass` `pass` VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_romanian_ci NULL DEFAULT NULL;

DROP TABLE IF EXISTS `consult_investigations`;
CREATE TABLE IF NOT EXISTS `consult_investigations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_consult` int(13) NOT NULL,
  `id_analyzes` int(5) NOT NULL,
  `price` double(9,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_consult_analyzes_consult` (`id_consult`),
  KEY `fk_consult_analyzes_analyzes` (`id_analyzes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci COMMENT='Tabelă de legătură cu detalii despre analizele efectuate';
COMMIT;

CREATE TABLE `ecabcardio`.`analyzes` ( `id_analyze` INT(7) NOT NULL AUTO_INCREMENT , `name` VARCHAR(64) NOT NULL , PRIMARY KEY (`id_analyze`)) ENGINE = MyISAM;
