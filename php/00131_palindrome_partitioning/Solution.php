<?php

/**
 * Given a string s, partition s such that every substring of the partition is a palindrome. Return all possible
 * palindrome partitioning of s.
 */
class Solution {

    /**
     * Partitions the input string into all possible palindrome substrings.
     *
     * @param string $string The input string.
     *
     * @return array 2D-array with all possible palindrome partitioning of the string.
     */
    public function partition(string $string): array {
        $output = [];

        // Begin the recursion for partitioning and checking for palindromes.
        $this->backtrack($string, 0, [], $output);

        return $output;
    }

    /**
     * Helper method to recursively partition the string and check for palindromes.
     *
     * @param string $string  The input string.
     * @param int    $start   The starting index of the substring.
     * @param array  $path    The current palindrome sequence.
     * @param array  $result  The result of all possible palindrome partitioning.
     *
     * @return void
     */
    private function backtrack(string $string, int $start, array $path, array &$result): void {
        // All characters have been used.
        if ($start == strlen($string)) {
            // Save this partitioning as a potential result.
            $result[] = $path;
            return;
        }

        // Start checking all substrings.
        for ($end = $start; $end < strlen($string); $end++) {
            // If a substring is a palindrome.
            if ($this->isPalindrome($string, $start, $end)) {
                // Store this palindrome
                $path[] = substr($string, $start, $end - $start + 1);

                // Check the remaining string for palindromes.
                $this->backtrack($string, $end + 1, $path, $result);

                // Undo the last step, as this is a recursive function and we want to store all possible results.
                array_pop($path);
            }
        }
    }

    /**
     * Helper method to check if a substring is a palindrome.
     *
     * @param string $string The substring.
     * @param int    $start  The starting index of the substring.
     * @param int    $end    The ending index of the substring.
     *
     * @return bool True if the substring is a palindrome, false otherwise.
     */
    private function isPalindrome(string $string, int $start, int $end): bool {
        // Use two pointers method to check if it's a palindrome.
        while ($start < $end) {
            if ($string[$start] !== $string[$end]) {
                // It's not a palindrome.
                return false;
            }
            // Continue with the next pair of characters.
            $start++;
            $end--;
        }
        // We went through all relevant characters and it's still a potentially palindrome, so we confirm it.
        return true;
    }
}