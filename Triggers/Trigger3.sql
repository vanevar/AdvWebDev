 -- project_member_before_insert_or_update:
 -- Raises a 3010 more than one product owner if there is already one and we try to insert/update 
 -- Raises a 3011 more than one coach (same behaviour)
 
 Delimiter $$
Drop TRIGGER if exists project_member_before_insert$$
CREATE TRIGGER project_member_before_insert 
Before INSERT ON agile_tool.project 
FOR EACH ROW
BEGIN
 declare msg varchar(128);
 
 select count(id) into projectownercount from project_role where id=1;
 
 if projectownercount == 1 then
	set msg = concat('Project Owner already exists');-
        signal sqlstate '23000' set
        MESSAGE_TEXT = msg, MYSQL_ERRNO=3010;
    end if;	
END$$

 Delimiter $$
Drop TRIGGER if exists project_member_before_update$$
CREATE TRIGGER project_member_before_update 
Before UPDATE ON agile_tool.project 
FOR EACH ROW
BEGIN
 declare msg varchar(128);
 
 select count(id) into projectownercount from project_role where id=1;
 
 if projectownercount == 1 then
	set msg = concat('Project Owner already exists');-
        signal sqlstate '23000' set
        MESSAGE_TEXT = msg, MYSQL_ERRNO=3010;
    end if;	
END$$