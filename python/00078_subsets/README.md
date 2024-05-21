# 78. Subsets
#Description at [leetcode.com](https://leetcode.com/problems/subsets/description/)

## Intuition
When asked to generate all possible subsets of a given set of unique integers, a natural approach is to systematically 
explore every possible combination of the elements. One intuitive way to achieve this is through backtracking, a 
technique that allows us to build subsets incrementally and backtrack to explore other possibilities when necessary. 
This ensures that we can explore all subsets without missing any.

## Approach
We use a backtracking approach to generate all possible subsets:

1. Initialization:

Start with an empty list output to store all subsets then define a helper function backtrack that takes two parameters. 
Start, indicating the starting index of the current subset, and path, representing the current subset being built.

2. Backtracking Function:

Append the current subset path to the output.
Iterate through the elements starting from the start index.
For each element:
Include it in the current subset (path.append(nums[i])).
Recursively call backtrack with the next index (i + 1) to continue building the subset.
Remove the element from the current subset (path.pop()) to backtrack and explore other subsets.
This process ensures that all combinations are explored, resulting in the complete power set.

## Complexity
- Time complexity:

O(2^n⋅n) There are 2^𝑛 subsets for an array of length 𝑛. Generating each subset takes 𝑂(𝑛) time in the worst case.

- Space complexity:

𝑂(𝑛) The depth of the recursion tree is 𝑛, and we use 𝑂(𝑛) space for the path list.

## Code
```py
class Solution(object):
    def subsets(self, nums):
        """
        :type nums: List[int]
        :rtype: List[List[int]]
        """
        def backtrack(start, path):
            # Append the current path (subset) to the output
            output.append(path[:])
            # Iterate over the remaining elements
            for i in range(start, len(nums)):
                # Include nums[i] in the current subset
                path.append(nums[i])
                # Move on to the next element
                backtrack(i + 1, path)
                # Exclude nums[i] from the current subset
                path.pop()
        
        output = []
        backtrack(0, [])
        return output

```