<?php

/**
 * You are given two strings s and t consisting of only lowercase English letters. Return the minimum number of
 * characters that need to be appended to the end of s so that t becomes a subsequence of s. A subsequence is a string
 * that can be derived from another string by deleting some or no characters without changing the order of the remaining
 * characters.
 *
 * Constraints:
 * - 1 <= s.length, t.length <= 10^5
 * - s and t consist only of lowercase English letters.
 *
 * > Hint 1: Find the longest prefix of t that is a subsequence of s.
 * >
 * > Hint 2: Use two variables to keep track of your location in s and t. If the characters match, increment both
 * > variables. Otherwise, only increment the variable for s.
 * >
 * > Hint 3: The remaining characters in t must be appended to the end of s.
 */
class Solution {
    /**
     * The function appendCharacters compares two strings character by character from the beginning.
     * For each comparison, pointers in both strings advance one step ahead. However, the pointer in string $t only
     * progresses if the characters at the current positions of the strings match.
     *
     * At the end, the function calculates and returns the difference between the length of string $t and the final
     * position of the pointer in string $t, which represents the number of characters that need to be appended to string
     * $s to make it the same as string $t.
     *
     * @param string $s The original string that needs to be extended.
     * @param string $t The target string that $s needs to become.
     * @return int The number of characters to append to $s to reach a value equal to $t.
     */
    function appendCharacters(string $s, string $t): int {
        $output = 0;

        try {
            $i       = 0;          // Initialize a pointer at the start of string $s
            $j       = 0;          // Initialize another pointer at the start of string $t
            $sLength = strlen($s); // Get the length of string $s and store it in variable $sLength
            $tLength = strlen($t); // Get the length of string $t and store it in variable $tLength

            /** Iterate until the ends of either string are reached */
            while ($i < $sLength && $j < $tLength) {

                /** If characters at the current positions of both strings match, advance the pointer in string $t */
                if ($s[$i] === $t[$j]) {
                    $j++;
                }

                $i++;
            }

            $output = $tLength - $j; // Calculate the number of characters required to append to string $s to reach string $t
        } catch (Throwable $t) {
            /** If any exception is thrown during the operation, print the exception message. */
            print_r("Caught exception:  {$t->getMessage()} \n");
        }

        return $output;
    }
}