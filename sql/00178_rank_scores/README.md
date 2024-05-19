# 178. Rank scores
#Description at [leetcode.com](https://leetcode.com/problems/rank-scores/description/)


## Intuition
Upon encountering the problem, I recognized the need for a systematic approach to assign ranks to scores while handling 
ties efficiently. Given the nature of ranking, the use of SQL window functions seemed appropriate for this task.

## Approach
1. Window function:

Leveraging the DENSE_RANK() window function, I aimed to assign ranks to scores based on their values, ensuring that ties 
receive the same rank without creating gaps in the ranking sequence.

2. Ordering:

It was crucial to order the scores in descending order to facilitate ranking from the highest to the lowest. This 
ensured that the highest score received the rank of 1, the second-highest score received the rank of 2, and so on.

3. Query construction:

Formulating an SQL query to select scores along with their corresponding ranks, I utilized the DENSE_RANK() function
within a window to efficiently assign ranks to each score.

## Complexity
- Time complexity:

The time complexity of this approach is approximately 𝑂(𝑛log𝑛), where 𝑛 represents the number of scores. This complexity 
arises from the sorting operation required by the window function to assign ranks based on the descending order of scores.

- Space complexity:

The space complexity is 𝑂(𝑛), as the memory required scales linearly with the number of scores processed during the 
ranking operation.

## Code
```sql
-- Ensure there is an index on score in Scores table
-- CREATE INDEX idx_scores_score ON Scores(score);
SELECT score,
       DENSE_RANK() OVER (ORDER BY score DESC) AS 'rank'
FROM Scores
ORDER BY score DESC;
```