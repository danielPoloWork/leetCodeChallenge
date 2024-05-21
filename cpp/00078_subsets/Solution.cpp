#include <vector>
#include <cmath>

/**
 * Given an integer array nums of unique elements, return all possible subsets (the power set).
 * The solution set must not contain duplicate subsets. Return the solution in any order.
 *
 * @class Solution
 * @brief A class that implements functionality to generate all possible subsets from a set of integers.
 */
class Solution {
public:
    /**
     * @brief This function generates all possible subsets from a set of integers.
     *
     * @param nums The original set of integers for which subsets are to be found.
     * @return A vector of vectors where each vector represents a subset of the input vector.
     *
     * The function utilizes bit manipulation to generate the subsets.
     * Each subset is represented by a binary number where a bit being set (1) means the corresponding number is included in the subset,
     * and the bit being unset (0) meaning it's not included in the subset.
     * Therefore, the total number of subsets is equal to 2^n where n is the size of the input set.
     */
    std::vector<std::vector<int>> subsets(std::vector<int>& nums) {
        std::vector<std::vector<int>> output; // A vector to store all the subsets
        int numSize = nums.size(); // Size of the input set
        int numSubset = std::pow(2, numSize); // Number of subsets

        // Loop over the range of total possible subsets
        for (int i = 0; i < numSubset; i++) {
            std::vector<int> temp; // Vector to hold the current subset

            // Loop over the range of input set
            for (int j = 0; j < numSize; j++) {
                // If the bit in the current subset is set add the corresponding number to the subset
                if ((i >> j) & 1) {
                    temp.push_back(nums[j]);
                }
            }
            output.push_back(temp); // Add the subset to the output
        }
        return output; // Return the output
    }
};