# 3110. Score of a string
#Description at [leetcode.com](https://leetcode.com/problems/score-of-a-string/description/)

## Intuition
The problem requires calculating the score of a string, which is defined as the sum of the absolute differences between the ASCII values of adjacent characters. My first thought is to iterate through the string, compute the ASCII values of each character and its neighbor, then sum the absolute differences.

## Approach
1. Initialize a variable output to store the cumulative score.
2. Calculate the length of the string (sLength).
3. Use a for loop to iterate through the string from the first character to the second last character.
    - For each character, compute its ASCII value and the ASCII value of the next character using s.charAt(i) and s.charAt(i + 1).
    - Calculate the absolute difference between these two values using Math.abs.
    - Add this difference to output.
4. After the loop completes, return the output.

## Complexity
- Time complexity:

The time complexity is 𝑂(𝑛), where 𝑛 is the length of the string. This is because we iterate through the string once.

- Space complexity:

The space complexity is 𝑂(1). We use a fixed amount of extra space regardless of the input size.

## Code
```java
class Solution {
    public int scoreOfString(String s) {
        int output  = 0;
        int sLength = s.length(); 

        for (int i = 0; i < (sLength - 1); i++) {
            int asciiValueFirst = s.charAt(i);     
            int asciiValueNext  = s.charAt(i + 1); 

            output += Math.abs(asciiValueFirst - asciiValueNext);
                      
        } 

        return output; 
    }
}
```