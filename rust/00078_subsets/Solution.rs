/// Given an integer array nums of unique elements, return all possible subsets (the power set).
/// The solution set must not contain duplicate subsets. Return the solution in any order.
///
/// Solution struct that provides a method for getting subsets
/// This struct is utilized to organize methods and should
/// be instantiated to run the subsets method.
pub struct Solution {}

impl Solution {
    /// Get all the possible subsets of an integer array.
    ///
    /// This method accepts a vector of i32 and returns a
    /// vector of vectors containing all subset combinations.
    ///
    /// # Arguments
    ///
    /// * `nums`: A vector of i32 integers.
    ///
    /// # Returns
    ///
    /// A vector of vectors with all subset combinations.
    ///
    /// # Examples
    ///
    /// ```
    /// let sol = Solution::new();
    /// let nums = vec![1,2,3];
    /// let subsets = sol.subsets(nums);
    /// ```
    pub fn subsets(nums: Vec<i32>) -> Vec<Vec<i32>> {

        // Initialize our output, this vector will hold all our subsets
        let mut output: Vec<Vec<i32>> = Vec::new();

        // Variable to hold the size of nums vector
        let num_size = nums.len();

        // There are 2^n subsets possible for n numbers
        let num_subset = 1 << num_size;

        // Iterate from 0 to 2^n
        for i in 0..num_subset {

            // Create a new temporary set for each i
            let mut temp: Vec<i32> = Vec::new();

            // Create the subset corresponding to the binary
            // representation of the current number i.
            // If the jth digit of i from the right is 1 then
            // include the jth number from the set in subset.
            for j in 0..num_size {

                // Using binary AND operator to check if jth bit is 1
                if (i >> j) & 1 == 1 {

                    // If the jth bit is 1, we include nums[j] in our subset
                    temp.push(nums[j]);
                }
            }

            // Push the created temp subset to the output
            output.push(temp);
        }

        // Return all the subsets
        output
    }
}