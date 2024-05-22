# 131 Palindrome partitioning
#Description at [leetcode.com](https://leetcode.com/problems/subsets/description/)

## Intuition
When tackling the problem of partitioning a string such that every substring is a palindrome, the key insight is to use
backtracking. The idea is to explore all possible ways to partition the string and check each substring to see if it is 
a palindrome. If a substring is a palindrome, we can consider it as a part of the current partition and continue 
exploring the remaining part of the string.

## Approach
1. Backtracking:

We use a recursive approach to generate all possible partitions of the string. At each step, we consider substrings 
starting from the current position and check if they are palindromes.

2. Palindrome check:

For each substring, we have a helper function to check if it is a palindrome by comparing characters from both ends 
towards the center.

3. Recursive exploration:

If a substring is a palindrome, we include it in the current path and recursively explore the remaining substring 
starting from the next position.

4. Backtrack:

After exploring all possible partitions starting from the current position, we backtrack by removing the last substring 
added to the path and continue with the next possible partition.

## Complexity
- Time complexity:

The time complexity is 𝑂(n⋅2^n), where n is the length of the string. This accounts for generating all possible 
partitions and checking each partition for palindromes.

- Space complexity:

The space complexity is 𝑂(n) due to the recursion stack and the storage required for the current path of partitions.

## Code
```php
class Solution {
    
    function partition(string $string): array {
        $output = [];
        $this->backtrack($string, 0, [], $output);
        return $output;
    }

    private function backtrack(string $string, int $start, array $path, array &$result): void {
        if ($start == strlen($string)) {
            $result[] = $path;
            return;
        }

        for ($end = $start; $end < strlen($string); $end++) {
            if ($this->isPalindrome($string, $start, $end)) {
                $path[] = substr($string, $start, $end - $start + 1);
                $this->backtrack($string, $end + 1, $path, $result);
                array_pop($path);
            }
        }
    }

    private function isPalindrome($string, $start, $end): bool {
        while ($start < $end) {
            if ($string[$start] !== $string[$end]) {
                return false;
            }
            $start++;
            $end--;
        }
        return true;
    }
}
```