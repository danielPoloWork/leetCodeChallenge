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
-- Write a solution to find the second highest salary from the Employee table. If there is no second highest salary,
-- return null (return None in Pandas). The result format is in the following example.

-- Ensure there is an index on salary in Employee table
-- CREATE INDEX idx_employee_salary ON Employee(salary);
SELECT (SELECT DISTINCT salary
        FROM Employee
        ORDER BY salary DESC
        LIMIT 1 OFFSET 1
       ) AS SecondHighestSalary;