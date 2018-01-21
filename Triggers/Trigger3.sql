 -- project_member_before_insert_or_update:
 -- Raises a 3010 more than one product owner if there is already one and we try to insert/update 
 -- Raises a 3011 more than one coach (same behaviour)
 
 Delimiter $$
Drop TRIGGER if exists project_member_before_insert$$
CREATE TRIGGER project_member_before_insert 
Before INSERT ON agile_tool.project_member 
FOR EACH ROW
BEGIN
 declare membercount int;
 declare msg varchar(128);
 
 
 if new.role_id = 1 then
 select count(member_id) into membercount from project_member where role_id=1 and project_id= new.project_id;
 
 if membercount = 1 then
	set msg = concat('Coach already exists');
        signal sqlstate '23000' set
        MESSAGE_TEXT = msg, MYSQL_ERRNO=3010;
    end if;
end if;	
	
	if new.role_id =2 then 
	select count(member_id) into membercount from project_member where role_id=2 and project_id= new.project_id;
	
if membercount = 1 then
	set msg = concat('Project owner already exists');
        signal sqlstate '23000' set
        MESSAGE_TEXT = msg, MYSQL_ERRNO=3011;
    end if;	
    end if;
	
END$$

 Delimiter $$
Drop TRIGGER if exists project_member_before_update$$
CREATE TRIGGER project_member_before_update 
Before UPDATE ON agile_tool.project_member
FOR EACH ROW
BEGIN
 declare membercount int;
 declare msg varchar(128);
 
 if new.role_id = 1 then
 select count(member_id) into membercount from project_member where role_id=1 and project_id= new.project_id;
 
 if membercount = 1 then
	set msg = concat('Coach already exists');
        signal sqlstate '23000' set
        MESSAGE_TEXT = msg, MYSQL_ERRNO=3010;
    end if;	
    end if;	
	
	if new.role_id =2 then 
	select count(member_id) into membercount from project_member where role_id=2 and project_id= new.project_id;
	
if membercount = 1 then
	set msg = concat('Project owner already exists');
        signal sqlstate '23000' set
        MESSAGE_TEXT = msg, MYSQL_ERRNO=3011;
    end if;	
	end if;	
END$$
