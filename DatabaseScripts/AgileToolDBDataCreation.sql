-- ************************************** --
-- DATA CREATION FOR agile_tool Data Base --
-- ************************************** --

-- -----------------------------------------------------
-- Data for table `agile_tool`.`project_role`
-- -----------------------------------------------------
START TRANSACTION;
USE `agile_tool`;
INSERT INTO `agile_tool`.`project_role` (`id`, `name`) VALUES (1, 'COACH');
INSERT INTO `agile_tool`.`project_role` (`id`, `name`) VALUES (2, 'OWNER');
INSERT INTO `agile_tool`.`project_role` (`id`, `name`) VALUES (3, 'DEVELOPER');
INSERT INTO `agile_tool`.`project_role` (`id`, `name`) VALUES (4, 'QUALITY ENGINEER');

COMMIT;

-- -----------------------------------------------------
-- Data for table `agile_tool`.`user_role`
-- -----------------------------------------------------
START TRANSACTION;
USE `agile_tool`;
INSERT INTO `agile_tool`.`user_role` (`id`, `name`) VALUES (1, 'VISITOR');
INSERT INTO `agile_tool`.`user_role` (`id`, `name`) VALUES (2, 'REGISTERED USER');

COMMIT;

-- -----------------------------------------------------
-- Data for table `agile_tool`.`task_status`
-- -----------------------------------------------------
START TRANSACTION;
USE `agile_tool`;
INSERT INTO `agile_tool`.`task_status` (`id`, `name`) VALUES (1, 'TO DO');
INSERT INTO `agile_tool`.`task_status` (`id`, `name`) VALUES (2, 'ON GOING');
INSERT INTO `agile_tool`.`task_status` (`id`, `name`) VALUES (3, 'DONE');
INSERT INTO `agile_tool`.`task_status` (`id`, `name`) VALUES (3, 'BLOCKING');

COMMIT;





