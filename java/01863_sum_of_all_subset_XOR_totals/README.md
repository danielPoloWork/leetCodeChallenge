# 1863. Sum of all subset XOR totals
#Description at [leetcode.com](https://leetcode.com/problems/sum-of-all-subset-xor-totals/description/)

## Intuition
The problem requires calculating the XOR sum for all subsets of a given array. The XOR operation is a bitwise operation, 
and the challenge is to compute this for every possible subset of the array. This initially suggests a recursive or 
combinatorial approach, as we need to evaluate each subset individually.

## Approach
To solve this problem, we use a recursive approach to explore all possible subsets. The idea is to use a helper function 
that will recursively include or exclude each element in the array to form subsets. For each subset, we calculate the 
XOR value. This approach ensures that all subsets are considered, and the XOR sum of each subset is computed and 
accumulated.

- Recursive function:

We define a helper function that takes the current array, the current index in the array, and the current XOR value as 
parameters.

- Base case:

When the index reaches the length of the array, we return the current XOR value because we have formed a subset.

- Recursive case:

Include the Current Element, we recursively call the helper function with the current element included in the XOR 
calculation. Exclude the Current Element: we recursively call the helper function without including the current element 
in the XOR calculation.

- Sum of both scenarios:

The result for each step is the sum of the results from both including and excluding the current element.

- Exception handling:

Although exceptions are unlikely in this specific context, we include a try-catch block to handle any unexpected errors.

## Complexity
- Time complexity:

The time complexity of this approach is 𝑂(2𝑛), where 𝑛 is the length of the input array. This is because for each 
element, we have two choices: include it in the current subset or exclude it.

- Space complexity:

The space complexity is 𝑂(𝑛), which is the maximum depth of the recursive call stack.

## Code
```java
class Solution {
    public int subsetXORSum(int[] nums) {
        return helper(nums, 0, 0);
    }

    private int helper(int[] nums, int index, int currentXOR) {
        int sum = 0; 

        try {
            if (index == nums.length) {
                sum = currentXOR;
            } else {
                int include = helper(nums, index + 1, currentXOR ^ nums[index]);
                int exclude = helper(nums, index + 1, currentXOR);
                sum = include + exclude;
            }
        } catch (Exception e) {
            System.out.println("Caught exception: " + e.getMessage());
        }
        return sum;
    }
}
```