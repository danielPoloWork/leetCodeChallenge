<?php
class Solution {

    /**
     * This function is used to calculate the score of a string.
     *
     * The score is computed by adding up the absolute difference between the ASCII values of consecutive characters in the string.
     *
     * @param string $s The input string.
     * @return int The score of the string.
     * @throws Throwable If any error occurs during the execution, a Throwable will be thrown.
     */
    function scoreOfString(string $s): int {
        $output = 0; // Initialize the output variable to hold the final score.

        try {
            $sLength = strlen($s); // Calculate the length of the string

            /** Iterate over the string up to the penultimate character. */
            for ($i = 0; $i < ($sLength - 1); $i++) {
                $asciiValueFirst = ord($s[$i]);     // Get ASCII value of the current character.
                $asciiValueNext  = ord($s[$i + 1]); // Get ASCII value of the next character in the string.

                /** Calculate the absolute difference between the ASCII values of consecutive characters and add to the output.*/
                $output += abs($asciiValueFirst - $asciiValueNext);
            }
        } catch (Throwable $t) {
            /** If any exception is thrown during the calculation, print the exception message.*/
            print_r("Caught exception:  {$t->getMessage()} \n");
        }

        return $output; // Return the final score.
    }
}