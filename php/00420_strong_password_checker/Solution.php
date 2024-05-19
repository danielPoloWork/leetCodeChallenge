<?php

/**
 * A password is considered strong if the below conditions are all met:
 * - It has at least 6 characters and at most 20 characters.
 * - It contains at least one lowercase letter, at least one uppercase letter, and at least one digit.
 * - It does not contain three repeating characters in a row (i.e., "Baaabb0" is weak, but "Baaba0" is strong).
 *
 * Given a string password, return the minimum number of steps required to make password strong. if password is already strong, return 0.
 *
 * In one step, you can:
 * - Insert one character to password,
 * - Delete one character from password, or
 * - Replace one character of password with another character.
 */
class Solution {
    /**
     * Checks the security of a password string and determines the minimal number
     * of insert/remove/replace operations required to make the password secure.
     *
     * A secure password fulfills the following conditions:
     * - Contains at least one lowercase character
     * - Contains at least one uppercase character
     * - Contains at least one numeric digit
     * - Has a length of at least 6 characters
     * - Has a length of no more than 20 characters
     * - Does not contain three identical characters in sequence
     *
     * The provided password string can have any length and is not guaranteed to
     * be initially safe. If necessary, characters are to be replaced first, then
     * excessive characters are to be deleted, and finally characters should be added
     * to meet the minimum length requirement.
     *
     * If an error occurs during the execution, a simple error message will be output
     * without changing the program flow.
     *
     * @param string $pwd The password string to examine and modify
     * @return int The minimum amount of changes required to achieve a secure password
     * @throws Throwable If any type of error occurs during execution
     */
    function strongPasswordChecker(string $pwd): int {
        $output = 0;

        try {
            $pwdLength = strlen($pwd);                       // Length of the password
            $hasLower  = preg_match('/[a-z]/', $pwd); // Check if password includes lowercase letters
            $hasUpper  = preg_match('/[A-Z]/', $pwd); // Check if password includes uppercase letters
            $hasDigit  = preg_match('/[0-9]/', $pwd); // Check if password includes digits

            // Calculate how many types of characters (lower, upper, digit) the password is missing
            $missingTypes = 3 - ($hasLower + $hasUpper + $hasDigit);

            $replace = 0;
            $oneMod  = 0;
            $twoMod  = 0;

            // Iterate through the password
            for ($i = 2; $i < $pwdLength;) {
                // Check if the password contains 3 identical characters in a row
                if ($pwd[$i] == $pwd[$i - 1] && $pwd[$i] == $pwd[$i - 2]) {
                    $length = 2;

                    // Increase the length while identical characters re-occur
                    while ($i < $pwdLength && $pwd[$i] == $pwd[$i - 1]) {
                        $length++;
                        $i++;
                    }

                    // Increase the replacement count by how many times a character needs to be replaced
                    $replace += floor($length / 3);

                    // Calculate how many replacements need to be made based off $length modulus
                    if ($length % 3 == 0) {
                        $oneMod++;
                    } elseif ($length % 3 == 1) {
                        $twoMod++;
                    }
                } else {
                    $i++;
                }
            }
            // Check if password is shorter than 6 characters
            if ($pwdLength < 6) {
                $output = max($missingTypes, 6 - $pwdLength);
            }
            // Check if password length is acceptable
            elseif ($pwdLength <= 20) {
                $output = max($missingTypes, $replace);
            }
            // If password is more than 20 characters
            else {
                $delete = $pwdLength - 20;
                $replace -= min($delete, $oneMod) / 1;
                $replace -= floor(min(max($delete - $oneMod, 0), $twoMod * 2) / 2);
                $replace -= floor(max($delete - $oneMod - 2 * $twoMod, 0) / 3);
                // Add the number of deletions and the maximum of missingTypes and replace to the output
                $output = $delete + max($missingTypes, $replace);
            }
        } catch (Throwable $t) {
            /** If there's any exception, print it out */
            print_r("Caught exception:  {$t->getMessage()} \n");
        }

        return $output;
    }
}
