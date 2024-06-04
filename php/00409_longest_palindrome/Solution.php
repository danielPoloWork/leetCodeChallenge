<?php
/**
 * Given a string s which consists of lowercase or uppercase letters, return the length of the longest palindrome that
 * can be built with those letters. Letters are case-sensitive, for example, "Aa" is not considered a palindrome.
 *
 * Constraints:
 * - 1 <= s.length <= 2000
 * - s consists of lowercase and/or uppercase English letters only.
 *
 * Class Solution contains a method used to determine the longest possible length of palindrome that can be built from
 * a given string. It analyses the frequency of characters in the provided string and maximizes the palindrome length
 * by using characters having even frequency entirely and those with odd as even with an extra opportunity to use an
 * odd frequency character.
 */
class Solution {
    /**
     * Function longestPalindrome takes a string as input, and calculates the maximum possible length of a
     * palindrome that can be built with characters from the provided string.
     *
     * This function achieves its goal using a single-pass algorithm. Firstly, it initializes an array
     * $freq to keep track of the frequency of each ASCII character in the input string. It then loops
     * through every character in the string. For each character, it increments its corresponding frequency
     * count in array $freq. Whenever a character frequency becomes even, it implies that we have found a
     * pair of characters which can be placed symmetrically in the palindrome, so we increment $output (length
     * of palindrome) by 2.
     *
     * After this single pass, if the length of the input string is greater than our calculated palindrome
     * length, it means that we have at least one character with an odd frequency (spare character). A
     * palindrome can have exactly one character with an odd count (at the middle), so we increment the
     * palindrome length by 1.
     *
     * @param String $s The input string for which to find the maximum possible palindrome length.
     * @return Integer The function returns the maximum possible length of a palindrome.
     */
    function longestPalindrome(string $s): int {
        $output = 0; // Initialize the output variable to 0. This will store the final length of the longest possible palindrome.

        try {
            /** Initialize array $freq with 128 elements (for all ASCII characters) all being 0. This represents the
             * initial frequency counts of each character present in the string.
             */
            $freq = array_fill(0, 128, 0);

            /**
             * Traverse through each character in the string.
             */
            for ($i = 0, $len = strlen($s); $i < $len; $i++) {
                $char = ord($s[$i]); // Get ASCII value of the character.
                $freq[$char]++;      // Increment the frequency of the character in the frequency array.

                /** If the frequency of the character has become even after the increment, that means we have even count
                 * of the character, and they can fully contribute to palindrome.
                 */
                if ($freq[$char] % 2 == 0) {
                    $output += 2; // So, we add 2 (for the pair of characters) to output.
                }
            }

            /**
             * If the length of input string is greater than calculated palindrome length, increment output by 1
             * because we can add a character with odd frequency count in the middle of palindrome.
             */
            $output = $len > $output ? $output + 1 : $output;

        } catch (Throwable $t) {
            /** If any exception is thrown during the calculation, print the exception message.*/
            print_r("Caught exception:  {$t->getMessage()} \n");
        }

        return $output; // Return the length of the longest possible palindrome.
    }
}