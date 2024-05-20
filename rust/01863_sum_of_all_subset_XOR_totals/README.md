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

Include the current element, we recursively call the helper function with the current element included in the XOR 
calculation. Exclude the current element, we recursively call the helper function without including the current element 
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
```rust
impl Solution {
    /**
     * Function to compute the XOR subset sum for given numbers
     *
     * @param nums An array of integers.
     * @return int The XOR subset sum computed.
     */
    pub fn subset_xor_sum(nums: Vec<i32>) -> i32 {
        // Call helper function to compute XOR subset sum
        Self::helper(&nums, 0, 0)
    }

    /**
     * A private helper function to calculate XOR subset sum.
     *
     * @param nums An array of integers.
     * @param index The element index to consider for calculation.
     * @param current_xor The XOR subset sum till this point.
     * @return int The total XOR subset sum calculated.
     */
    fn helper(nums: &Vec<i32>, index: usize, current_xor: i32) -> i32 {
        // Base case: If index is out of boundary, return the current XOR
        if index == nums.len() {
            return current_xor;
        }

        // Recursive case 1: Include the current element in the XOR and move to the next element
        let include = Self::helper(nums, index + 1, current_xor ^ nums[index]);

        // Recursive case 2: Exclude the current element from the XOR and move to the next element
        let exclude = Self::helper(nums, index + 1, current_xor);

        // Return the sum of both scenarios (including and excluding the current element)
        include + exclude
    }
}
```