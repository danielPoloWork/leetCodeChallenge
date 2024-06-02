# 344. Reverse string
#Description at [leetcode.com](https://leetcode.com/problems/reverse-string/description/)

## Intuition
Reversing a string array in place can be efficiently achieved using a two-pointer approach. This approach involves 
placing one pointer at the beginning and another at the end of the array, and then swapping the elements at these 
positions while moving the pointers towards each other until they meet or cross.

## Approach
1. Initialize Pointers: Set two pointers, left at the start of the array (index 0) and right at the end of the array 
   (index s.len() - 1).
2. Swap Elements: While the left pointer is less than the right pointer, swap the characters at these two pointers using
   a temporary variable to hold one of the values during the swap.
3. Move Pointers: Increment the left pointer and decrement the right pointer to move towards the center of the array.
4. Terminate: When the left pointer is no longer less than the right pointer, the entire array has been reversed.

> This method ensures an efficient in-place reversal with minimal extra memory usage. This operation could also be 
> performed by using the built-in Rust method `to_vec()` and `reverse()`. First, `to_vec()` function in Rust creates a 
> new vector with the same elements of the array. Then `reverse()` method is used to reverse the order of elements in 
> this new vector. After the reverse operation, the vector is not automatically converted back into the array. It does 
> not actually modify the original array unlike our function since it involves creating a new vector. However, this 
> function has been created for demonstration purposes, to explain the logic behind array reversing.

## Complexity
- Time complexity:

The time complexity is 𝑂(𝑛), where 𝑛 is the length of the array. Each element is accessed and swapped exactly once, 
resulting in linear time complexity.

- Space complexity:

The space complexity is 𝑂(1). This approach uses a constant amount of extra memory (for the pointers and the temporary 
variable), regardless of the size of the input array.

## Code
```rust
impl Solution {
    pub fn reverse_string(s: &mut Vec<char>) {
        let mut left = 0; 
        let mut right = if s.len() > 0 { s.len() - 1 } else { 0 }; 

   
        while left < right {
            let temp = s[left];  
            s[left] = s[right];  
            s[right] = temp;     

            left += 1;  // rr
            right -= 1;   /**/    
        }
    }
}
```

## Built-in method
```rust
impl Solution {
    pub fn reverse_string(s: &mut Vec<char>) {
        s.reverse();
    }
}
```