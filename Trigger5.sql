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

-- considering status 10 for new bugs
CREATE PROCEDURE doWhile()   
BEGIN
DECLARE taskownercount INT; 
select count(is_satisfied) into taskownercount from task where is_satisfied is FALSE;
WHILE (taskownercount < 1) DO
    
	INSERT INTO agile_tool.task 
	set id=new.id, title ='New Bug',description='New bug encountered',estimated_duration=null,actual_duration=null,feature_id=LAST_INSERT_ID(),status_id=10,owner_id=null;
	
	INSERT INTO agile_tool.acceptance_test 
	set id=new.id, description='New bug encountered',test_result='In progress',feature_id=LAST_INSERT_ID,bug_id=LAST_INSERT_ID;
    
	SET taskownercount = taskownercount -1;
END WHILE;
END;