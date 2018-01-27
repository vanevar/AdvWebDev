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
