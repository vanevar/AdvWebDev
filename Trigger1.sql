delimiter $$
Drop TRIGGER if exists member_before_insert$$
CREATE TRIGGER member_before_insert 
Before INSERT ON agile_tool.member 
FOR EACH ROW
BEGIN
 declare msg varchar(128);
 -- Capitalize and trim whitespaces first_name and last_name
 -- Lowercase and trim whitespaces email
 -- Encode password (optional: you can do it in your PHP code)
   if length(new.first_n) < 1 then
        set msg = concat('First Name is required');
        signal sqlstate '23000' set
        MESSAGE_TEXT = msg, MYSQL_ERRNO=3001;
    end if;
   if length(new.last_name) < 1 then
    set msg = concat('Last Name is required');
        signal sqlstate '23000' set 
        message_text = msg, MYSQL_ERRNO=3002;
    end if;
    
   if length(new.email) < 1 then
    set msg = concat('Email is required ');
        signal sqlstate '23000' set 
        message_text = msg, MYSQL_ERRNO=3003;
    end if;
    
SET NEW.first_n = TRIM(CONCAT(UCASE(LEFT(new.first_n, 1)),LCASE(SUBSTRING(new.first_n, 2))));
SET NEW.last_name = TRIM(CONCAT(UCASE(LEFT(new.last_name, 1)),LCASE(SUBSTRING(new.last_name, 2))));
SET NEW.email = LOWER(NEW.email);
SET NEW.password= MD5(NEW.password);

END$$


delimiter $$
Drop TRIGGER if exists member_before_update$$
CREATE TRIGGER member_before_update 
Before UPDATE ON agile_tool.member 
FOR EACH ROW
BEGIN
 declare msg varchar(128);
 -- Capitalize and trim whitespaces first_name and last_name
 -- Lowercase and trim whitespaces email
 -- Encode password (optional: you can do it in your PHP code)
   if length(new.first_n) < 1 then
        set msg = concat('First Name is required');
        signal sqlstate '23000' set
        MESSAGE_TEXT = msg, MYSQL_ERRNO=3001;
    end if;
   if length(new.last_name) < 1 then
    set msg = concat('Last Name is required');
        signal sqlstate '23000' set 
        message_text = msg, MYSQL_ERRNO=3002;
    end if;
    
   if length(new.email) < 1 then
    set msg = concat('Email is required ');
        signal sqlstate '23000' set 
        message_text = msg, MYSQL_ERRNO=3003;
    end if;
    
SET NEW.first_n = TRIM(CONCAT(UCASE(LEFT(new.first_n, 1)),LCASE(SUBSTRING(new.first_n, 2))));
SET NEW.last_name = TRIM(CONCAT(UCASE(LEFT(new.last_name, 1)),LCASE(SUBSTRING(new.last_name, 2))));
SET NEW.email = LOWER(NEW.email);
SET NEW.password= MD5(NEW.password);

END$$