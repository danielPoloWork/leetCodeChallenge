# The XOR total of an array is defined as the bitwise XOR of all its elements, or 0 if the array is empty.
# - For example, the XOR total of the array [2,5,6] is 2 XOR 5 XOR 6 = 1.
# Given an array nums, return the sum of all XOR totals for every subset of nums.
#
# Note: Subsets with the same elements should be counted multiple times.
#
# An array a is a subset of an array b if a can be obtained from b by deleting some (possibly zero) elements of b.

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
