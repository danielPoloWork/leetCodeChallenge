-- Table: Employee
-- +-------------+------+
-- | Column Name | Type |
-- +-------------+------+
-- | id          | int  |
-- | salary      | int  |
-- +-------------+------+
-- id is the primary key (column with unique values) for this table.
-- Each row of this table contains information about the salary of an employee.
--
--
-- Write a solution to find the nth highest salary from the Employee table. If there is no nth highest salary, return
-- null. The result format is in the following example.

-- Ensure there is an index on salary in Employee table
-- CREATE INDEX idx_employee_salary ON Employee(salary);
CREATE FUNCTION getNthHighestSalary(N INT) RETURNS INT
BEGIN
    DECLARE tempRank INT;
    SET tempRank = (N - 1);
    RETURN (
        SELECT (SELECT DISTINCT salary
                FROM Employee
                ORDER BY salary DESC
                LIMIT 1 OFFSET tempRank
               ) AS getNthHighestSalary
    );
END