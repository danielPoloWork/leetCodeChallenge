# 78. Subsets
#Description at [leetcode.com](https://leetcode.com/problems/subsets/description/)

## Intuition
The problem requires generating all possible subsets of a given array. This task can be effectively handled using bit 
manipulation. Each subset can be represented as a binary number, where each bit indicates whether a particular element 
is included in the subset or not. For an array of length n, there are 2^n possible subsets, corresponding to the binary 
numbers from 0 to 2^n - 1.

## Approach
1. Create an empty list output to store all subsets.
2. Calculate the number of elements in the input array nums.
3. Determine the total number of subsets (numSubset) as 2^numSize using the bit shift operation.
4. Use a loop that iterates from 0 to numSubset - 1. Each iteration represents a potential subset.
5. For each value of i, use another loop to check each bit position j.
6. If the bit at position j in i is set (i.e., (i >> j) & 1 equals 1), include nums[j] in the current subset.
7. After constructing the subset, add it to the output list.
8. After generating all subsets, return the output list.

## Complexity
- Time complexity:

Time complexity: The time complexity is 𝑂(𝑛⋅2^𝑛), where n is the length of the input array. This is because there are 
2^n subsets and for each subset, it takes O(n) time to construct it.

- Space complexity:

The space complexity is also 𝑂(𝑛⋅2^𝑛). This is due to storing all subsets, where each subset can have up to n elements.

## Code
```java
import java.util.ArrayList;
import java.util.List;

class Solution {
    public List<List<Integer>> subsets(int[] nums) {
        List<List<Integer>> output = new ArrayList<>();
        int numSize = nums.length;
        int numSubset = 1 << numSize; // Equivalent to 2^numSize

        for (int i = 0; i < numSubset; i++) {
            List<Integer> temp = new ArrayList<>();
            for (int j = 0; j < numSize; j++) {
                if ((i >> j & 1) == 1) {
                    temp.add(nums[j]);
                }
            }
            output.add(temp);
        }

        return output;
    }
}
```