# The XOR total of an array is defined as the bitwise XOR of all its elements, or 0 if the array is empty.
# - For example, the XOR total of the array [2,5,6] is 2 XOR 5 XOR 6 = 1.
# Given an array nums, return the sum of all XOR totals for every subset of nums.
#
# Note: Subsets with the same elements should be counted multiple times.
#
# An array a is a subset of an array b if a can be obtained from b by deleting some (possibly zero) elements of b.

class Solution(object):
    """
    :type nums: List[int]
    :rtype: int
    """
    def subsetXORSum(self, nums):
        return self.helper(nums, 0, 0) # Call helper function to compute XOR subset sum

    """
    A private helper function to calculate XOR subset sum.

    :type nums: List[int]
    :type index: int
    :type currentXOR: int
    :rtype: int
    """
    def helper(self, nums, index, currentXOR):
        sum = 0 # Initialize sum

        try:
            """ Base case: If index is out of boundary, return the current XOR """
            if index == len(nums):
                sum = currentXOR
            else:
                include = self.helper(nums, index + 1, currentXOR ^ nums[index]) # Recursive case 1: Include the current element in the XOR and move to the next element
                exclude = self.helper(nums, index + 1, currentXOR)               # Recursive case 2: Exclude the current element from the XOR. Move to the next element, keeping the sum as is.
                sum     = include + exclude                                      # Return the sum of both scenarios (including and excluding the current element)
        except Exception as e:
            """ If any exception is thrown during the calculation, print the exception message. """
            print(f"Caught exception: {str(e)}", file=sys.stderr)

        return sum # Return calculated XOR subset sum
