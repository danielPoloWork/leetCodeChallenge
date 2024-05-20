#include <vector>

using namespace std;
/*
 * The XOR total of an array is defined as the bitwise XOR of all its elements, or 0 if the array is empty.
 * - For example, the XOR total of the array [2,5,6] is 2 XOR 5 XOR 6 = 1.
 * Given an array nums, return the sum of all XOR totals for every subset of nums.
 *
 * > Note: Subsets with the same elements should be counted multiple times.
 *
 * An array a is a subset of an array b if a can be obtained from b by deleting some (possibly zero) elements of b.
 */
class Solution {
public:
    /*
     * Begin the process of calculating the XOR of all possible subsets of 'nums'
     * @param nums an array of integers.
     * @return the XOR sum of all possible subsets of 'nums'.
     */
    int subsetXORSum(vector<int>& nums) {
        // Call helper function to compute XOR subset sum
        return helper(nums, 0, 0);
    }

private:
    /*
     * Calculate the XOR sum of all possible subsets of 'nums'.
     * @param nums an array of integers.
     * @param index the current index in 'nums' being evaluated.
     * @param currentXOR stores the XOR value of the current subset being evaluated.
     * @return the XOR sum of all possible subsets of 'nums' from the 'index' to the end of 'nums'.
     */
    int helper(vector<int>& nums, int index, int currentXOR) {
        int sum = 0; // Initialize sum

        try {
            // Return currentXOR once the index has exceeded the array size
            if (index == nums.size()) {
                sum = currentXOR;
            } else {
                // Include the current element in the XOR and move to the next element
                int include = helper(nums, index + 1, currentXOR ^ nums[index]);

                // Exclude the current element from the XOR and move to the next element
                int exclude = helper(nums, index + 1, currentXOR);

                // Return the sum of both scenarios (including and excluding current element)
                sum = include + exclude;
            }
        } catch (const std::exception& e) {
            // Log any exception occurred during the operation
            std::cout << "Caught exception: " << e.what() << std::endl;
        }
        // Return calculated XOR subset sum
        return sum;
    }
};