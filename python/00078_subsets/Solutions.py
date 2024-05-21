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