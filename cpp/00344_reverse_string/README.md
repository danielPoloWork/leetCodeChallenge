# 344. Reverse string
#Description at [leetcode.com](https://leetcode.com/problems/reverse-string/description/)

## Intuition
The first thought that comes to mind for reversing a string (or array of characters) efficiently is to use the 
two-pointer approach. This method involves using two pointers, one starting at the beginning of the array and the other 
at the end. By swapping the characters at these two pointers and moving the pointers towards each other, the array can 
be reversed in place with minimal extra memory.

## Approach
1. Initialize Pointers: Start with two pointers, left at the beginning (index 0) and right at the end 
   (index s.size() - 1).
2. Swap Elements: While the left pointer is less than the right pointer, swap the elements at these pointers.
    - Use a temporary variable to hold the value at the left pointer while swapping.
3. Move Pointers: Increment the left pointer and decrement the right pointer to move towards the center of the array.
4. Terminate: The loop terminates when the left pointer is no longer less than the right pointer, indicating the entire 
   array has been reversed.

> This approach ensures that the array is reversed efficiently and in place. This operation could also be performed by 
> using the built-in C++ function `std::reverse(s.begin(), s.end());`. The `std::reverse` function in C++ modifies the 
> original vector by reversing the order of its elements. However, this function has been created for demonstration 
> purposes to understand the logic behind reversing a vector.

## Complexity
- Time complexity:

The time complexity is 𝑂(𝑛), where 𝑛 is the length of the array. Each element is accessed and swapped exactly once, 
making the process linear in time.

- Space complexity:

The space complexity is 𝑂(1). This approach uses a constant amount of extra memory (for the pointers and the temporary 
variable), regardless of the input size.

## Code
```c++
class Solution {
    public: void reverseString(vector<char>& s) {
        int left  = 0;           
        int right = s.size() - 1; 

        while (left < right) {
            char temp = s[left]; 
            s[left]   = s[right]; 
            s[right]  = temp;   
            
            left++;                   
            right--; 
        }
        
    }
};
```