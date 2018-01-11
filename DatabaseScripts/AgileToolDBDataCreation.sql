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
INSERT INTO `agile_tool`.`task_status` (`id`, `name`) VALUES (4, 'BLOCKING');

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
-- Feature 1 : Delivered on Fisrt Iteration
INSERT INTO `agile_tool`.`feature` (`id`, `title`, `functionality`, `benefit`, `priority`, `iteration_id`, `project_id`, `user_role_id`) 
  VALUES (1, 'Home Page', 'I find on the homepage of the site the products on which the last auctions took place', 'so that I am aware of the current activity', 1, 1, 1, 1);
-- Feature 2 : No iteration
INSERT INTO `agile_tool`.`feature` (`id`, `title`, `functionality`, `benefit`, `priority`, `iteration_id`, `project_id`, `user_role_id`) 
  VALUES (2, 'Search', 'I can search products from any page of the site', 'so that placing a bid is the most immediate possible', 2, NULL, 1, 1);
-- Feature 3 : To be worked on second iteration
INSERT INTO `agile_tool`.`feature` (`id`, `title`, `functionality`, `benefit`, `priority`, `iteration_id`, `project_id`, `user_role_id`) 
  VALUES (3, 'Product Details', 'I can view the page of each product', 'to have the maximum of information on it', 3, 2, 1, 1);
-- Feature 4 : moved from first to second iteration
INSERT INTO `agile_tool`.`feature` (`id`, `title`, `functionality`, `benefit`, `priority`, `iteration_id`, `project_id`, `user_role_id`) 
  VALUES (4, 'Login', 'I can log on any page', 'for ease of access', 2, 2, 1, 2);
-- Feature 5 : on second iteration but no tasks
INSERT INTO `agile_tool`.`feature` (`id`, `title`, `functionality`, `benefit`, `priority`, `iteration_id`, `project_id`, `user_role_id`) 
  VALUES (5, 'Place Bid', 'I can bid on the product viewed', 'which is the purpose of the site', 1, 2, 1, 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `agile_tool`.`acceptance_test` AND `agile_tool`.`acceptance_status`
-- -----------------------------------------------------
START TRANSACTION;
USE `agile_tool`;

-- Feature 1 - passed on the first iteration.
INSERT INTO `agile_tool`.`acceptance_test` (`id`, `description`, `test_result`, `feature_id`, `bug_id`) 
  VALUES (1, 'The last bids are limited to 10.', 'The page loads properly and disolays only the last 10 bids.', 1, NULL);
INSERT INTO `agile_tool`.`acceptance_test_status` (`iteration_id`, `acceptance_test_id`, `is_satisfied`) 
  VALUES (1, 1, TRUE);

-- Feature 2 - No iteration
INSERT INTO `agile_tool`.`acceptance_test` (`id`, `description`, `test_result`, `feature_id`, `bug_id`) 
  VALUES (2, 'The products found display the title, the category, the current auction amount on the product, and the deadline.', NULL, 2, NULL);
INSERT INTO `agile_tool`.`acceptance_test` (`id`, `description`, `test_result`, `feature_id`, `bug_id`) 
  VALUES (3, 'A click on each product displays the product details page.', NULL, 2, NULL);

-- Feature 3 - Second iteration. One acceptance test passed.
INSERT INTO `agile_tool`.`acceptance_test` (`id`, `description`, `test_result`, `feature_id`, `bug_id`) 
  VALUES (4, 'If I am identified, I can bid on the product.', NULL, 3, NULL);
INSERT INTO `agile_tool`.`acceptance_test` (`id`, `description`, `test_result`, `feature_id`, `bug_id`) 
  VALUES (5, 'A click on the seller displays his page.', 'Passed with mock seller page.', 3, NULL);
INSERT INTO `agile_tool`.`acceptance_test_status` (`iteration_id`, `acceptance_test_id`, `is_satisfied`) 
  VALUES (2, 5, TRUE);

-- Feature 4 - Spanning over 2 iterations. One test passed. One failed, 
-- BUG TASK WILL BE CREATED LATER
INSERT INTO `agile_tool`.`acceptance_test` (`id`, `description`, `test_result`, `feature_id`, `bug_id`) 
  VALUES (6, 'If I am wrong, a « forgot password » link allows me to receive an email to reset it.', 'FAILED. Email was never received.', 4, NULL);
INSERT INTO `agile_tool`.`acceptance_test_status` (`iteration_id`, `acceptance_test_id`, `is_satisfied`) 
  VALUES (1, 6, FALSE);
INSERT INTO `agile_tool`.`acceptance_test` (`id`, `description`, `test_result`, `feature_id`, `bug_id`) 
  VALUES (7, 'f I am logged in, the login form is replaced by a « disconnect X » button, where X is my username.', 'PASSED.', 4, NULL);
INSERT INTO `agile_tool`.`acceptance_test_status` (`iteration_id`, `acceptance_test_id`, `is_satisfied`) 
  VALUES (1, 7, TRUE);

-- Feature 5 - Second iteration
INSERT INTO `agile_tool`.`acceptance_test` (`id`, `description`, `test_result`, `feature_id`, `bug_id`) 
  VALUES (8, 'The amount I propose must exceed the amount of the last bid on this product.', NULL, 5, NULL);
INSERT INTO `agile_tool`.`acceptance_test` (`id`, `description`, `test_result`, `feature_id`, `bug_id`) 
  VALUES (9, 'The seller of this product can not bid on it.', NULL, 5, NULL);  

COMMIT;

-- -----------------------------------------------------
-- Data for table `agile_tool`.`task` 
-- -----------------------------------------------------
START TRANSACTION;
USE `agile_tool`;

-- Feature 1 Tasks DONE.
INSERT INTO `agile_tool`.`task` (`id`, `title`, `description`, `estimated_duration`, `actual_duration`, `feature_id`, `status_id`, `owner_id`) 
VALUES (1, 'Creation of Home Page UI', 'Creation of the UI for the homepage. ', 2, 2, 1, 3, 2);
INSERT INTO `agile_tool`.`task` (`id`, `title`, `description`, `estimated_duration`, `actual_duration`, `feature_id`, `status_id`, `owner_id`) 
VALUES (2, 'Creation of Home Page Back End', 'Showing the 10 latests bids. ', 3, 2, 1, 3, 1);

-- Feature 2 NO ITERATION NO TASKS

-- Feature 3 
INSERT INTO `agile_tool`.`task` (`id`, `title`, `description`, `estimated_duration`, `actual_duration`, `feature_id`, `status_id`, `owner_id`) 
VALUES (3, 'Login functionallity', 'Implementation of the login functionallity.', 4, NULL, 3, 2, 1);
INSERT INTO `agile_tool`.`task` (`id`, `title`, `description`, `estimated_duration`, `actual_duration`, `feature_id`, `status_id`, `owner_id`) 
VALUES (4, 'Seller page implementation.', 'Implementation of the saler profile page.', 2, 3, 3, 3, 2);

-- Feature 4
INSERT INTO `agile_tool`.`task` (`id`, `title`, `description`, `estimated_duration`, `actual_duration`, `feature_id`, `status_id`, `owner_id`) 
VALUES (5, 'Reset password email', 'Implementation of the reset password email functionallity.', 2, 2, 4, 3, 2);
INSERT INTO `agile_tool`.`task` (`id`, `title`, `description`, `estimated_duration`, `actual_duration`, `feature_id`, `status_id`, `owner_id`) 
VALUES (6, 'Disconnect functionallity', 'Implementation of the disconnect functionallity.', 1, 1, 4, 3, 1);
-- Feature 4 BUG
INSERT INTO `agile_tool`.`task` (`id`, `title`, `description`, `estimated_duration`, `actual_duration`, `feature_id`, `status_id`, `owner_id`) 
VALUES (7, 'BUG Reset Password Email', 'Found during testing. The feature 4 acceptance test for the reset email password failed.', 4, NULL, 4, 1, NULL);
-- update Acceptance test
UPDATE `agile_tool`.`acceptance_test`
SET bug_id = 7
WHERE id = 6;

COMMIT;