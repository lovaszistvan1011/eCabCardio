/**
 * Author:  stefa
 * Created: 25.07.2018
 */

CREATE VIEW `v_medical_letter` AS
SELECT `consult`.`id_consult`, `consult`.`consult_reasons`, `consult`.`remarks`, `consult`.`diagnostic`, `consult`.`recommendations`, `employee`.`first_name` AS `employee_first_name`, `employee`.`last_name` AS `employee_last_name`, `employee`.`title` AS `employee_title`, `patient`.`first_name` AS `patient_first_name`, `patient`.`last_name` AS `patient_last_name`, `patient`.`birth_date` AS `patient_birth_date`, `patient`.`address` AS `patient_address`, `patient`.`cnp` AS `patient_cnp`, `locality`.`name` AS `patient_locality`, `county`.`name` AS `patient_county`   
FROM `consult`
INNER JOIN `employee` ON `employee`.`id_employee` = `consult`.`id_employee`   
INNER JOIN `patient` ON `patient`.`id_patient` = `consult`.`id_patient`   
INNER JOIN `locality` ON `locality`.`id_locality` = `patient`.`id_locality`   
INNER JOIN `county` ON `county`.`id_county` = `patient`.`id_county`;
