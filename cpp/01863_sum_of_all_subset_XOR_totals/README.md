# 1863. Sum of all subset XOR totals
#Description at [leetcode.com](https://leetcode.com/problems/sum-of-all-subset-xor-totals/description/)

## Intuition
The problem requires calculating the sum of XOR values for all possible subsets of a given array. My first thought was 
to generate all subsets and compute their XOR sums, but this approach is computationally expensive. Instead, I realized 
that recursion could be used to break down the problem into smaller sub-problems, where each element is either included 
or excluded from the subset.

## Approach
To solve this problem efficiently, we use a recursive approach that dynamically calculates the XOR value for each subset
:

- Recursive function definition:

A helper function is defined that takes the current index in the array and the current XOR value as parameters.

- Base case:

If the index reaches the length of the array, it means all elements have been considered, and the current XOR value is 
returned.

- Recursive case:

For each element, there are two choices. Include the element in the current XOR calculation and move to the next element
. Exclude the element from the current XOR calculation and move to the next element.

- Combine results:

The result is the sum of the results of both choices.

## Complexity
- Time complexity:

O(2𝑛), where 𝑛 is the number of elements in the input array. Each element can be either included or excluded, leading to 
2𝑛 possible subsets.

- Space complexity:

O(𝑛), due to the recursion stack depth, which can go up to the number of elements in the array.

## Code
```cpp
#include <vector>

using namespace std;

class Solution {
public:
    int subsetXORSum(vector<int>& nums) {
        return helper(nums, 0, 0);
    }

private:
    int helper(vector<int>& nums, int index, int currentXOR) {
        int sum = 0; 

        try {
            if (index == nums.size()) {sum = currentXOR;} 
            else {
                int include = helper(nums, index + 1, currentXOR ^ nums[index]);
                int exclude = helper(nums, index + 1, currentXOR);
                sum = include + exclude;
            }
        } catch (const std::exception& e) {
            std::cout << "Caught exception: " << e.what() << std::endl;
        }
        return sum;
    }
};
```