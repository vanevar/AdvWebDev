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

-- -----------------------------------------------------
-- Data for table `agile_tool`.`member`
-- -----------------------------------------------------
START TRANSACTION;
USE `agile_tool`;

INSERT INTO `agile_tool`.`member` (`id`, `email`, `password`, `first_name`, `last_name`, `created_at`, `confirmed_at`, `token`, `token_expiring_at`) 
  VALUES (1, 'rohit_c@gmail.com', '123rohit', 'Rohit', 'Chaunan', NULL, NULL, NULL, NULL);
INSERT INTO `agile_tool`.`member` (`id`, `email`, `password`, `first_name`, `last_name`, `created_at`, `confirmed_at`, `token`, `token_expiring_at`) 
  VALUES (2, 'vanessa_v@gmail.com', '123vanessa', 'Vanessa', 'Vargas', NULL, NULL, NULL, NULL);
INSERT INTO `agile_tool`.`member` (`id`, `email`, `password`, `first_name`, `last_name`, `created_at`, `confirmed_at`, `token`, `token_expiring_at`) 
  VALUES (3, 'jorge_c@gmail.com', '123jorge', 'Jorge', 'Centeno', NULL, NULL, NULL, NULL);
INSERT INTO `agile_tool`.`member` (`id`, `email`, `password`, `first_name`, `last_name`, `created_at`, `confirmed_at`, `token`, `token_expiring_at`) 
  VALUES (4, 'juanitah_n@gmail.com', '123juanitah', 'Juanitah', 'Ntambi', NULL, NULL, NULL, NULL);
INSERT INTO `agile_tool`.`member` (`id`, `email`, `password`, `first_name`, `last_name`, `created_at`, `confirmed_at`, `token`, `token_expiring_at`) 
  VALUES (5, 'neha_l@gmail.com', '123neha', 'Neha', 'Likhite', NULL, NULL, NULL, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `agile_tool`.`project`
-- -----------------------------------------------------
START TRANSACTION;
USE `agile_tool`;

INSERT INTO `agile_tool`.`project` (`id`, `name`, `description`, `administrator_id`, `created_at`) 
  VALUES (1, 'Auction Site', 'Sellers can offer a product with a deadline for auction, an auction price, and a floor price (usualy greater than the auction price). Buyers can make bids. The one who makes the highest bid before the deadline wins the product if its bid is above the floor price.', 4, '2017-08-31');
INSERT INTO `agile_tool`.`project` (`id`, `name`, `description`, `administrator_id`, `created_at`) 
  VALUES (2, 'Video Rental Shop', NULL, 1, '2017-10-27');

COMMIT;

-- -----------------------------------------------------
-- Data for table `agile_tool`.`project_member`
-- -----------------------------------------------------
START TRANSACTION;
USE `agile_tool`;

-- PROJECT 1 | Coach Owner Developers QA
INSERT INTO `agile_tool`.`project_member` (`member_id`, `project_id`, `role_id`, `added_at`, `token`) 
VALUES (4, 1, 1, '2017-09-01', NULL);
INSERT INTO `agile_tool`.`project_member` (`member_id`, `project_id`, `role_id`, `added_at`, `token`) 
VALUES (3, 1, 2, '2017-09-01', NULL);
INSERT INTO `agile_tool`.`project_member` (`member_id`, `project_id`, `role_id`, `added_at`, `token`) 
VALUES (1, 1, 3, '2017-09-01', NULL);
INSERT INTO `agile_tool`.`project_member` (`member_id`, `project_id`, `role_id`, `added_at`, `token`) 
VALUES (2, 1, 3, '2017-09-01', NULL);
INSERT INTO `agile_tool`.`project_member` (`member_id`, `project_id`, `role_id`, `added_at`, `token`) 
VALUES (5, 1, 4, '2017-09-01', NULL);

-- PROJECT 2 | Coach Owner Developers QA
INSERT INTO `agile_tool`.`project_member` (`member_id`, `project_id`, `role_id`, `added_at`, `token`) 
VALUES (1, 2, 1, '2017-09-01', NULL);
INSERT INTO `agile_tool`.`project_member` (`member_id`, `project_id`, `role_id`, `added_at`, `token`) 
VALUES (4, 2, 2, '2017-09-01', NULL);
INSERT INTO `agile_tool`.`project_member` (`member_id`, `project_id`, `role_id`, `added_at`, `token`) 
VALUES (5, 2, 3, '2017-09-01', NULL);
INSERT INTO `agile_tool`.`project_member` (`member_id`, `project_id`, `role_id`, `added_at`, `token`) 
VALUES (3, 2, 3, '2017-09-01', NULL);
INSERT INTO `agile_tool`.`project_member` (`member_id`, `project_id`, `role_id`, `added_at`, `token`) 
VALUES (2, 2, 4, '2017-09-01', NULL);


COMMIT;

-- -----------------------------------------------------
-- Data for table `agile_tool`.`iteration`
-- -----------------------------------------------------
START TRANSACTION;
USE `agile_tool`;
INSERT INTO `agile_tool`.`iteration` (`id`, `deadline`, `project_id`) VALUES (1, '2017-11-30', 1);
INSERT INTO `agile_tool`.`iteration` (`id`, `deadline`, `project_id`) VALUES (2, '2018-01-31', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `agile_tool`.`feature`
-- -----------------------------------------------------
START TRANSACTION;
USE `agile_tool`;

INSERT INTO `agile_tool`.`feature` (`id`, `title`, `functionality`, `benefit`, `priority`, `iteration_id`, `project_id`, `user_role_id`) 
  VALUES (1, 'Home Page', 'I find on the homepage of the site the products on which the last auctions took place', 'so that I am aware of the current activity', 1, 1, 1, 1);
INSERT INTO `agile_tool`.`feature` (`id`, `title`, `functionality`, `benefit`, `priority`, `iteration_id`, `project_id`, `user_role_id`) 
  VALUES (2, 'Search', 'I can search products from any page of the site', 'so that placing a bid is the most immediate possible', 2, NULL, 1, 1);
INSERT INTO `agile_tool`.`feature` (`id`, `title`, `functionality`, `benefit`, `priority`, `iteration_id`, `project_id`, `user_role_id`) 
  VALUES (3, 'Product Details', 'I can view the page of each product', 'to have the maximum of information on it', 3, 2, 1, 1);
INSERT INTO `agile_tool`.`feature` (`id`, `title`, `functionality`, `benefit`, `priority`, `iteration_id`, `project_id`, `user_role_id`) 
  VALUES (4, 'Login', 'I can log on any page', 'for ease of access', 2, 2, 1, 2);
INSERT INTO `agile_tool`.`feature` (`id`, `title`, `functionality`, `benefit`, `priority`, `iteration_id`, `project_id`, `user_role_id`) 
  VALUES (5, 'Place Bid', 'I can bid on the product viewed', 'which is the purpose of the site', 1, 2, 1, 2);

COMMIT;


