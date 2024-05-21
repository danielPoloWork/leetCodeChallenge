# 78. Subsets
#Description at [leetcode.com](https://leetcode.com/problems/subsets/description/)

## Intuition
The problem requires generating all possible subsets of a given array of unique elements. The immediate thought is to 
consider the nature of subsets and how they can be systematically generated. Each element in the array can either be 
included in a subset or not, leading to a combinatorial explosion of possibilities. Using bit manipulation allows us to 
represent each subset in a binary format, where each bit indicates whether an element is included in the subset.

## Approach
The approach leverages bit manipulation to generate all possible subsets of the input array. Each subset can be 
represented by a binary number, where the presence of a bit (1) at position j indicates the inclusion of the element at 
index j in the subset. Here's a step-by-step breakdown:

1. Calculate the total number of subsets possible, which is 2^𝑛 where 𝑛 is the length of the input array.
2. Iterate through numbers from 0 to 2^𝑛−1. Each number represents a unique subset.
3. For each number, use bitwise operations to determine which elements are included in the subset. Specifically, check 
4. each bit of the number to decide whether the corresponding element in the array should be included.
4. Collect these subsets and return them as the final output.

## Complexity
- Time complexity:

The time complexity is 𝑂(2^𝑛 ⋅ 𝑛). This is because there are 2^𝑛 subsets and generating each subset involves checking 
each of the 𝑛 elements.

- Space complexity:

The space complexity is 𝑂(2^𝑛 ⋅ 𝑛) to store all the subsets. Each subset can have up to 𝑛 elements, and there are 2^𝑛 
subsets in total.

## Code
```cpp
#include <vector>
#include <cmath>

class Solution {
public:
    std::vector<std::vector<int>> subsets(std::vector<int>& nums) {
        std::vector<std::vector<int>> output;
        int numSize = nums.size();
        int numSubset = std::pow(2, numSize);

        for (int i = 0; i < numSubset; i++) {
            std::vector<int> temp;
            for (int j = 0; j < numSize; j++) {
                if ((i >> j) & 1) {
                    temp.push_back(nums[j]);
                }
            }
            output.push_back(temp);
        }
        return output;
    }
};
```