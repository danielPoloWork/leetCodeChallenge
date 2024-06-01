/**
 * You are given a string s. The score of a string is defined as the sum of the absolute difference between the ASCII
 * values of adjacent characters. Return the score of s.
 *
 * Constraints:
 * - 2 <= s.length <= 100
 * - s consists only of lowercase English letters.
 *
 * > Hint 1: Sum the difference between all the adjacent characters by just taking the absolute difference of their
 * > ASCII values.
 */

/**
 * Given code from leetcode.
 *
 * @param {string} s
 * @return {number}
 */
function scoreOfString(s: string): number {
    return Solution.getScore(s);
};

class Solution {
    /**
     * This function is used to calculate the score of a string.
     *
     * The score is computed by adding up the absolute difference between the ASCII values of consecutive characters in the string.
     *
     * @param {string} s - The input string.
     * @return {number} The score of the string.
     * @throws Error If any error occurs during the execution, an Error will be thrown.
     */
    public static getScore(s: string): number {
        let output = 0; // Initialize the output variable to hold the final score.

        try {
            const sLength = s.length; // Calculate the length of the string

            /** Iterate over the string up to the penultimate character. */
            for (let i = 0; i < (sLength - 1); i++) {
                const asciiValueFirst = s.charCodeAt(i); // Get ASCII value of the current character.
                const asciiValueNext  = s.charCodeAt(i + 1); // Get ASCII value of the next character in the string.

                /** Calculate the absolute difference between the ASCII values of consecutive characters and add to the output.*/
                output += Math.abs(asciiValueFirst - asciiValueNext);
            }
        } catch (e: any) {
            /** If any exception is thrown during the calculation, log the exception message.*/
            console.error(`Caught exception: ${e.message}`);
        }

        return output; // Return the final score.
    }
}