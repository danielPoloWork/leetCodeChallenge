# 344. Reverse string
#Description at [leetcode.com](https://leetcode.com/problems/reverse-string/description/)

## Intuition
The most intuitive and efficient way to reverse an array of characters in place is to use the two-pointer approach. By 
placing one pointer at the beginning and another at the end of the array, and swapping the characters at these positions 
while moving the pointers towards each other, we can reverse the array with minimal extra memory usage.

# Approach
1. Initialize Pointers: Set two pointers, left at the start of the array (index 0) and right at the end of the array 
   (index s.length - 1).
2. Swap Elements: While the left pointer is less than the right pointer, swap the characters at these two pointers.
    - Use a temporary variable to hold the value at the left pointer during the swap.
3. Move Pointers: Increment the left pointer and decrement the right pointer to move towards the center of the array.
4. Terminate: When the left pointer is no longer less than the right pointer, the entire array has been reversed.

> This method ensures an efficient in-place reversal with minimal extra memory usage. This operation could also be 
> performed by using the built-in JavaScript method `Array.prototype.reverse()`. The `Array.prototype.reverse()` method 
> in JavaScript reverses an array in-place, meaning it directly modifies the original array and doesn't create any 
> intermediate arrays or lists. It directly iterates over the first half of the sequence and swaps the element with the 
> corresponding element from the end of the sequence, for all elements in the first half.

## Complexity
- Time complexity:

The time complexity is 𝑂(𝑛), where 𝑛 is the length of the array. Each element is accessed and swapped exactly once, 
resulting in linear time complexity.

- Space complexity:

The space complexity is 𝑂(1). This approach uses a constant amount of extra memory (for the pointers and the temporary 
variable), regardless of the size of the input array.

## Code
```js
var reverseString = function(s) {
    Solution.setReversed(s);
};

class Solution {
    static setReversed(s) {
        let left  = 0;            
        let right = s.length - 1; 

         while (left < right) {
            let temp = s[left];  
            s[left]  = s[right];  
            s[right] = temp;     

            left++;  
            right--; 
        }
    }
}
```

## Built-in method
```js
var reverseString = function(s) {
    Solution.setReversed(s);
};

class Solution {
    static setReversed(s) {
        s.reverse();
    }
}
```