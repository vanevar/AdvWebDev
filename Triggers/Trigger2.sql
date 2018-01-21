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
