-- iteration_after_insert:
-- Copy all acceptance tests still not satisfied in the previous iteration with the new iteration_id, and
-- set is_satisfied to NULL to force the testers to test it again.


 Delimiter $$
Drop TRIGGER if exists iteration_after_insert$$
CREATE TRIGGER iteration_after_insert 
AFTER INSERT ON testagile.iteration
FOR EACH ROW
BEGIN 
DECLARE iterationid INT; 
DECLARE acceptanceid INT; 

select id into acceptanceid from testagile.acceptance_test as acpttest,testagile.acceptance_test_status as acptstat where (LOWER(test_result) NOT LIKE '%PASSED%'OR test_result is null) AND bug_id is null AND acptstat.acceptance_test_id= acpttest.id; 

update acceptance_test_status set iteration_id = new.id,is_satisfied=null 
where acceptance_test_id IN (acceptanceid);

END$$
