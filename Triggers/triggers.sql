-- -------------------------------------------------------------------------------
-- TRIGGER 1 : member_before_insert && member_before_update
-- -------------------------------------------------------------------------------
delimiter $$
Drop TRIGGER if exists member_before_insert$$
CREATE TRIGGER member_before_insert 
Before INSERT ON agile_tool.member 
FOR EACH ROW
BEGIN
 declare msg varchar(128);
 -- Capitalize and trim whitespaces first_nameame and last_name
 -- Lowercase and trim whitespaces email
 -- Encode password (optional: you can do it in your PHP code)
   if length(new.first_name) < 1 then
        set msg = concat('First Name is mandatory');
        signal sqlstate '23000' set
        MESSAGE_TEXT = msg, MYSQL_ERRNO=3001;
    end if;
   if length(new.last_name) < 1 then
    set msg = concat('Last Name is mandatory');
        signal sqlstate '23000' set 
        message_text = msg, MYSQL_ERRNO=3002;
    end if;
   if length(new.email) < 5 then
    set msg = concat('Email is mandatory ');
        signal sqlstate '23000' set 
        message_text = msg, MYSQL_ERRNO=3003;
    end if;
    
SET NEW.first_name = TRIM(CONCAT(UCASE(LEFT(new.first_name, 1)),LCASE(SUBSTRING(new.first_name, 2))));
SET NEW.last_name = TRIM(CONCAT(UCASE(LEFT(new.last_name, 1)),LCASE(SUBSTRING(new.last_name, 2))));
SET NEW.email = TRIM(LOWER(NEW.email));
SET NEW.password= NEW.password;

END$$


delimiter $$
Drop TRIGGER if exists member_before_update$$
CREATE TRIGGER member_before_update 
Before UPDATE ON agile_tool.member 
FOR EACH ROW
BEGIN
 declare msg varchar(128);
 -- Capitalize and trim whitespaces first_nameame and last_name
 -- Lowercase and trim whitespaces email
 -- Encode password (optional: you can do it in your PHP code)
   if length(new.first_name) < 1 then
        set msg = concat('First Name is mandatory');
        signal sqlstate '23000' set
        MESSAGE_TEXT = msg, MYSQL_ERRNO=3001;
    end if;
   if length(new.last_name) < 1 then
    set msg = concat('Last Name is mandatory');
        signal sqlstate '23000' set 
        message_text = msg, MYSQL_ERRNO=3002;
    end if;
    
   if length(new.email) < 5 then
    set msg = concat('Email is mandatory ');
        signal sqlstate '23000' set 
        message_text = msg, MYSQL_ERRNO=3003;
    end if;
    
SET NEW.first_name = TRIM(CONCAT(UCASE(LEFT(new.first_name, 1)),LCASE(SUBSTRING(new.first_name, 2))));
SET NEW.last_name = TRIM(CONCAT(UCASE(LEFT(new.last_name, 1)),LCASE(SUBSTRING(new.last_name, 2))));
SET NEW.email = TRIM(LOWER(NEW.email));
SET NEW.password= NEW.password;

END$$

-- -------------------------------------------------------------------------------
-- TRIGGER 2 : project_before_insert && project_before_update
-- -------------------------------------------------------------------------------

 -- project_before_insert_or_update:
 -- Raises a 3001 Blank mandatory field if title is blank.
 
Delimiter $$
Drop TRIGGER if exists project_before_insert$$
CREATE TRIGGER project_before_insert 
Before INSERT ON agile_tool.project 
FOR EACH ROW
BEGIN
 declare msg varchar(128);
 
 if length(new.name) < 1 then
set msg = concat('Project Title is required');
        signal sqlstate '23000' set
        MESSAGE_TEXT = msg, MYSQL_ERRNO=3001;
    end if;
	
END$$

Delimiter $$
Drop TRIGGER if exists project_before_update$$
CREATE TRIGGER project_before_update 
Before UPDATE ON agile_tool.project 
FOR EACH ROW
BEGIN
declare msg varchar(128);
 
 if length(new.name) < 1 then
set msg = concat('Project Title is required');
        signal sqlstate '23000' set
        MESSAGE_TEXT = msg, MYSQL_ERRNO=3001;
    end if;
	
END$$

-- -------------------------------------------------------------------------------
-- TRIGGER 3 : project_user_before_insert && project_user_before_update
-- -------------------------------------------------------------------------------

 -- project_user_before_insert_or_update:
 -- Raises a 3010 more than one product owner if there is already one and we try to insert/update 
 -- Raises a 3011 more than one coach (same behaviour)
 
 Delimiter $$
Drop TRIGGER if exists project_user_before_insert$$
CREATE TRIGGER project_user_before_insert 
Before INSERT ON agile_tool.project_user 
FOR EACH ROW
BEGIN
 declare membercount int;
 declare msg varchar(128);
 
 
 if new.role_id = 1 then
 select count(member_id) into membercount from project_user where role_id=1 and project_id= new.project_id;
 
 if membercount = 1 then
	set msg = concat('Coach already exists');
        signal sqlstate '23000' set
        MESSAGE_TEXT = msg, MYSQL_ERRNO=3010;
    end if;
end if;	
	
	if new.role_id =2 then 
	select count(member_id) into membercount from project_user where role_id=2 and project_id= new.project_id;
	
if membercount = 1 then
	set msg = concat('Project owner already exists');
        signal sqlstate '23000' set
        MESSAGE_TEXT = msg, MYSQL_ERRNO=3011;
    end if;	
    end if;
	
END$$

 Delimiter $$
Drop TRIGGER if exists project_user_before_update$$
CREATE TRIGGER project_user_before_update 
Before UPDATE ON agile_tool.project_user
FOR EACH ROW
BEGIN
 declare membercount int;
 declare msg varchar(128);
 
 if new.role_id = 1 then
 select count(member_id) into membercount from project_user where role_id=1 and project_id= new.project_id;
 
 if membercount = 1 then
	set msg = concat('Coach already exists');
        signal sqlstate '23000' set
        MESSAGE_TEXT = msg, MYSQL_ERRNO=3010;
    end if;	
    end if;	
	
	if new.role_id =2 then 
	select count(member_id) into membercount from project_user where role_id=2 and project_id= new.project_id;
	
if membercount = 1 then
	set msg = concat('Project owner already exists');
        signal sqlstate '23000' set
        MESSAGE_TEXT = msg, MYSQL_ERRNO=3011;
    end if;	
	end if;	
END$$

-- -------------------------------------------------------------------------------
-- TRIGGER 4 : iteration_after_insert
-- -------------------------------------------------------------------------------

-- iteration_after_insert:
-- Copy all acceptance tests still not satisfied in the previous iteration with the new iteration_id, and
-- set is_satisfied to NULL to force the testers to test it again.


 Delimiter $$
Drop TRIGGER if exists iteration_after_insert$$
CREATE TRIGGER iteration_after_insert 
AFTER INSERT ON agile_tool.iteration
FOR EACH ROW
BEGIN 
DECLARE iterationid INT; 
DECLARE acceptanceid INT; 

select id into acceptanceid from agile_tool.acceptance_test as acpttest,agile_tool.acceptance_test_status as acptstat where (LOWER(test_result) NOT LIKE '%PASSED%'OR test_result is null) AND bug_id is null AND acptstat.acceptance_test_id= acpttest.id; 

update acceptance_test_status set iteration_id = new.id,is_satisfied=null 
where acceptance_test_id IN (acceptanceid);

END$$

-- -------------------------------------------------------------------------------
-- TRIGGER 5 : acceptance_test_status_after_update
-- -------------------------------------------------------------------------------

-- acceptance_test_status_after_update:
-- If is_satisfied is set to false, creates a bug entry in task and sets its id to bug_id in the
-- corresponding acceptance_test.


 Delimiter $$
Drop TRIGGER if exists acceptance_test_status_after_update$$
CREATE TRIGGER acceptance_test_status_after_update 
AFTER UPDATE ON agile_tool.acceptance_test_status 
FOR EACH ROW
BEGIN
CALL doWhile(); 
END$$

DROP procedure IF EXISTS doWhile$$
CREATE PROCEDURE doWhile()   
BEGIN
DECLARE featureid INT; 
DECLARE acceptanceid INT; 
DECLARE statfailedcn INT; 

		-- Selecting the data from Acceptance status and acceptance test table
SELECT count(acpstat.acceptance_test_id),acpstat.acceptance_test_id,acptest.feature_id INTO statfailedcn,acceptanceid,featureid
FROM agile_tool.acceptance_test_status AS acpstat, agile_tool.acceptance_test AS acptest 
WHERE acpstat.acceptance_test_id=acptest.id AND acpstat.is_satisfied is FALSE;

IF statfailedcn > 0 THEN 	
		
	INSERT INTO agile_tool.task(id,title,description,estimated_duration,actual_duration,feature_id,status_id,owner_id) VALUES (0 ,'New Bug',null,null,null,featureid,1,null); 
	
	UPDATE agile_tool.acceptance_test SET bug_id= LAST_INSERT_ID() where acceptance_test.id =acceptanceid;
	
	
END IF;
END;


-- -------------------------------------------------------------------------------
-- TRIGGER 6 : task_before_update
-- -------------------------------------------------------------------------------

 -- task_before_update:
 -- Raises a 3020 owner not defined if the status is not « to be done » (let's say status_id is not 1)
 -- and the owner_id is NULL.
 
 Delimiter $$
Drop TRIGGER if exists task_before_update$$
CREATE TRIGGER task_before_update 
Before UPDATE ON agile_tool.task 
FOR EACH ROW
BEGIN
declare taskownercount int;
 declare msg varchar(128);
 
 
 select count(id) into taskownercount from task where new.status_id <> 1 and new.owner_id is null;
 
 if taskownercount > 0 then
	set msg = concat('Task Owner not defined');
        signal sqlstate '23000' set
        MESSAGE_TEXT = msg, MYSQL_ERRNO=3020;
    end if;	
END$$


-- -------------------------------------------------------------------------------
-- END OF TRIGGERS
-- -------------------------------------------------------------------------------
