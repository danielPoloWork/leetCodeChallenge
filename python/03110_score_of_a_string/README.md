# 3110. Score of a string
#Description at [leetcode.com](https://leetcode.com/problems/score-of-a-string/description/)

## Intuition
The problem requires calculating the score of a string, which is defined as the sum of the absolute differences between 
the ASCII values of adjacent characters. My first thought is to iterate through the string, compute the ASCII values of 
each character and its neighbor, then sum the absolute differences.

## Approach
1. Initialize the output variable: Create a variable output to store the cumulative score.
2. Get the length of the string: Store the length of the string s in s_length.
3. Iterate through the string: Use a for loop to iterate through the string from the first character to the second last 
   character.
    - For each character, compute its ASCII value using ord(s[i]).
    - Compute the ASCII value of the next character using ord(s[i + 1]).
    - Calculate the absolute difference between these two values using abs.
    - Add this difference to output.
4. Return the result: After the loop completes, return the output.

## Complexity
- Time complexity:

The time complexity is 𝑂(𝑛), where 𝑛 is the length of the string. This is because we iterate through the string once.

- Space complexity:

The space complexity is 𝑂(1). We use a fixed amount of extra space regardless of the input size.

## Code
```py
class Solution(object):
    def scoreOfString(self, s):
        output = 0 
        s_length = len(s)  
       
        for i in range(s_length - 1):
            ascii_value_first = ord(s[i])               
            ascii_value_next  = ord(s[i + 1]) 
                
            output += abs(ascii_value_first - ascii_value_next)
            
        return output   
```