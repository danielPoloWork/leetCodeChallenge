# 175. Combine two tables
#Description at [leetcode.com](https://leetcode.com/problems/combine-two-tables/description/)

## Intuition
To solve this problem, we need to join two tables (Person and Address) and ensure that all rows from the Person table are included in the result, even if there is no matching row in the Address table. The goal is to retrieve each person's first name, last name, city, and state, with NULL values for city and state if the address is missing. This intuitively suggests using a LEFT JOIN since it retains all records from the left table (Person) and matches records from the right table (Address).

## Approach
1. SQL LEFT JOIN:

Use a LEFT JOIN to combine the Person and Address tables on the personId column. This join type ensures that every record from the Person table is included in the result, and the corresponding fields from the Address table are included where available.

2. Indexing:

To optimize the performance of the join operation, ensure that there are appropriate indexes on the personId columns in both tables. This significantly reduces the time required to match rows between the tables.

3. Query construction:

Construct the SQL query to select the desired columns (firstName, lastName, city, state) from the combined result of the join.

## Complexity
- Time complexity:

The join operation's time complexity is approximately 𝑂(𝑁log𝑀), where 𝑁 is the number of rows in the Person table and 𝑀 is the number of rows in the Address table. The use of indexes allows the join to be performed more efficiently compared to a full table scan.

- Space complexity:

The space complexity is 𝑂(𝑁+𝑀) for storing the result of the join operation, where 𝑁 is the number of rows in the Person table and
𝑀 is the number of rows in the Address table. This includes the space required for the indexes and the final result set.

## Code
```sql
-- Ensure there is an index on personId in Address table
-- CREATE INDEX idx_address_personId ON Address(personId);
SELECT p.firstName, 
       p.lastName, 
       a.city, 
       a.state 
FROM Person p 
     LEFT JOIN Address a ON p.personId = a.personId;
```