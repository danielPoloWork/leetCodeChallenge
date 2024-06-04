<?php
/**
 * Write a function that reverses a string. The input string is given as an array of characters s. You must do this by
 * modifying the input array in-place with O(1) extra memory.
 *
 * Constraints:
 * - 1 <= s.length <= 105
 * - s[i] is a printable ascii character.
 *
 * > Hint 1: The entire logic for reversing a string is based on using the opposite directional two-pointer approach!
 */

class Solution {

    /**
     * The function reverseString is used to reverse the order of elements in an array of strings.
     * The function takes an array by reference, meaning changes made in the function will be reflected in the original
     * array.
     *
     * This operation could also be performed by using the built-in PHP method `array_reverse`. The `array_reverse`
     * function in PHP returns a new array with elements in reverse order. It does not modify the original array unlike
     * this function. However, this function has been created for demonstration purposes, to understand the logic behind
     * array reversing.
     *
     * @param array $s The array of strings that needs to be reversed.
     * @return void The function does not return a value, it modifies the original array.
     */

    function reverseString(array &$s): void {
        try {
            $left  = 0;             // Initialize a pointer at the start of the array
            $right = count($s) - 1; // Initialize another pointer at the end of the array

            /**
             * Iterate until the two pointers meet in the middle.
             */
            while ($left < $right) {
                $temp      = $s[$left];  // Swap the elements at the left and right pointers. Store the value at the left pointer in a temporary variable
                $s[$left]  = $s[$right]; // Set the value at the left pointer as the value from the right pointer
                $s[$right] = $temp;      // Set the value at the right pointer as the temporary variable (original left value)

                $left++;  // Move the left pointer towards the middle of the array by incrementing it
                $right--; // Move the right pointer towards the middle of the array by decrementing it
            }
        } catch (Throwable $t) {
            /**
             * If any exception is thrown during the calculation, print the exception message.
             */
            print_r("Caught exception:  {$t->getMessage()} \n");
        }
    }
}

