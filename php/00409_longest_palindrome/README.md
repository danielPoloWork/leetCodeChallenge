# 409. Longest palindrome
#Description at [leetcode.com](https://leetcode.com/problems/longest-palindrome/description/)

# Intuition
My initial thought was to focus on character frequencies. Palindromes have a symmetrical structure around a center. 
Therefore, characters that appear an even number of times can perfectly contribute to this symmetry. Characters with odd 
frequencies can contribute all but one of their occurrences to maintain symmetry, while one odd character can be placed 
at the center if needed.

# Approach
1. Initialize Variables: An output variable to store the length of the longest palindrome. A freq array to count 
   occurrences of each character, using the ASCII values of characters for indexing.
2. Count Character Frequencies: Iterate through the string, converting each character to its ASCII value and 
   incrementing its count in the freq array. For each character, if its count becomes even, it means we can form pairs 
   with those characters, contributing 2 to the palindrome length (output).
3. Adjust for Odd Counts: After processing all characters, check if there were any characters left unpaired (i.e., 
   characters with odd counts). If there are, we can place one such character in the center of the palindrome, 
   increasing the length by 1.
4. Return the Result: Return the calculated palindrome length, adding 1 if there is at least one unpaired character.

This method efficiently counts characters and calculates the palindrome length in a single pass through the string.

# Complexity
- Time complexity:

The time complexity is 𝑂(𝑛), where 𝑛 is the length of the string. We traverse the string once to count frequencies and 
calculate the palindrome length.

- Space complexity:

The space complexity is 𝑂(1) because the freq array size is fixed (128 elements for all ASCII characters), regardless 
of the input size.

# Code
```php
class Solution {
    function longestPalindrome(string $s): int {
        $output = 0;
        $freq = array_fill(0, 128, 0);
        for ($i = 0, $len = strlen($s); $i < $len; $i++) {
            $char = ord($s[$i]);
            $freq[$char]++;
            if ($freq[$char] % 2 == 0) {
                $output += 2;
            }
        }
        return $len > $output ? $output + 1 : $output;
    }
}
```