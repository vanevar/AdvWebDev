 -- task_before_update:
 -- Raises a 3020 owner not defined if the status is not « to be done » (let's say status_id is not 1)
 -- and the owner_id is NULL.
 
 Delimiter $$
Drop TRIGGER if exists task_before_update$$
CREATE TRIGGER task_before_update 
Before UPDATE ON testagile.task 
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
