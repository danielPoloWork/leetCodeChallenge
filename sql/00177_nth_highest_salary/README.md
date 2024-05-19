# 177. Nth highest salary
#Description at [leetcode.com](https://leetcode.com/problems/nth-highest-salary/description/)

# Intuition
My initial approach was to use the LIMIT and OFFSET clauses along with the ORDER BY clause to retrieve the Nth highest
salary from the Employee table. However, to achieve this, I had to find the correct offset value to skip the top N-1 
highest salaries.

## Approach
1. Variable initialization:

Initialize a temporary variable tempRank to store the value of N - 1.

2. Subquery:

Use a subquery to select the distinct salary value at the Nth position from the sorted list of salaries in descending 
order.

3. Return:

Return the result of the subquery as the Nth highest salary.

## Complexity
- Time complexity:

The time complexity of this approach is approximately 𝑂(𝑁log𝑁), where 𝑁 is the number of employees. This is due to the 
sorting operation required to find the Nth highest salary.

- Space complexity:

The space complexity is 𝑂(1) as the amount of memory required does not increase with the size of the dataset.

## Code
```sql
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
```