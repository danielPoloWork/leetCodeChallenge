<?php

/**
 * Given an integer array nums of unique elements, return all possible subsets (the power set).
 * The solution set must not contain duplicate subsets. Return the solution in any order.
 *
 * Constraints:
 * - 1 <= nums.length <= 10
 * - -10 <= nums[i] <= 10
 * - All the numbers of nums are unique.
 */
class Solution {
    /**
     * This function calculates all possible subsets of an array.
     *
     * The try-catch block is used to handle exceptions that might be thrown during the execution of the code. Under
     * normal circumstances, when an exception is thrown and not caught, the PHP engine will halt script execution. So,
     * a try-catch block essentially says "try to execute this code, and if any exceptions are thrown that we haven't
     * specifically guarded against, catch them here and continue executing."
     *
     * While this is good practice and can prevent your program from stopping in the event of an error, it comes with a
     * performance cost. When the PHP interpreter encounters a try-catch block, it sets up an internal structure to
     * track the execution of the code inside the block. If an exception is thrown, it has to unwind this structure to
     * pass control to the appropriate catch block.
     *
     * This extra level of management by the interpreter causes try-catch blocks to be slower than equivalent code
     * without try-catch. However, the performance difference is generally negligible and would only be noticeable in a
     * tight loop where a try-catch block is being set up and torn down millions of times.
     *
     * In conclusion, if you are sure that no exceptions will be thrown during the execution of your code, or you are
     * willing to risk a fatal error in the event of an exception, you can get slightly better performance by omitting
     * the try-catch block. However, for robust and secure code, it is generally recommended to handle exceptions
     * appropriately.
     *
     * @param array $nums Original array to find subsets for.
     * @return array Array of all subsets.
     * @throws Throwable Thrown when any error occurs during the operation.
     */
    function subsets(array $nums): array {
        $output = []; // Output array will hold all the subsets.

        try {
            // Get the number of elements in the input array.
            $numSize = sizeof($nums);
            // Calculate the number of subsets. It's always 2^n where n is the size of the original array.
            $numSubset = 2**$numSize;

            // Iterate over all possible subsets.
            for($i = 0; $i < $numSubset; $i++){
                // Temp array will hold the current subset.
                $temp = [];

                // For each number in $nums, determine if it should be in the current subset ($i).
                for($j = 0; $j < $numSize; $j++) {
                    // If the j'th bit of i is 1, include $nums[$j] in this subset.
                    if (($i >> $j) & 1) {
                        $temp[] = $nums[$j];
                    }
                }
                // Add this subset to the $output array.
                $output[] = $temp;
            }
        } catch (Throwable $t) {
            // Log any exceptions that occur during the operation.
            print_r("Caught exception:  {$t->getMessage()} \n");
        }


        return $output; // Return the computed subsets.
    }
}