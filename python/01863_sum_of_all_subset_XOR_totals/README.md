# 1863. Sum of all subset XOR totals
#Description at [leetcode.com](https://leetcode.com/problems/sum-of-all-subset-xor-totals/description/)

## Intuition
The problem at hand involves finding the XOR sum for all possible subsets of a given array. This essentially entails 
exploring every combination of elements within the array to compute their XOR value. Initially, this suggests a 
recursive approach, wherein we systematically examine each element's inclusion or exclusion in forming subsets.

## Approach
Our strategy to tackle this problem is based on recursion, where we traverse through the array, considering each 
element's inclusion or exclusion in forming subsets. Here's a more detailed breakdown:

- Recursive function:

We define a method named subsetXORSum within the Solution class. This method acts as an entry point and calls a helper 
function to compute the XOR subset sum.

- Helper function:

The helper method is a private function within the Solution class. It takes three parameters: the array nums, the 
current index index, and the current XOR sum currentXOR.

- Base Case:

Upon reaching the end of the array (index == len(nums)), we return the currentXOR sum as we have formed a subset.

- Recursive Case:

For each element in the array, we have two choices: include it in the XOR calculation or exclude it. We recursively call 
the helper function with the next index and an updated XOR sum for both scenarios.

- Sum Calculation:

Once both recursive calls return, we calculate the sum of both scenarios (including and excluding the current element)
and return the result.

- Exception Handling:

Although exceptions are unlikely in this specific context, we include a try-except block to catch any unexpected errors 
and log them for debugging purposes.

## Complexity
- Time complexity:

The time complexity of this approach is exponential, specifically O(2^n), where n represents the length of the input 
array nums. This exponential time complexity arises because, for each element, we have two choices: include it in the 
current subset or exclude it. As a result, the number of recursive calls grows exponentially with the size of the input.

- Space complexity:

Similarly, the space complexity is also exponential, O(2^n), which corresponds to the maximum depth of the recursive 
call stack. With each recursive call, a new frame is added to the call stack until we reach the base case. This 
exponential growth in space usage is inherent to the recursive nature of the algorithm.

## Code
```py
class Solution(object):
    def subsetXORSum(self, nums):
        """
        :type nums: List[int]
        :rtype: int
        """
        # Call helper function to compute XOR subset sum
        return self.helper(nums, 0, 0)
    
    def helper(self, nums, index, currentXOR):
        """
        A private helper function to calculate XOR subset sum.
        
        :type nums: List[int]
        :type index: int
        :type currentXOR: int
        :rtype: int
        """
        # Initialize sum
        sum = 0
        
        try:
            # Base case: If index is out of boundary, return the current XOR
            if index == len(nums):
                sum = currentXOR
            else:
                # Recursive case 1: Include the current element in the XOR and move to the next element
                include = self.helper(nums, index + 1, currentXOR ^ nums[index])

                # Recursive case 2: Exclude the current element from the XOR. Move to the next element
                # keeping the sum as is.
                exclude = self.helper(nums, index + 1, currentXOR)

                # Return the sum of both scenarios (including and excluding the current element)
                sum = include + exclude
        except Exception as e:
            # Log any exception occurred during the operation
            print("Caught exception:", e)
        
        # Return calculated XOR subset sum
        return sum

```