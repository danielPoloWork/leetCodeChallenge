/**
 * Write a function that reverses a string. The input string is given as an array of characters s. You must do this by
 * modifying the input array in-place with O(1) extra memory.
 *
 * Constraints:
 * - 1 <= s.length <= 105
 * - s[i] is a printable ascii character.
 *
 * Hint 1: The entire logic for reversing a string is based on using the opposite directional two-pointer approach!
 */

/**
 * @param {string[]} s
 * @return {void} Do not return anything, modify s in-place instead.
 */
let reverseString = function(s) {
    Solution.setReversed(s);
};

class Solution {
    /**
     * The function reverseString is used to reverse the order of elements in an array of strings.
     * The function takes an array by reference, meaning changes made in the function will be reflected in the original
     * array.
     *
     * This operation could also be performed by using the built-in JavaScript method `Array.prototype.reverse()`. The
     * `Array.prototype.reverse()` method in JavaScript reverses an array in-place, meaning it directly modifies the
     * original array and doesn't create any intermediate arrays or lists. It directly iterates over the first half of
     * the sequence and swaps the element with the corresponding element from the end of the sequence, for all elements
     * in the first half.
     *
     * <pre>
     * s.reverse();
     * </pre>
     *
     * > Note that `Array.prototype.reverse()` method manipulates the array on which it's used.
     *
     * @param {Array} s - The array of strings that needs to be reversed.
     */
    static setReversed(s) {
        try {
            let left  = 0;            // Initialize a pointer at the start of the array
            let right = s.length - 1; // Initialize another pointer at the end of the array

            /** Iterate until the two pointers meet in the middle. */
            while (left < right) {
                let temp = s[left];  // Swap the elements at the left and right pointers. Store the value at the left pointer in a temporary variable
                s[left]  = s[right]; // Set the value at the left pointer as the value from the right pointer
                s[right] = temp;     // Set the value at the right pointer as the temporary variable (original left value)

                left++;  // Move the left pointer towards the middle of the array by incrementing it
                right--; // Move the right pointer towards the middle of the array by decrementing it
            }
        } catch (e) {
            /** If any exception is thrown during the calculation, log the exception message.*/
            console.error(`Caught exception: ${e.message}`);
        }
    }
}