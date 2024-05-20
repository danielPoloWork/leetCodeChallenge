<?php

/**
 * The XOR total of an array is defined as the bitwise XOR of all its elements, or 0 if the array is empty.
 * - For example, the XOR total of the array [2,5,6] is 2 XOR 5 XOR 6 = 1.
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
     * @param array $nums An array of integers.
     * @return int The XOR subset sum computed.
     */
    function subsetXORSum(array $nums): int {
        /** Call helper function to compute XOR subset sum */
        return $this->helper($nums, 0, 0);
    }

    /**
     * A private helper function to calculate XOR subset sum.
     *
     * @param array $nums An array of integers.
     * @param int $index The element index to consider for calculation.
     * @param int $currentXOR The XOR subset sum till this point.
     * @return int The total XOR subset sum calculated.
     */
    private function helper(array $nums, int $index, int $currentXOR): int {
        $sum = 0; // Initialize sum

        try {
            /** Base case: If index is out of boundary, return the current XOR */
            if ($index == count($nums)) {
                $sum = $currentXOR;
            }

            /** Recursive case 1: Include the current element in the XOR Move to next element */
            $include = $this->helper($nums, $index + 1, $currentXOR ^ $nums[$index]);

            /** Recursive case 2: Exclude the current element from the XOR. Move to the next element
             * keeping the sum as is.
             */
            $exclude = $this->helper($nums, $index + 1, $currentXOR);

            /** Return the sum of both scenarios (including and excluding the current element) */
            $sum = $include + $exclude;
        } catch (Throwable $t) {
            /** Log any exception occurred during the operation */
            print_r("Caught exception:  {$t->getMessage()} \n");
        }
        /** Return calculated XOR subset sum */
        return $sum;
    }
}