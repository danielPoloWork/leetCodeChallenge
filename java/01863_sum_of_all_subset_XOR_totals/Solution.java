/**
 * The XOR total of an array is defined as the bitwise XOR of all its elements, or 0 if the array is empty.
 * - For example, the XOR total of the array [2,5,6] is 2 XOR 5 XOR 6 = 1.
 *
 * Given an array nums, return the sum of all XOR totals for every subset of nums.
 *
 * > Note: Subsets with the same elements should be counted multiple times.
 *
 * An array a is a subset of an array b if a can be obtained from b by deleting some (possibly zero) elements of b.
 */
class Solution {
    /**
     * Function to compute the XOR subset sum for given numbers
     *
     * @param nums An array of integers.
     * @return int The XOR subset sum computed.
     */
    public int subsetXORSum(int[] nums) {
        // Call helper function to compute XOR subset sum
        return helper(nums, 0, 0);
    }

    /**
     * A private helper function to calculate XOR subset sum.
     *
     * @param nums An array of integers.
     * @param index The element index to consider for calculation.
     * @param currentXOR The XOR subset sum till this point.
     * @return int The total XOR subset sum calculated.
     */
    private int helper(int[] nums, int index, int currentXOR) {
        int sum = 0; // Initialize sum

        try {
            // Base case: If index is out of boundary, return the current XOR
            if (index == nums.length) {
                sum = currentXOR;
            } else {
                // Recursive case 1: Include the current element in the XOR and move to the next element
                int include = helper(nums, index + 1, currentXOR ^ nums[index]);

                // Recursive case 2: Exclude the current element from the XOR and move to the next element
                int exclude = helper(nums, index + 1, currentXOR);

                // Return the sum of both scenarios (including and excluding the current element)
                sum = include + exclude;
            }
        } catch (Exception e) {
            // Log any exception occurred during the operation
            System.out.println("Caught exception: " + e.getMessage());
        }
        // Return calculated XOR subset sum
        return sum;
    }
}