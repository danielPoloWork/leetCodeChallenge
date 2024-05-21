import java.util.ArrayList;
import java.util.List;
/**
 * Given an integer array nums of unique elements, return all possible subsets (the power set). The solution set must
 * not contain duplicate subsets. Return the solution in any order.
 */
class Solution {

    /**
     * Generate all possible subsets of numbers from a given set of integers.
     *
     * The function, subsets(), uses the concept of bit manipulation
     * to generate possible subsets.
     *
     * For every integer 'i' from 0 to 2^n, it treats the binary representation of 'i'
     * as a mask for whether to include a number in the subset. Since there are 2^n possible
     * subsets of a set with 'n' numbers, the function goes from 0 to 2^n
     * (exclusive) to generate all subsets.
     *
     * If the jth bit of 'i' is set, it means the jth number of the set is included
     * in the subset, and if it's not set, then the jth number is not in the subset.
     *
     * @param nums:  Array containing the original set of integers.
     * @return The list of all possible subsets. Each subset is represented as a List of Integers.
     */
    public List<List<Integer>> subsets(int[] nums) {
        List<List<Integer>> output = new ArrayList<>();
        int numSize = nums.length;
        int numSubset = 1 << numSize; // Equivalent to 2^numSize

        // Iterate over all potential subsets
        for (int i = 0; i < numSubset; i++) {
            List<Integer> temp = new ArrayList<>();

            // Check each bit from the current mask
            for (int j = 0; j < numSize; j++) {
                // If the bit is set, add the number corresponding to the bit to the subset
                if ((i >> j & 1) == 1) {
                    temp.add(nums[j]);
                }
            }
            output.add(temp); // Add the current subset to the output
        }
        return output; // Return all subsets
    }
}