# 176. Second highest salary
#Description at [leetcode.com](https://leetcode.com/problems/second-highest-salary/description/)

## Intuition
The task at hand requires finding the second highest salary from the Employee table. One way to approach this is to sort
the salaries in descending order and select the second highest. However, if there are multiple employees with the same 
salary as the highest, we need to skip them and find the next highest.

## Approach
1. Subquery:

Use a subquery to select distinct salary values from the Employee table, ordered in descending order by salary.

2. LIMIT and OFFSET:

Utilize the LIMIT clause to restrict the number of rows returned by the subquery to 1, and the OFFSET clause to skip the
first highest salary. This effectively retrieves the second highest salary from the sorted list.

3. SELECT AS SecondHighestSalary:

Alias the result of the subquery as SecondHighestSalary to match the desired output format.

## Complexity
- Time complexity:

The time complexity of this approach depends on the efficiency of sorting the salaries and retrieving the second highest
. In most databases, this operation has a time complexity of 𝑂(𝑛log𝑛), where 𝑛 is the number of employees.

- Space complexity:

The space complexity is minimal, mainly consisting of the space required to store the result of the query, which is 
typically 𝑂(1).

## Code
```sql
-- Ensure there is an index on salary in Employee table
-- CREATE INDEX idx_employee_salary ON Employee(salary);

SELECT (SELECT DISTINCT salary
        FROM Employee
        ORDER BY salary DESC
        LIMIT 1 OFFSET 1
       ) AS SecondHighestSalary;
```