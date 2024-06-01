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
public class Solution {

    /**
     * This method is used to calculate the score of a string.
     *
     * The score is computed by adding up the absolute difference between the ASCII values of consecutive characters in the string.
     *
     * @param s The input string.
     * @return The score of the string.
     * @throws Exception If any error occurs during the execution, an Exception will be thrown.
     */
    public int scoreOfString(String s) throws Exception {
        int output = 0; // Initialize the output variable to hold the final score.

        try {
            int sLength = s.length(); // Calculate the length of the string

            /** Iterate over the string up to the penultimate character. */
            for (int i = 0; i < (sLength - 1); i++) {
                int asciiValueFirst = s.charAt(i);     // Get ASCII value of the current character.
                int asciiValueNext  = s.charAt(i + 1); // Get ASCII value of the next character in the string.

                /** Calculate the absolute difference between the ASCII values of consecutive characters and add to the output. */
                output += Math.abs(asciiValueFirst - asciiValueNext);
            }
        } catch (Exception e) {
            /** If any exception is thrown during the calculation, print the exception message.*/
            System.out.println("Caught exception: " + e.getMessage());
            throw e;
        }

        return output; // Return the final score.
    }
}