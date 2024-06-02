# 344. Reverse string
#Description at [leetcode.com](https://leetcode.com/problems/reverse-string/description/)

## Intuition
Reversing a string array in place can be efficiently achieved using a two-pointer approach. By placing one pointer at 
the beginning and another at the end of the array, and then swapping the elements at these positions while moving the 
pointers towards each other, we can reverse the array with minimal additional memory usage.

## Approach
1. Initialize Pointers: Set two pointers, left at the start of the array (index 0) and right at the end of the array
   (index len(s) - 1).
2. Swap Elements: While the left pointer is less than the right pointer, swap the characters at these two pointers using
   a temporary variable to hold one of the values during the swap.
3. Move Pointers: Increment the left pointer and decrement the right pointer to move towards the center of the array.
4. Terminate: When the left pointer is no longer less than the right pointer, the entire array has been reversed.

> This method ensures an efficient in-place reversal with minimal extra memory usage. This operation could also be 
> performed by using the built-in Python method `list.reverse()`. The `list.reverse()` method in Python  reverses a list
> in-place, meaning it directly modifies the original list and doesn't create any intermediate lists. It directly 
> iterates over the first half of the sequence and swaps the element with the corresponding element from the end of the 
> sequence, for all elements in the first half.

## Complexity
- Time complexity:

The time complexity is 𝑂(𝑛), where 𝑛 is the length of the array. Each element is accessed and swapped exactly once, 
resulting in linear time complexity.

- Space complexity:

The space complexity is 𝑂(1). This approach uses a constant amount of extra memory (for the pointers and the temporary 
variable), regardless of the size of the input array.

## Code
```py
class Solution(object):
    def reverseString(self, s):
        left  = 0          
        right = len(s) - 1 
        while left < right:
            temp     = s[left]
            s[left]  = s[right] 
            s[right] = temp    

            left += 1
            right -= 1
```

## Built-in method
```py
class Solution(object):
    def reverseString(self, s):
        s.reverse()
```