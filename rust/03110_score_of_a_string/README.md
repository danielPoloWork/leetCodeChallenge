# 3110. Score of a string
#Description at [leetcode.com](https://leetcode.com/problems/score-of-a-string/description/)

## Intuition
The problem requires calculating the score of a string, which is defined as the sum of the absolute differences between the ASCII values of adjacent characters. My first thought is to iterate through the string, compute the ASCII values of each character and its neighbor, then sum the absolute differences.

## Approach
1. Assert the string length: Ensure that the string length is at least 2 to satisfy the problem's constraints.
2. Initialize the output variable: Create a variable output to store the cumulative score.
3. Convert the string to bytes: Convert the string s to a vector of bytes (s_chars) for easier ASCII value manipulation.
4. Get the length of the byte vector: Store the length of s_chars in s_length.
5. Iterate through the byte vector: Use a for loop to iterate through s_chars from the first byte to the second last byte.
    - For each byte, compute its integer value using s_chars[i] as i32.
    - Compute the integer value of the next byte using s_chars[i + 1] as i32.
    - Calculate the absolute difference between these two values using .abs().
    - Add this difference to output.
6. Return the result: After the loop completes, return the output.

## Complexity
- Time complexity:

The time complexity is 𝑂(𝑛), where 𝑛 is the length of the string. This is because we iterate through the string once.

- Space complexity:

The space complexity is 𝑂(𝑛) due to the allocation of the byte vector s_chars.

## Code
```rust
impl Solution {
    pub fn score_of_string(s: String) -> i32 {
        assert!(s.len() >= 2); 
        
        let mut output       = 0;                 
        let s_chars: Vec<u8> = s.bytes().collect(); 
        let s_length         = s_chars.len();       

        for i in 0..(s_length - 1) {
            let ascii_value_first = s_chars[i] as i32;     
            let ascii_value_next  = s_chars[i + 1] as i32; 

            output += (ascii_value_first - ascii_value_next).abs();
        }
    
        output
    }
}
```