# 420. Strong password checker
#Description at [leetcode.com](https://leetcode.com/problems/strong-password-checker/description/)

## Intuition
The problem requires transforming a given password to meet certain strength criteria. The criteria include length 
constraints, character type requirements, and restrictions on consecutive repeating characters. To solve this, we need 
to evaluate the current state of the password, identify deficiencies, and apply the minimum number of insertions, 
deletions, or replacements to make the password strong.

## Approach
1. Initial checks:

Determine the length of the password. If it's shorter than 6 characters or longer than 20 characters, we need to add or 
remove characters, respectively.

2. Character type checks:

Check for the presence of at least one lowercase letter, one uppercase letter, and one digit.

3. Repeating characters:

Identify sequences of three or more repeating characters and count how many replacements are needed to break them up.

4. Operations:

Calculate the number of insertions needed to reach the minimum length of 6. Calculate the number of deletions needed to 
reduce the length to 20. Use deletions to optimize the breaking up of repeating characters. Ensure all character type 
requirements are met and replace characters in sequences of three or more repeating characters.

5. Calculate steps:

The total steps are the sum of the required insertions, deletions, and replacements.

## Complexity
- Time complexity:

Checking character types and iterating over the password to find sequences of repeating characters both take 𝑂(𝑛) time, 
where 𝑛 is the length of the password. Overall, the time complexity is 𝑂(𝑛).

- Space complexity:

The space used is constant, 𝑂(1), as we only use a fixed amount of additional space for variables regardless of the 
input size.

## Code
```php
class Solution {

    function strongPasswordChecker(string $pwd): int {
        $output = 0;

        try {
            $pwdLength = strlen($pwd);                       
            $hasLower  = preg_match('/[a-z]/', $pwd); 
            $hasUpper  = preg_match('/[A-Z]/', $pwd); 
            $hasDigit  = preg_match('/[0-9]/', $pwd); 
            
            $missingTypes = 3 - ($hasLower + $hasUpper + $hasDigit);

            $replace = 0;
            $oneMod = 0;
            $twoMod = 0;

            for ($i = 2; $i < $pwdLength;) {
                if ($pwd[$i] == $pwd[$i - 1] && $pwd[$i] == $pwd[$i - 2]) {
                    $length = 2;
                    
                    while ($i < $pwdLength && $pwd[$i] == $pwd[$i - 1]) {
                        $length++;
                        $i++;
                    }
                    
                    $replace += floor($length / 3);
                    
                    if ($length % 3 == 0) {
                        $oneMod++;
                    } elseif ($length % 3 == 1) {
                        $twoMod++;
                    }
                } else {
                    $i++;
                }
            }
            if ($pwdLength < 6) {
                $output = max($missingTypes, 6 - $pwdLength);
            } elseif ($pwdLength <= 20) {
                $output = max($missingTypes, $replace);
            } else {
                $delete = $pwdLength - 20;
                $replace -= min($delete, $oneMod) / 1;
                $replace -= floor(min(max($delete - $oneMod, 0), $twoMod * 2) / 2);
                $replace -= floor(max($delete - $oneMod - 2 * $twoMod, 0) / 3);
                
                $output = $delete + max($missingTypes, $replace);
            }
        } catch (Throwable $t) {
            print_r("Caught exception:  {$t->getMessage()} \n");
        }

        return $output;
    }
}
```